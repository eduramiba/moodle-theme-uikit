/*
* This code has been obtained and adapted from http://www.getuikit.com/docs/customizer.html
*/
/* global define, less */

(function (mod) {
    function buildAbsoluteURL(relativeURL){
        return window.moodlewwwroot + relativeURL;
    }
    
    var dependencies = [
        'jquery',
        buildAbsoluteURL('/theme/uikit/javascript/less.js')
    ];
    
    if (typeof define === "function" && define.amd){ // AMD
        return define(dependencies, mod);
    } else {// Plain browser env
        window.jqueryLess = mod(jQuery, less);
    }
})(function($, less) {
    function getCSS(source, options) {

        var deferred = $.Deferred(), opts = options || {};

        (opts.imports ? resolveImports(source) : $.Deferred().resolve(source)).done(function(source) {
            createCSS();
        });

        function createCSS() {
            
            var lessInput = source;
            var lessOptions = {};
            
            if(opts.variables && !$.isEmptyObject(opts.variables)){
                lessOptions.modifyVars = opts.variables;
            }
            
            less.render(lessInput, lessOptions)
            .then(function(output) {
                // output.css = string of css
                // output.map = string of sourcemap
                // output.imports = array of string filenames of the imports referenced
                deferred.resolve(output.css);
            },
            function(error) {
                deferred.reject(error);
            });
        }
        return deferred.promise();
    }

    function resolveImports(source) {
        var cacheKey = window.theme_uikit_version;

        var deferred = $.Deferred(), imports = {}, host = extractUrlParts(window.location.href).host, importRegex = /@import\s+url\s*\(['"]?(.+?)['"]?\)\s*;/g, urlRegex = /url\s*\(['"]?(.+?)['"]?\)/g;

        function queuedWhen(queue) {

            var deferreds = [], prev = null;

            $.each(queue, function(i, fn) {
                deferreds.push(prev = prev ? prev.then(fn) : fn.call());
            });

            return $.when.apply($, deferreds);
        }

        function rewrite(source, baseUrl) {

            source = source.replace(/@import\s['"]?(.+?)['"]?\s*;/g, function(match, url) {
                return match.indexOf("url(")!=-1 ? match:'@import url("'+url+'");';
            });

            return source.replace(urlRegex, function(match, url) {
                return match.match(/data\:image\//) ? match : match.replace(url, extractUrlParts(url, baseUrl).url);
            });
        }

        (function resolve(source) {

            var queue = [];

            source = source.replace(/@import\s['"]?(.+?)['"]?\s*;/g, function(match, url) {
                return match.indexOf("url(")!=-1 ? match:'@import url("'+url+'");';
            });

            source.replace(importRegex, function(match, url) {

                if (!imports[url] && host == extractUrlParts(url).host) {
                    queue.push(
                        function() {
                            return $.ajax({url: url, data: {cacheKey: cacheKey}, cache: true}).done(function(data) {
                                imports[url] = rewrite(data.replace(/\/\*(?:[^*]|\*+[^\/*])*\*+\/|^((?!:).)?\/\/.*/g, ''), url);
                            }).fail(function(xhr, status, error) {
                                imports[url] = "/* Can't resolve import '" + url + "' (" + status + ", " + error + ") */";
                            });
                        }
                    );
                }

                return match;
            });

            queuedWhen(queue).always(function() {

                source = source.replace(importRegex, function(match, url) {
                    return imports[url] ? imports[url] : match;
                });

                if (queue.length) {
                    source = resolve(source);
                } else {
                    deferred.resolve(source);
                }
            });

            return source;

        })(rewrite(source.replace(/\/\*(?:[^*]|\*+[^\/*])*\*+\/|^((?!:).)?\/\/.*/g, '')));

        return deferred.promise();
    }

    function getVars(source) {

        var i, vars = {}, lines = source.split("\n");

        for (i = 0, max = lines.length; i < max; i++) {

            var line = $.trim(lines[i]);

            if (!line.length) continue;
            
            //Extract parts:
            var match = line.match(/(@[\w\-]+\s*):(.[^;]*);/);
            if(match){
                vars[$.trim(match[1])] = $.trim(match[2]);
            }
        }

        return vars;
    }

    function rewriteUrls(source, baseUrl) {
        return source.replace(/url\s*\(['"]?(.+?)['"]?\)/g, function(match, url) {
            return (url.match(/^(http|\/\/)/) || match.match(/data\:image\//)) ? match : match.replace(url, pathDiff(extractUrlParts(url, baseUrl).url, baseUrl));
        });
    }

    function pathDiff(url, baseUrl) {

        var urlParts = extractUrlParts(url), urlDirs,
            baseUrlParts = extractUrlParts(baseUrl), baseUrlDirs,
            diff = "", max, i;

        if (urlParts.host !== baseUrlParts.host) {
            return "";
        }

        max = Math.max(baseUrlParts.dirs.length, urlParts.dirs.length);

        for (i = 0; i < max; i++) {
            if (baseUrlParts.dirs[i] !== urlParts.dirs[i]) { break; }
        }

        urlDirs = urlParts.dirs.slice(i);
        baseUrlDirs = baseUrlParts.dirs.slice(i);

        for (i = 0; i < baseUrlDirs.length - 1; i++) {
            diff += "../";
        }

        for (i = 0; i < urlDirs.length - 1; i++) {
            diff += urlDirs[i] + "/";
        }

        return diff + urlParts.file + urlParts.query;
    }

    function extractUrlParts(url, baseUrl) {

        var urlPartsRegex = /^((?:[a-z-]+:)?\/\/(?:[^\/\?#]*\/)|([\/\\]))?((?:[^\/\\\?#]*[\/\\])*)([^\/\\\?#]*)([#\?].*)?$/,
            urlParts = url.match(urlPartsRegex), baseUrlParts,
            parts = {}, dirs = [], i;

        if (!urlParts) {
            throw new Exception("Could not parse url - '" + url + "'");
        }

        if (!urlParts[1] || urlParts[2]) {

            if (!baseUrl) {
                baseUrl = window.location.href;
            }

            baseUrlParts = baseUrl.match(urlPartsRegex);

            if (!baseUrlParts) {
                throw new Exception("Could not parse url - '" + baseUrl + "'");
            }

            urlParts[1] = baseUrlParts[1];

            if (!urlParts[2]) {
                urlParts[3] = baseUrlParts[3] + urlParts[3];
            }
        }

        if (urlParts[3]) {

            dirs = urlParts[3].replace("\\", "/").split("/");

            for (i = 0; i < dirs.length; i++) {
                if (dirs[i] === ".." && i > 0) {
                    dirs.splice(i-1, 2);
                    i -= 2;
                }
            }
        }

        parts.host = urlParts[1];
        parts.path = urlParts[1] + dirs.join("/");
        parts.file = urlParts[4] || "";
        parts.query = urlParts[5] || "";
        parts.url = parts.path + parts.file + parts.query;
        parts.dirs = dirs;

        return parts;
    }

    return {
        'getCSS': getCSS,
        'getVars': getVars,
        'resolveImports': resolveImports,
        'rewriteUrls': rewriteUrls,
        'pathDiff': pathDiff,
        'extractUrlParts': extractUrlParts
    };
});