/*!
 * Theme UIkit
 *
 * Copyright (c) 2013-2016 Eduardo Ramos
 * Licensed under GNU GPL v3 or later
 *
 */

/* global define, exports, CodeMirror */
(function (mod) {
    function buildAbsoluteURL(relativeURL){
        return window.moodlewwwroot + relativeURL;
    }
    
    var dependencies = [
        buildAbsoluteURL('/theme/uikit/javascript/jquery.less.js'),
        buildAbsoluteURL('/theme/uikit/javascript/codemirror/lib/codemirror.js'),
        buildAbsoluteURL('/theme/uikit/javascript/codemirror/mode/css/css.js'),
        buildAbsoluteURL('/theme/uikit/javascript/codemirror/addons/edit/matchbrackets.js'),
        buildAbsoluteURL('/theme/uikit/javascript/codemirror/addons/edit/closebrackets.js'),
        buildAbsoluteURL('/theme/uikit/javascript/codemirror/addons/selection/active-line.js')
    ];
    
    if (typeof define === "function" && define.amd){ // AMD
        return define(dependencies, mod);
    } else {// Plain browser env
        var customizer = mod(jqueryLess, CodeMirror);
        customizer.initialize();
    }
})(function(jqueryLess, CodeMirror) {
    if (window !== window.top) {
        //Detect if this window is an iframe (the user may enter to UIKit style manager from the manager itself):
        $("#page-content").html(
                '<blockquote class="uk-margin-top uk-margin-left">'
                    +'<p>In order to understand recursion, one must first understand recursion.</p>'
                    +'<small>Anonymous</small>'
                +'</blockquote>');
        return;
    }
    
    //String format function:
    if (!String.format) {
        String.format = function(format) {
            var args = Array.prototype.slice.call(arguments, 1);
            return format.replace(/{(\d+)}/g, function(match, number) {
                return typeof args[number] !== 'undefined'
                        ? args[number]
                        : match
                        ;
            });
        };
    }
    
    //Local storage helper:
    function getLocalData(key){
        if(window.localStorage && window.localStorage.getItem && typeof window.localStorage.getItem === 'function'){
            return window.localStorage.getItem(key);
        }else{
            return undefined;
        }
    }
    
    function storeLocalData(key, value){
        if(window.localStorage && window.localStorage.getItem && typeof window.localStorage.setItem === 'function'){
            window.localStorage.setItem(key, value);
        }
    }
    
    function initEvents(){
        
        $(document).ready(function() {
            if(!window.customizerConfig){
                console.error("Configuration could not be loaded");
                return;
            }

            /*
            * General customizer configuration
            */
            var config = window.customizerConfig;

            var wwwroot = window.moodlewwwroot;

            var themeVersion = window.theme_uikit_version;

            function buildAbsoluteURL(relativeURL){
                return wwwroot + relativeURL;
            }

            /*
            * Translation strings for internationalization (i18n)
            */
            var i18n = config['translations'] || {};


            var tinyColorParserAvailable = typeof window.tinycolor === "function";

            //Constants:
            var POST_PROCESS_CSS_URL = buildAbsoluteURL('/theme/uikit/lib/postProcessCSS.php');
            var SAVE_LESS_AJAX_URL = buildAbsoluteURL('/theme/uikit/lib/savestyles.php?save=1');
            var TYPE_COLOR = 'color';
            var TYPE_VALUE = 'value';
            var TYPE_FONT_FAMILY = 'font-family';
            var TYPE_FONT_WEIGHT = 'font-weight';


            //Local preferences:
            var AUTO_REFRESH_PREFERENCE = "THEME_UIKIT_CUSTOMIZER_AUTO_REFRESH_PREFERENCE";

            var colorPickerConfig = {
                preferredFormat: "rgb",
                showInput: true,
                showInitial: true,
                allowEmpty: false,
                showAlpha: true,
                showPalette: true,
                showPaletteOnly: false,
                showSelectionPalette: true,
                clickoutFiresChange: false,
                cancelText: "Cancel",
                chooseText: "Ok",
                className: "colorPickerUiKit"
            };

            var autoRefreshEnabled = false;

            var autoRefreshEnabledPreference = getLocalData(AUTO_REFRESH_PREFERENCE);
            if(autoRefreshEnabledPreference !== undefined && autoRefreshEnabledPreference !== null){
                autoRefreshEnabled = autoRefreshEnabledPreference === "1";
            }

            /**
             * Compiled and post processed final CSS
             */
            var compiledCss = null;
            /**
             * Compiled CSS without Moodle post processing
             */
            var compiledCssWithoutMoodlePostProcess = null;

            var $iframe = $("#embeddedSite");
            var $loadingIframeIconSpinner = $("#loadingIcon");
            var $customizerButtons = $(".customizerButton");
            var $refreshButtons = $(".customizerRefreshButton");
            var $customizerVariablesGroups = $("#customizerVariablesGroups");

            var $resetAllButton = $("#resetAllButton");

            var $form = $("#customizerForm");
            var $themeSelector = $("#uikit-theme");
            var $customizerVariablesDiv = $("#customizerVariablesDiv");

            var currentTheme = $themeSelector.val();

            var $keepVariableValuesBetweenThemesCheck = $("#keepVariableValuesBetweenThemes");

            /**
             * Prepare font family values for auto-complete search on fields.
             * See template in customizer/index.php
             */
            var fontFamilyAutoCompleteValues = $.map(config['values']['font-family'], function(val, key){
                var item = {title: key, value: val};
                if(key !== val){
                    item.text = val;
                }

                return item;
            });
            var $autocompleteTemplate = $("#autocompleteTemplate").removeAttr('id');

            $iframe.load(function() {
                //Load current site settings first, if existing:
                var initialVariables = null;
                if(window.currentSettings && !$.isEmptyObject(window.currentSettings)){
                    initialVariables = window.currentSettings;

                    if(initialVariables['theme']){
                        $themeSelector.val(initialVariables['theme']);
                        delete initialVariables['theme'];
                    }

                    delete window.currentSettings;//Avoid using them again
                }

                $iframe.addClass('loaded');

                $iframe.contents().find("#uikit-theme-designer-alert").remove();

                //Make sure theme variables are loaded before first compile:
                $firstLoadDeferred.done(function(){
                    applyStylesCustomization($($iframe.contents()), false, initialVariables);
                });

                //Disallow going to a different page than this moodle site
                $iframe.contents().on('click', 'a', function(event){
                    if(this.href && this.href !== "#" && this.href.indexOf(wwwroot) !== 0){
                        showModal(i18n['externalpage-disallowed']);
                        event.preventDefault();
                    }
                });
            });

            function disableControls(){
                //Disable buttons
                $customizerButtons.prop('disabled', true);
                $refreshButtons.find('.uk-icon').addClass('uk-icon-spin');

                /* Show spinner */
                $loadingIframeIconSpinner.show();
            }

            function enableControls(){
                //Enable buttons
                $customizerButtons.prop('disabled', false);
                $refreshButtons.find('.uk-icon').removeClass('uk-icon-spin');

                /* Hide spinner */
                $loadingIframeIconSpinner.hide();
            }

            function replaceCss($contents, css) {
                compiledCss = css;
                $contents.find('link[rel=stylesheet][href*="sheet=themeuikit"]').remove();//Remove default theme styles (no theme cache mode)
                $contents.find('link[rel=stylesheet][href*="sheet=generated"]').remove();//Remove generated theme styles (no theme cache mode)
                $contents.find('#customizerStyles').remove();
                $("<style>")
                        .prop('id', 'customizerStyles')
                        .prop('type', 'text/css')
                        .text(css)
                        .appendTo($contents.find('head'));
            }

            /**
             * @param {iframe} $contents Ifram to apply styles
             * @param {boolean} forceRecompile Optional to force a recompile even when css is already compiled. Should be true after a variable change.
             * @param {object} customLessVariables Optional, for overriding variables values.
             */
            function applyStylesCustomization($contents, forceRecompile, customLessVariables) {
                forceRecompile = forceRecompile || !compiledCss;

                if (forceRecompile) {
                    var hasThemeChanged = currentTheme !== $themeSelector.val();
                    currentTheme = $themeSelector.val();

                    var showErrorModal = function (errorText, helpText) {
                        var $errorDiv = $("<div>")
                                .addClass('uk-alert uk-alert-danger uk-margin-top');

                        if (errorText) {
                            $errorDiv.text(i18n['compile-error']+": " + errorText);
                        } else {
                            $errorDiv.text(i18n['compile-error']);
                        }

                        if(helpText){
                            $errorDiv.append("<br />");
                            $errorDiv.append(helpText);
                        }

                        $("#uikit-modal-dialog").find('.content').html($errorDiv);
                        var modal = $.UIkit.modal("#uikit-modal-dialog");
                        modal.show();
                    };

                    var browserCompileLess = function (){
                        var lessCode = "@uikit-theme: "+currentTheme+';';
                        var stylesURL = buildAbsoluteURL("/theme/uikit/less/theme/styles.less?"+themeVersion);
                        lessCode += '@import "'+stylesURL+'";';

                        var parserCacheId = currentTheme;
                        if($checkUseCustomLess.is(':checked')){
                            lessCode += "\n\n" + $customLessTextarea.val();

                            parserCacheId += $customLessTextarea.attr('data-changed');
                        }

                        var lessVars = getLessVariablesValues(true);

                        var options = {
                            id: parserCacheId,//For caching syntax tree
                            variables: lessVars
                        };

                        jqueryLess.getCSS(lessCode, options).done(function(css){
                            enableControls();

                            compiledCssWithoutMoodlePostProcess = css;

                            //Post-process CSS by moodle:
                            $.ajax({
                                url: POST_PROCESS_CSS_URL,
                                cache: false,
                                type: "POST",
                                data: {css: css},
                                dataType: "json",
                                success: function(response) {
                                    enableControls();

                                    if (response['status'] === 'ok') {
                                        replaceCss($contents, response['css']);
                                    } else {
                                        showErrorModal(response['message']);
                                    }
                                },
                                error: function(xhr, ajaxOptions, thrownError) {
                                    showErrorModal("Post-process failed");
                                    enableControls();
                                }
                            });
                        }).fail(function(error){
                            if(!error){
                                error = "";
                            }

                            var helpText = i18n['less-error-help'];

                            showErrorModal(error, helpText);
                            enableControls();
                        });
                    };

                    var compileLess = function () {
                        //Use custom variables if needed:
                        if (customLessVariables && !$.isEmptyObject(customLessVariables)) {
                            //First reset defaults:
                            resetVariables();

                            $.each(customLessVariables, function(name, value) {
                                $(".uikit-customizer-control[name='" + name + "']").val(value);
                            });

                            $(".uikit-customizer-control[data-type='" + TYPE_COLOR + "']").trigger('refreshinput');//Update color pickers
                        }

                        setTimeout(browserCompileLess, 10);//Allow for some time to the browser to show spinner icon and try to reduce browser blocking

                        refreshResetButtons();
                    };

                    if (hasThemeChanged) {
                        //Note: we don't reset variables after a theme change to try to keep some customization between themes.
                        loadThemeVariables().done(compileLess);
                    } else {
                        compileLess();
                    }
                } else {
                    replaceCss($contents, compiledCss);
                }
            }

            /**
             * 
             * @param {object} customLessVariables Custom variables to force
             * @param {bool} noThemeCheck If true, no warning dialog will be shown to the user about the theme changing
             */
            function refreshStyles(customLessVariables, noThemeCheck){
                var hasThemeChanged = currentTheme !== $themeSelector.val();

                function doRefresh(){
                    disableControls();
                    //Make sure theme variables are loaded before first compile:
                    $firstLoadDeferred.done(function(){
                        applyStylesCustomization($($iframe.contents()), true, customLessVariables);
                    });
                }

                //If the theme is changed and some variables have different values than default
                var someVariableChanged = $resetAllButton.is(':visible');
                if(!noThemeCheck && hasThemeChanged && someVariableChanged){
                    $keepVariableValuesBetweenThemesCheck.prop('checked', true);

                    var $refreshMessage = $("#themeChangeMessage").clone();
                    $refreshMessage.show();

                    var $check = $refreshMessage.find('.keepVariableValuesBetweenThemes');
                    $check.removeAttr('id');

                    $check.change(function(){
                       $keepVariableValuesBetweenThemesCheck.prop('checked', $(this).prop('checked'));
                    });


                    showConfirmModal($refreshMessage, function(){
                        doRefresh();
                    });
                }else{
                    $keepVariableValuesBetweenThemesCheck.prop('checked', false);
                    doRefresh();
                }
            }

            var refreshOnceDeferred = null;
            var refreshOnceRequests = 0;

            var REFRESH_ONCE_TIMEOUT = 100;

            function doRefreshIfNoMoreRequests(){
                if(!refreshOnceRequests){
                    refreshOnceDeferred.resolve();
                }else{
                    refreshOnceRequests = 0;
                    setTimeout(doRefreshIfNoMoreRequests, REFRESH_ONCE_TIMEOUT);
                }
            }

            /**
             * Refresh styles with a delay, when no more refresh requests are coming
             */
            function refreshStylesOnce(){
                if(!refreshOnceDeferred){
                    refreshOnceDeferred = $.Deferred();
                    refreshOnceRequests = 1;

                    doRefreshIfNoMoreRequests();

                    refreshOnceDeferred.done(function(){
                        refreshStyles();
                        refreshOnceDeferred = null;
                    });
                }else{
                    refreshOnceRequests++;
                }
            }






            //Recompile:
            $refreshButtons.click(refreshStylesOnce);

            $form.submit(function(event) {
                event.preventDefault();
            });

            function initializeColorPickers(){
                var $colorInputs = $('.uikit-customizer-variable.available').find("input[data-type="+TYPE_COLOR+"]");
                $colorInputs.spectrum("destroy");
                $colorInputs.filter(function() {
                    var $input = $(this);

                    return looksLikeColorValue($input.val()) && !$input.next('.colorPickerUiKit').size();
                }).spectrum(colorPickerConfig);
            }


            function looksLikeColorValue(color){
                if(typeof window.tinycolor === "function"){
                    //Use the spectrum colorpicker function to check for color value:
                    return window.tinycolor(color)['ok'];
                }else{
                    return true;//We don't have the spectrum colorpicker function available. Assume correct color
                }
            }





            //Variables defaults, customization etc:
            var $loadingVariablesIconSpinner = $("#loadingVariablesIcon");
            var $customizerVariablesDiv = $("#customizerVariablesDiv");

            var variablesCacheByStyle = {};
            var variablesCacheByStyleAreExpressionsEvaluated = {};

            /*
             * Loads the less files from a theme so the used variables can be extracted later
             * @param {string} theme Theme
             * @returns {promise}
             */
            function loadStyle(theme) {
                var deferred = $.Deferred();

                var themeStylesURL = buildAbsoluteURL('/theme/uikit/less/uikit/themes/'+currentTheme+'/uikit.less?'+themeVersion);
                var variablesURL = buildAbsoluteURL('/theme/uikit/less/custom/variables.less?'+themeVersion);

                var imports = '@import "'+themeStylesURL+'";';
                imports += "\n" + '@import "'+variablesURL+'";';

                if (variablesCacheByStyle[theme]) {
                    deferred.resolve(variablesCacheByStyle[theme]);
                } else {
                    jqueryLess.resolveImports(imports).done(function(less) {
                        var vars = jqueryLess.getVars(less);
                        vars['@uikit-theme'] = theme;
                        variablesCacheByStyle[theme] = vars;

                        deferred.resolve(vars);
                    });
                }


                return deferred.promise();
            }

            /**
             * Reset variables to their default value
             * @param {array} $group Optional to only reset some group
             */
            function resetVariables($group){
                var $elements;
                if($group && ($group instanceof jQuery)){
                    $elements = $group.find(".uikit-customizer-control");
                }else{
                    $elements = $(".uikit-customizer-control");
                }

                $elements.each(function(){
                   var $input = $(this); 
                   $input.val($input.attr('data-default'));
                   $input.trigger('refreshinput');//Fire event to refresh color pickers, etc
                });
            }

            /**
             * Main function to build the variable controls of the base theme.
             */
            function loadThemeVariables() {
                var keepVariableValuesBetweenThemes = $keepVariableValuesBetweenThemesCheck.prop('checked');

                var theme = currentTheme;

                disableControls();
                $customizerVariablesDiv.hide();
                $loadingVariablesIconSpinner.show();

                var lessVariables = {};

                var $loadAllDeferred = $.Deferred();
                loadStyle(theme).done(function(variables) {
                    $customizerVariablesDiv.show();
                    $loadingVariablesIconSpinner.hide();

                    lessVariables = variables;

                    if (config['groups']) {
                        var buildGroupsAndResolve = function (){
                            $.each(config['groups'], function(_, group) {
                                buildGroup(group, lessVariables);
                            });

                            $loadAllDeferred.resolve();
                        };

                        //Evaluate and cache expressions:
                        if(!variablesCacheByStyleAreExpressionsEvaluated[theme]){
                            evaluateNecessaryLessExpressionsForTheme(config['groups'], lessVariables).done(function(evaluatedVariablesExpressions){
                                variablesCacheByStyle[theme] = evaluatedVariablesExpressions;
                                variablesCacheByStyleAreExpressionsEvaluated[theme] = true;

                                buildGroupsAndResolve();
                            });
                        }else{
                            buildGroupsAndResolve();
                        }
                    }else{
                        $loadAllDeferred.resolve();
                    }
                });



                //Build controls:
                var allDoneDeferred = $.Deferred();

                $.when($loadAllDeferred).done(function() {
                    //Initialize color pickers:
                    initializeColorPickers();

                    allDoneDeferred.resolve();
                });

                function buildGroup(group, lessVariables) {
                    var groupId = group['id'];
                    var groupName = group['name'];
                    var defaultType = group['defaultType'] || TYPE_COLOR;

                    //Group:
                    var $fieldset = $("#uikit-customizer-group-" + groupId);

                    if (!$fieldset.size()) {
                        $fieldset = $("<fieldset>")
                                .addClass('uikit-customizer-group')
                                .prop('id', "uikit-customizer-group-" + groupId)
                                .attr('data-name', groupName);

                        var $legend = $("<legend>")
                                .addClass('uikit-customizer-group-header')
                                .text(groupName);

                        var $resetButton = $("<span>")
                                .addClass('resetGroupButton uk-button uk-button-mini uk-margin-left')
                                .css('display', 'none')
                                .attr('title', i18n['reset-group'])
                                .attr('data-uk-tooltip', '')
                                .html('<i class="uk-icon uk-icon-undo"></i>');
                        $legend.append($resetButton);

                        $fieldset.append($legend);

                        $customizerVariablesGroups.append($fieldset);
                    }

                    $fieldset.find('.variable-controls').removeClass('available').hide();

                    var isSomeVariableVisible = false;

                    //Variables:
                    if (group['elements']) {
                        var groupThemes = group['themes'] || group['theme'];//Specified theme for the variable?

                        if (groupThemes && !$.isArray(groupThemes)) {
                            groupThemes = [groupThemes];
                        }

                        $.each(group['elements'], function(_, element) {
                            var text = element['name'];

                            var variableId = element['var'];
                            variableId = removeVariableMarkFromName(variableId);
                            var variableLessId = "@" + variableId;

                            var type = element['type'] || defaultType;
                            var elementThemes = element['themes'] || element['theme'];//Specified theme for the variable?


                            if (elementThemes && !$.isArray(elementThemes)) {
                                elementThemes = [elementThemes];
                            }

                            if (!variableId || !text) {
                                return;
                            }

                            var $variableDiv = $("#uikit-customizer-variable-" + variableId);
                            if (!$variableDiv.size()) {
                                $variableDiv = buildVariableControl(variableId, text, type);
                                $fieldset.append($variableDiv);
                            }


                            var valueInTheme = extractLessVariableValue(lessVariables, variableLessId);
                            lessVariables[variableLessId] = valueInTheme;//Cache result

                            var $input = $variableDiv.find('.uikit-customizer-control');
                            if (valueInTheme) {
                                if($input.attr('data-default') === undefined || !keepVariableValuesBetweenThemes){
                                    //Put value if first initialization or theme has changed and variable values are not kept
                                    $input.val(valueInTheme);
                                }
                                $input.attr('data-default', valueInTheme);
                                $input.trigger('refreshinput');//Fire event to refresh color pickers, etc
                            }

                            var variableAvailableForTheme = false;
                            var groupForTheme = (!groupThemes || groupThemes.indexOf(theme) !== -1);

                            if(groupForTheme){
                                variableAvailableForTheme = !elementThemes || elementThemes.indexOf(theme) !== -1;
                            }else{
                                variableAvailableForTheme = elementThemes && elementThemes.indexOf(theme) !== -1;
                            }

                            if (valueInTheme && variableAvailableForTheme) {
                                $variableDiv.addClass('available').show();
                                $input.prop('disabled', false);
                                isSomeVariableVisible = true;
                            } else {
                                $variableDiv.hide();
                                $input.prop('disabled', true);
                            }
                        });
                    }

                    if (isSomeVariableVisible) {
                        $fieldset.show();
                    } else {
                        $fieldset.hide();
                    }
                }

                function buildVariableControl(id, text, type) {
                    var $variableDiv = $("<div>")
                            .addClass('uk-form-row')
                            .prop('id', 'uikit-customizer-variable-' + id)
                            .addClass('uikit-customizer-variable');

                    var $label = $("<label>")
                            .addClass('uikit-customizer-variable-label')
                            .attr('title', "@"+id)
                            .text(text);

                    $variableDiv.append($label);

                    var $input = buildTypeInput(type, $variableDiv);

                    $input.prop('name', "@" + id);

                    $variableDiv.append($input);

                    return $variableDiv;
                }

                function buildTypeInput(type, $variableDiv) {
                    var $input = null;
                    switch (type) {
                        //Other types with text or special input:
                        case TYPE_COLOR:
                        case TYPE_VALUE:
                            $input = $("<input>")
                                    .addClass('uk-form-small')
                                    .prop('type', 'text');
                        //Types with values selection:
                        default:
                            var typeValues = null;
                            if(config['values'] && config['values'][type]){
                                typeValues = config['values'][type];
                            }

                            if (typeValues && !$.isEmptyObject(typeValues)) {
                                if(type === TYPE_FONT_FAMILY){
                                    //Build an auto-complete text input:
                                    $input = $("<input>")
                                            .addClass('uk-form-small')
                                            .prop('type', 'text')
                                            .attr('placeholder', i18n['font-family-placeholder']);

                                    $variableDiv
                                        .addClass('uk-autocomplete')
                                        .attr('data-uk-autocomplete', JSON.stringify({source: fontFamilyAutoCompleteValues, minLength: 1, param: 'fontAutocompleteSearch'}))
                                        .append($autocompleteTemplate.clone());
                                }else{
                                    //Build a select element:
                                    $input = $("<select>")
                                            .addClass('uk-form-small');

                                    $.each(typeValues, function(text, value) {
                                        $("<option>")
                                                .text(text)
                                                .val(value)
                                                .appendTo($input);
                                    });
                                }
                            } else {
                                //Build a simple text input:
                                $input = $("<input>")
                                        .addClass('uk-form-small')
                                        .prop('type', 'text');
                            }
                            break;
                    }

                    $input.attr('data-type', type);
                    $input.addClass('uikit-customizer-control');

                    return $input;
                }


                return allDoneDeferred.promise();
            }

            /**
             * Evaluates the group variables values that are less expressions to their final value.
             * @param {object} groups
             * @param {object} lessVariables
             * @returns {object}
             */
            function evaluateNecessaryLessExpressionsForTheme(groups, lessVariables){
                var $deferred = $.Deferred();
                if(groups){
                    var expressions = {};

                    $.each(groups, function(_, group) {
                        if(group['elements']){
                            $.each(group['elements'], function(_, element) {
                                var variableId = element['var'];
                                variableId = removeVariableMarkFromName(variableId);
                                var variableLessId = "@" + variableId;

                                var value = extractLessVariableValue(lessVariables, variableLessId);

                                if(value && value.indexOf("@") !== -1){
                                    expressions[variableLessId] = value;
                                }
                            });
                        }
                    });

                    if(!$.isEmptyObject(expressions)){
                        evalLessExpressions(lessVariables, expressions).done(function(evaluatedVariablesExpressions){
                            $.each(evaluatedVariablesExpressions, function(name, value){
                                lessVariables[name] = value;
                            });

                            $deferred.resolve(lessVariables);
                        });
                    }else{
                        $deferred.resolve(lessVariables);
                    }
                }else{
                    $deferred.resolve(lessVariables);
                }

                return $deferred;
            }

            /**
             * Little hack to evaluate a less expression.
             * @param {object} lessVariables
             * @param {string|object} expressions
             * @returns {string}
             */
            function evalLessExpressions(lessVariables, expressions){
                var $deferred = $.Deferred();

                if(!expressions || $.isEmptyObject(expressions)){
                    $deferred.resolve(expressions);
                }

                var EXPR_EVAL_REGEX = 'result-eval-expr-(\\d+) *:([^;]*);';

                try {
                    var doneFunction = function (css){
                        var result = {};
                        var globalMatches = css.match(new RegExp(EXPR_EVAL_REGEX, 'g'));

                        if(globalMatches && globalMatches.length === Object.keys(expressions).length){
                            var singleRegexp = new RegExp(EXPR_EVAL_REGEX);

                            var i = 0;
                            $.each(globalMatches, function(_, singleMatch){
                                var name = namesIndex[i];

                                var matches = singleMatch.match(singleRegexp);
                                result[name] = $.trim(matches[2]);

                                i++;
                            });

                            $deferred.resolve(result);
                        }else{
                            $deferred.resolve(expressions);//Could not evaluate expressions
                        }
                    };

                    var codeForEval = '';
                    var i = 0;

                    var namesIndex = {};

                    $.each(expressions, function(name, expr){
                        namesIndex[i] = name;
                        codeForEval += '.result-eval-expr{result-eval-expr-'+i+':'+expr+';}';
                        i++;
                    });

                    var options = {
                        variables: lessVariables
                    };
                    jqueryLess.getCSS(codeForEval, options).done(doneFunction).fail(function(error){
                        $deferred.resolve(expressions);//Could not evaluate expressions
                    });
                }catch(ex){
                    $deferred.resolve(expressions);//Could not evaluate expressions
                }

                return $deferred;
            }

            function extractLessVariableValue(lessVariables, key) {
                if (lessVariables[key]) {
                    var value = $.trim(lessVariables[key]);
                    if (value.indexOf("@") === 0 && key !== value && lessVariables[value]) {
                        return extractLessVariableValue(lessVariables, value);
                    } else {
                        return value;
                    }
                } else {
                    return null;
                }
            }

            var $firstLoadDeferred = loadThemeVariables();

            $form.on('change refreshinput', '.uikit-customizer-control', function(event) {
                var $input = $(this);
                if ($input.next('.colorPickerUiKit').size()) {
                    $input.spectrum('set', $input.val());
                }

                var isChangeEvent = event.type === 'change';

                if(isChangeEvent){
                    //Refresh group reset styles button:
                    refreshResetButtons($input.parents('.uikit-customizer-group'));

                    if(autoRefreshEnabled){
                        refreshStylesOnce();
                    }
                }
            });

            $themeSelector.change(function(){
                if(autoRefreshEnabled){
                    refreshStylesOnce();
                }
            });

            $form.on('click', '.uikit-customizer-group-header', function(event){
                if($(event.target).hasClass('uikit-customizer-group-header')){//Check that we are not clicking in the reset group button
                    $(this).parent().find('.uikit-customizer-variable.available').slideToggle();
                }
            });

            $form.on('click', '.resetGroupButton', function(){
                var $button = $(this);
                var $group = $(this).parents('.uikit-customizer-group');

                var resetConfirmationText = String.format(i18n['reset-group-confirm'], $group.data('name'));

                showConfirmModal(resetConfirmationText, function(){
                    resetVariables($group);
                    $button.hide();

                    if(autoRefreshEnabled){
                        refreshStylesOnce();
                    }
                });
            });

            $form.on('click', '.uikit-customizer-variable-label.modified', function(){
                var $label = $(this);
                var $variable = $label.parents('.uikit-customizer-variable');

                var resetConfirmationText = String.format(i18n['reset-var-confirm'], $label.text());

                showConfirmModal(resetConfirmationText, function(){
                    resetVariables($variable);
                    $label.removeClass('modified');

                    if(autoRefreshEnabled){
                        refreshStylesOnce();
                    }
                });
            });


            function refreshResetButtons($groups){
                if(!$groups || !$groups instanceof jQuery){
                    $groups = $('.uikit-customizer-group');
                }

                $groups.each(function() {
                    var $group = $(this);
                    var $resetGroupButton = $group.find('.resetGroupButton');
                    var $variableInputs = $group.find(".uikit-customizer-variable.available").find('input, select');

                    var showResetGroupButton = false;
                    $resetGroupButton.hide();

                    $variableInputs.each(function() {
                        var $input = $(this);
                        var $label = $input.parents('.uikit-customizer-variable').find('.uikit-customizer-variable-label');
                        var varName = $input.prop('name');

                        var value = $.trim($input.val());
                        var defaultValue = $.trim($input.attr('data-default'));

                        var type = $input.attr('data-type');

                        if (type === TYPE_COLOR && tinyColorParserAvailable) {
                            value = window.tinycolor(value).toRgbString();
                            defaultValue = window.tinycolor(defaultValue).toRgbString();
                        }

                        if (varName && value !== defaultValue) {
                            $label.addClass('modified');
                            showResetGroupButton = true;
                        }else{
                            $label.removeClass('modified');
                        }
                    });

                    if(showResetGroupButton){
                        $resetGroupButton.show();
                    }else{
                        $resetGroupButton.hide();
                    }
                });

                refreshResetAllButton();
            }

            function refreshResetAllButton(){
                if($('.resetGroupButton:visible').size()){
                    $resetAllButton.show();
                }else{
                    $resetAllButton.hide();
                }
            }

            $resetAllButton.click(function(){
                showConfirmModal('<b>'+i18n['reset-all-confirm']+'</b>', function(){
                    resetVariables();
                    $('.resetGroupButton').hide();
                    $resetAllButton.hide();
                    refreshStylesOnce();
                });
            });




            //Auto-refresh:
            var $autoRefreshChecks = $(".autoRefreshCheck");
            $autoRefreshChecks.change(function() {
                autoRefreshEnabled = $(this).prop('checked');
                $autoRefreshChecks.prop('checked', autoRefreshEnabled);

                storeLocalData(AUTO_REFRESH_PREFERENCE, autoRefreshEnabled ? "1" : "0");
            });
            $autoRefreshChecks.prop('checked', autoRefreshEnabled);






           /**
            * Removes the "@" character from the beginning of the variable name, if present.
            * @param {string} variableName 
            * @returns {string}
            */
            function removeVariableMarkFromName(variableName){
                if (variableName.indexOf("@") === 0) {
                    variableName = variableName.slice(1, variableName.length);
                }

                return variableName;
            }

            /**
             * Get current variable values in the user interface.
             * @param {bool} includeNotChangedVariables Whether to include variables that have a value different than theme default. False by default
             * @param {bool} removeMarkFromVariableNames Whether to remove the "@" character from the beginning of the variable name. False by default
             * @returns {object}
             */
            function getLessVariablesValues(includeNotChangedVariables, removeMarkFromVariableNames){
                var $variableInputs = $(".uikit-customizer-variable.available").find('input, select');

                var customLessVariables = {};

                $variableInputs.each(function() {
                    var $input = $(this);
                    var varName = $input.prop('name');

                    if(removeMarkFromVariableNames){
                        varName = removeVariableMarkFromName(varName);
                    }

                    var value = $.trim($input.val());
                    var defaultVale = $.trim($input.attr('data-default'));

                    var type = $input.attr('data-type');

                    if(type === TYPE_COLOR && tinyColorParserAvailable){
                        value = window.tinycolor(value).toRgbString();
                        defaultVale = window.tinycolor(defaultVale).toRgbString();
                    }

                    if (varName && (includeNotChangedVariables || value !== defaultVale)) {
                        customLessVariables[varName] = value;
                    }
                });

                return customLessVariables;
            }

            var CUSTOM_LESS_CODE_START_MARK_TEXT = '//___CUSTOM LESS CODE START___';
            function createCustomizationLESSCode(){
                var lessCode = "";

                //Theme:
                lessCode += "/* Theme: "+currentTheme+" */\n";

                //Variables:
                var customLessVariables = getLessVariablesValues();

                if(customLessVariables){
                    $.each(customLessVariables, function(name, value){
                        lessCode += name + ":"+value+";\n";
                    });
                }

                if($checkUseCustomLess.is(':checked')){
                    lessCode += "\n\n";
                    lessCode += CUSTOM_LESS_CODE_START_MARK_TEXT+"\n";
                    lessCode += $customLessTextarea.val();
                }

                return lessCode;
            }

            /**
             * Loads the customizer configuration previously saved to a file
             * @param {string} lessCode File content
             */
            function loadCustomizationLESSCode(lessCode){
                var firstLine = lessCode.split('\n')[0];

                var selectedThemeMatch = new RegExp("Theme *[:]? *([^ \*]+)", "i").exec(firstLine);

                //Try to get custom less code:
                var customLessCodeStartIndex = lessCode.indexOf(CUSTOM_LESS_CODE_START_MARK_TEXT);
                if(customLessCodeStartIndex !== -1){
                    var customLessCode = $.trim(lessCode.slice(customLessCodeStartIndex + CUSTOM_LESS_CODE_START_MARK_TEXT.length));
                    lessCode = lessCode.slice(0, customLessCodeStartIndex);//Remove custom code for variable extraction

                    $checkUseCustomLess.prop('checked', true);
                    $checkUseCustomLess.change();
                    $customLessTextarea.val(customLessCode);
                    $customLessTextarea.attr('data-changed', new Date().getTime());
                    $customLessEditor.setValue(customLessCode);
                }else{
                    $checkUseCustomLess.prop('checked', false);
                    $checkUseCustomLess.change();
                }

                var customLessVariables = jqueryLess.getVars(lessCode);

                if(selectedThemeMatch){
                    var selectedTheme = selectedThemeMatch[1];
                    $themeSelector.val(selectedTheme);
                }

                refreshStyles(customLessVariables, true);

                refreshResetButtons();
            }




            /**
             * Save current styles and use them for the actual site
             */
            $("#saveLESSButton").click(function(){
                disableControls();

                function showSuccessModal() {
                    var $successDiv = $("<div>")
                            .addClass('uk-alert uk-alert-success uk-margin-top')
                            .text(i18n['styles-saved']);

                    showConfirmModal($successDiv, function(){
                        window.location = wwwroot;
                    }, i18n['home'] + ' <i class="uk-icon uk-icon-home"></i>', i18n['ok']);
                }

                var showErrorModal = function(text) {
                    var $errorDiv = $("<div>")
                            .addClass('uk-alert uk-alert-danger uk-margin-top');

                    if (text) {
                        $errorDiv.text(i18n['styles-saved-error']+": " + text);
                    } else {
                        $errorDiv.text(i18n['styles-saved-error']);
                    }

                    $("#uikit-modal-dialog").find('.content').html($errorDiv);
                    var modal = $.UIkit.modal("#uikit-modal-dialog");
                    modal.show();
                };




                //Prepare data:
                var saveParams = {
                    theme: $themeSelector.val(),
                    css: compiledCssWithoutMoodlePostProcess,
                    lessVariables: getLessVariablesValues(true, true)
                };

                if($checkUseCustomLess.is(':checked')){
                    saveParams['customLess'] = $customLessTextarea.val();
                }


                $.ajax({
                    url: SAVE_LESS_AJAX_URL,
                    cache: false,
                    type: "POST",
                    data: saveParams,
                    dataType: "json",
                    success: function(response) {
                        enableControls();

                        if (response['status'] === 'ok') {
                            showSuccessModal();
                        } else {
                            showErrorModal(response['message']);
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        showErrorModal();
                        enableControls();
                    }
                });
            });

            /**
             * Saves current customizer configuration to a file
             */
            $("#getLESSButton").click(function(event){
                event.preventDefault();

                var lessCode = createCustomizationLESSCode();

                var blob = new Blob([lessCode], {type: "text/css"});
                saveAs(blob, "styles.less");
            });

            var $fileInput = $("#filechooser");
            $fileInput.change(function(event) {
                var input = event.target;
                var reader = new FileReader();

                reader.onload = function(e) {
                    var lessCode = reader.result;
                    loadCustomizationLESSCode(lessCode);
                };

                reader.readAsText(input.files[0]);
            });
            $("#loadLESSButton").click(function(event) {
                event.preventDefault();
                $fileInput.click();//Show file chooser
            });


            //Setup custom code textarea:
            var $customLessEditor = CodeMirror.fromTextArea(document.getElementById("customLess"), {
                theme: 'solarized light',
                lineNumbers: true,
                matchBrackets: true,
                autoCloseBrackets: true,
                styleActiveLine: true,
                mode: "text/x-less"
            });

            var $checkUseCustomLess = $("#useCustomLess");
            var $customLessContainer = $("#customLessContainer");
            var $customLessTextarea = $("#customLess");

            function applyCustomLessVisibility(){
                if($checkUseCustomLess.is(':checked')){
                    $customLessContainer.slideDown();
                    $customLessTextarea.prop('disabled', false);
                }else{
                    $customLessContainer.slideUp();
                    $customLessTextarea.prop('disabled', true);
                }
            }
            applyCustomLessVisibility();

            $checkUseCustomLess.change(function(){
                applyCustomLessVisibility();

                if(autoRefreshEnabled){
                    refreshStylesOnce();
                }
            });

            $customLessTextarea.change(function(){
                if(autoRefreshEnabled){
                    refreshStylesOnce();
                }
            });

            var customCodeChanged = false;

            $customLessEditor.on('change', function(){
                customCodeChanged = true;
            });

            $customLessEditor.on('blur', function(){
                if(customCodeChanged){
                    $customLessTextarea.val($customLessEditor.getValue());
                    $customLessTextarea.change();
                    $customLessTextarea.attr('data-changed', new Date().getTime());
                }
                customCodeChanged = false;
            });

            var $modalDialog = $("#uikit-modal-dialog");
            var $modalAcceptButton = $("#modalAcceptButton");
            var $modalCancelButton = $("#modalCancelButton");
            $modalAcceptButton.attr('data-original-text', $modalAcceptButton.html());
            $modalCancelButton.attr('data-original-text', $modalCancelButton.html());

            function showModal(html){
                $modalDialog.find('.content').html(html);
                $modalDialog.find('.modalButtonsDiv').hide();
                var modal = $.UIkit.modal("#uikit-modal-dialog");
                modal.show();
            }

            /**
             * Show a ok/cancel dialog with custom HTML
             * @param {string} html
             * @param {function} acceptFunction
             * @param {string} okText Optional
             * @param {string} cancelText Optional
             */
            function showConfirmModal(html, acceptFunction, okText, cancelText){
                $modalDialog.find('.content').html(html);
                $modalDialog.find('.modalButtonsDiv').show();
                var modal = $.UIkit.modal("#uikit-modal-dialog");
                modal.show();


                if(okText){
                    $modalAcceptButton.html(okText);
                }else{
                    $modalAcceptButton.html($modalAcceptButton.attr('data-original-text'));
                }

                if(cancelText){
                    $modalCancelButton.html(cancelText);
                }else{
                    $modalCancelButton.html($modalCancelButton.attr('data-original-text'));
                }

                $modalAcceptButton.unbind('click.acceptmodal');
                $modalAcceptButton.bind('click.acceptmodal', acceptFunction);
            }
        });
    }
    
    return {
        initialize: initEvents
        //Empty module
    };
});