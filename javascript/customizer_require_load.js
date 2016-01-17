(function () {
    var wwwroot = window.moodlewwwroot;

    function buildAbsoluteURL(relativeURL) {
        return wwwroot + relativeURL;
    }

    var jsURL = buildAbsoluteURL('/theme/uikit/javascript/customizer.js');
    require([jsURL], function (customizer) {
        customizer.initialize();
    });
})();
