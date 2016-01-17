<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * This page implements the visual styles customizer for this theme.
 * It allows the user to change style variables, see the changes immediately, save them and import/export them.
 * 
 * It's a Javascript-heavy page (see customizer.js file)
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once('../../../config.php');

$url = $CFG->wwwroot.'/theme/uikit/customizer/index.php';

//Require login
require_login(0, false);


//Require site config permissions:
$context = context_system::instance();
if (!has_capability("moodle/site:config", $context)) {
    print_error('accessdenied', 'admin');
    die;
}

global $DB;


$PAGE->set_context($context);
$PAGE->set_pagelayout('popup');//Use a simple layout without side bars
$PAGE->set_title(sprintf("%s - %s", $SITE->fullname, get_string('visualstylemanager', 'theme_uikit')));
$PAGE->set_heading($SITE->fullname);
$PAGE->set_url($url);
$PAGE->navigation->clear_cache();

//Make sure theme designer mode is enabled:
if(!$CFG->themedesignermode){
    set_config("themedesignermode", true);
    purge_all_caches();
    
    redirect($url, get_string('themedesignerenabled', 'theme_uikit'));
}

$themeversion = $PAGE->theme->settings->version;


//Only include these javascripts if current Moodle version does not have RequireJS. Otherwise they are included in customizer_require_load.js
//We do this to support both Moodle 2.9+ and 2.8 or less (no RequireJS) with the same code.
if(!method_exists($PAGE->requires, 'js_call_amd')) {
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/less.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/jquery.less.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/codemirror/lib/codemirror.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/codemirror/mode/css/css.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/codemirror/addons/edit/matchbrackets.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/codemirror/addons/edit/closebrackets.js?'.$themeversion));
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/codemirror/addons/selection/active-line.js?'.$themeversion));
    
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/customizer.js?'.$themeversion));
} else {
    $PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/customizer_require_load.js?'.$themeversion));
}

$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/spectrum.colorpicker.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/Blob.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/FileSaver.js'));
$PAGE->requires->js(new moodle_url($CFG->wwwroot . '/theme/uikit/javascript/uikit-addons/autocomplete.js?'.$themeversion));

$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/theme/uikit/style/spectrum.colorpicker.css'));
$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/theme/uikit/style/spectrum.colorpicker.custom.css'));
$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/theme/uikit/style/customizer.css'));

//Codemirror editor for custom LESS
$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/theme/uikit/style/codemirror/codemirror.css?'.$themeversion));
$PAGE->requires->css(new moodle_url($CFG->wwwroot . '/theme/uikit/style/codemirror/theme/solarized.css?'.$themeversion));

//Load current settings:
$table = "theme_uikit_less_settings";
$aSettings = $DB->get_records_menu($table, null, null, "setting, value");

$isCustomLessUsed = !empty($aSettings['customLess']);
if($isCustomLessUsed){
    $customLessInitial = $aSettings['customLess'];
    unset($aSettings['customLess']);
}else{
    $customLessInitial = 
'/*
    '.get_string('custom_less_default', 'theme_uikit').'
*/';
}

$uikitTheme = 'default';
if(!empty($aSettings['theme'])){
    $uikitTheme = $aSettings['theme'];
}

//Load customizer configuration and properties:
include dirname(__FILE__).'/loadConfig.php';

/// print header stuff ------------------------------------------------------------
echo $OUTPUT->header();


//Also require that current theme is uikit theme
$current_theme = $PAGE->theme;
if($current_theme->name === 'uikit'){
    
    /// print customizer stuff --------------------------------------------------------
    ?>

        <script type="text/javascript">
            window.moodlewwwroot = '<?php echo $CFG->wwwroot; ?>';
            <?php if(!empty($aSettings)){ ?>
                window.currentSettings = <?php echo json_encode($aSettings); ?>;
            <?php } ?>
            window.customizerConfig = <?php echo json_encode($customizerConfig); ?>;
            window.theme_uikit_version = <?php echo $themeversion; ?>;
        </script> 
        
    <?php 
    /**
     * UIKit autocomplete template for font-family fields in customizer.js
     */
    ?>
    <script id="autocompleteTemplate" type="text/autocomplete">
        <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
            {{~items}}
            <li data-value="{{ $item.value }}">
                <a>
                    {{ $item.title }}
                    <div>{{{ $item.text }}}</div>
                </a>
            </li>
            {{/items}}
        </ul>
    </script>

    <!-- Modal dialog -->
    <div id="uikit-modal-dialog" class="uk-modal">
        <div class="uk-modal-dialog uk-modal-dialog-slide">
            <a href="" class="uk-modal-close uk-close"></a>
            <div class="content">
                
            </div>
            <div class="modalButtonsDiv uk-margin-top uk-text-right" style="display: none;">
                <hr />
                <button id="modalCancelButton" class="uk-button uk-modal-close"><?php echo get_string('cancel', 'theme_uikit') ?></button>
                <button id="modalAcceptButton" class="uk-button uk-button-primary uk-modal-close"><?php echo get_string('accept', 'theme_uikit') ?></button>
            </div>
        </div>
    </div>
    
    <!-- Message for modal dialog when theme is changed -->
    <div id="themeChangeMessage" class="uk-text-bold" style="display: none;">
        <p><?php echo get_string('warning_variables_changed', 'theme_uikit') ?></p>
        <p><input type="checkbox" id="keepVariableValuesBetweenThemes" class="keepVariableValuesBetweenThemes" checked/> <label for="keepVariableValuesBetweenThemes"><?php echo get_string('keep_variables', 'theme_uikit') ?></label></p>
        <p class="uk-text-center"><?php echo get_string('continue_refreshing', 'theme_uikit') ?></p>
    </div>

    <form id="customizerForm" class="uk-form" autocomplete="off">
        <div class="uk-grid uk-grid-small uk-grid-preserve" data-uk-grid-match>
            <div class="uk-width-1-1 uk-width-medium-3-10 uk-width-large-1-4">
                <div class="uk-panel uk-panel-box">
                        <fieldset>
                            <legend><?php echo get_string('base_theme', 'theme_uikit') ?></legend>
                            <div class="uk-form-row">
                                <select id="uikit-theme" name="theme">
                                    <option value="default" <?php echo $uikitTheme === 'default' ? 'selected' : ''; ?>><?php echo get_string('basic', 'theme_uikit') ?></option>
                                    <option value="almost-flat" <?php echo $uikitTheme === 'almost-flat' ? 'selected' : ''; ?>><?php echo get_string('almost-flat', 'theme_uikit') ?></option>
                                    <option value="gradient" <?php echo $uikitTheme === 'gradient' ? 'selected' : ''; ?>><?php echo get_string('gradient', 'theme_uikit') ?></option>
                                </select>
                            </div>
                        </fieldset>
                        <div id="customizerVariablesDiv" class="uk-form-row">
                            <div class="uk-text-center uk-margin-bottom">
                                <button type="button" class="customizerButton customizerRefreshButton uk-button uk-button-primary" disabled><span class="uk-icon uk-icon-refresh"></span> <?php echo get_string('refresh', 'theme_uikit') ?></button>
                                <input type="checkbox" class="autoRefreshCheck uk-margin-left"/> <?php echo get_string('auto_refresh', 'theme_uikit') ?>
                            </div>
                            <div id="customizerVariablesGroups">
                            </div>
                            <div class="uk-text-center uk-margin-top">
                                <button type="button" class="customizerButton customizerRefreshButton uk-button uk-button-primary" disabled><span class="uk-icon uk-icon-refresh"></span> <?php echo get_string('refresh', 'theme_uikit') ?></button>
                                <input type="checkbox" class="autoRefreshCheck uk-margin-left"/> <?php echo get_string('auto_refresh', 'theme_uikit') ?>
                            </div>

                            <div class="uk-panel uk-panel-box uk-panel-box-primary uk-text-center uk-margin-top">
                                <div class="uk-margin-bottom">
                                    <button type="button" id="saveLESSButton" class="customizerButton uk-button uk-button-success" title="<?php echo get_string('save_styles_tooltip', 'theme_uikit') ?>" disabled data-uk-tooltip>
                                        <span class="customizerButton uk-icon uk-icon-check-circle-o"></span> <?php echo get_string('save_styles', 'theme_uikit') ?>
                                    </button>
                                </div>
                                <div class="exportImportActions uk-margin-bottom">
                                    <button type="button" id="getLESSButton" class="customizerButton uk-button" title="<?php echo get_string('export_less_tooltip', 'theme_uikit') ?>" disabled data-uk-tooltip><span class="uk-icon uk-icon-download"></span> <?php echo get_string('export_less', 'theme_uikit') ?></button>
                                    <button type="button" id="loadLESSButton" class="customizerButton uk-button" title="<?php echo get_string('import_less_tooltip', 'theme_uikit') ?>" disabled data-uk-tooltip><span class="uk-icon uk-icon-upload"></span> <?php echo get_string('import_less', 'theme_uikit') ?></button>
                                </div>
                                <div>
                                    <button type="button" id="resetAllButton" class="customizerButton uk-button uk-button-danger" disabled><span class="uk-icon uk-icon-undo"></span> <?php echo get_string('reset_all', 'theme_uikit') ?></button>
                                </div>
                            </div>
                        </div>
                        <h1 id="loadingVariablesIcon" class="uk-text-center">
                            <span class="uk-icon uk-icon-spinner uk-icon-spin"></span>
                        </h1>
                </div>
            </div>
            <div class="uk-width-1-1 uk-width-medium-7-10 uk-width-large-3-4">
                <h1 id="loadingIcon" class="uk-text-center">
                    <span class="uk-icon uk-icon-spinner uk-icon-spin"></span>
                </h1>
                <iframe id="embeddedSite" src="<?php echo $CFG->wwwroot; ?>">
                </iframe>
            </div>
        </div>
        <div id="customLESSDiv" class="uk-panel uk-panel-box uk-margin-top">
            <div class="uk-form-row">
                <input type="checkbox" id="useCustomLess" <?php echo $isCustomLessUsed ? 'checked' : ''?>/> <span class="uk-text-bold"><?php echo get_string('custom_less', 'theme_uikit') ?></span>
            </div>
            <div id="customLessContainer" class="uk-margin-top">
                <textarea id="customLess" name="customLess"><?php echo $customLessInitial; ?></textarea>
            </div>
        </div>
        <div class="uk-alert uk-alert-danger">
            <p><span class="uk-icon uk-icon-exclamation-triangle"></span> <?php echo get_string('warning_theme_designer_enabled', 'theme_uikit') ?></p>
            <p><a href="<?php echo $CFG->wwwroot; ?>/admin/settings.php?section=themesettings"><?php echo get_string('warning_theme_designer_disable', 'theme_uikit') ?></a></p>
            <p>
                <span class="uk-icon uk-icon-lightbulb-o"></span> <?php echo get_string('page_description', 'theme_uikit') ?>
                <a href="<?php echo $CFG->wwwroot; ?>/admin/settings.php?section=theme_uikit_generic"><?php echo get_string('page_description_sub', 'theme_uikit') ?></a>
            </p>
        </div>
        
        <?php if(!empty($customizerConfig['values']) && !empty($customizerConfig['values']['font-family'])){ ?>
            <datalist id="fontfamilydatalist">
                <!--[if IE]><select><!--<![endif]-->
                <?php foreach ($customizerConfig['values']['font-family'] as $label => $val) { ?>
                    <option label="<?php echo htmlspecialchars($label); ?>" value="<?php echo htmlspecialchars($val); ?>">
                <?php }?>
                <!--[if IE]><select><!--<![endif]-->
            </datalist>
        <?php } ?>
        
        <!-- Filechooser for importing LESS file -->
        <input type="file" id="filechooser" style="display: none;"/>
    </form>
    <?php
}else{
    ?>
    <div class="uk-alert uk-alert-danger uk-text-bold">
        <?php echo get_string('uikit_not_selected', 'theme_uikit') ?> <a href="<?php echo $CFG->wwwroot; ?>/theme/index.php"><?php echo get_string('uikit_select_link', 'theme_uikit') ?></a>
    </div>
    <?php
}
/// print footer stuff --------------------------------------------------------
echo $OUTPUT->footer();
