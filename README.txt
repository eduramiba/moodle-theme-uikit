About this theme
================

This is the UIKit theme for Moodle.
It was initially developed for Moodle 2.5.1
It supports Moodle 2.5.1, 2.6 and 2.7

* package   Moodle UIKit theme
* copyright 2013-2014 Eduardo Ramos
* authors   Eduardo Ramos
* license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later

This theme is based in bootstrapbase theme and essential theme (https://moodle.org/plugins/view.php?plugin=theme_essential).
A big thank you to the creators of these two themes.

Many features and settings are based on the essential theme, while others are new for this theme, specially the visual style manager.

This theme is based on the UIKit CSS framework version 2.8 (http://www.getuikit.com)
It contains all unmodified less* CSS sources from the UIKit framework in folder /less/uikit, except for FontAwesome url in icon.less.


*less CSS
Less CSS is a Object Oriented way of writing CSS code. All Less CSS files
for this theme are stored in the /less folder. A developer can use less
to generate the CSS files in the /style folder.


This theme includes an advanced Visual Style Customizer to change the appearance of the whole site.
This customizer is inspired in the UIKit customizer (http://www.getuikit.com/docs/customizer.html)






JavaScript Libraries


Blob.js and Filesaver.js
------------------------
Libraries for javascript creation and downloading of dynamically created files
Used for exporting and importing LESS files in the customizer

html5shiv.js
------------
To provide backwards compatibility for HTML5 for Internet Explorer 7 (IE7) and Internet
Explorer 8 (IE8) a javascript library call /javascript/html5shiv.js was added. This
JavaScript converts HTML tags and CSS into Tag that are understood by IE7 and IE8.
The config.php makes sure these libraries are only loaded for IE7 and IE8.

This theme uses the original unmodified html5shiv.js JavaScript library to enable HTML5 tags in IE7 and IE8.
This library is available on:

https://github.com/aFarkas/html5shiv/blob/master/src/html5shiv.js

less.js
-------
LESS - Leaner CSS v1.7.4
Javascript official LESS compiler
Used to extract variables and evaluate expressions from LESS code in the browser by the customizer

spectrum.colorpicker.js
--------------------
Spectrum Colorpicker v1.2.0 for the customizer color variables

codemirror.js and codemirror less.js mode
--------------------
CodeMirror version 3.21
Library for advanced source code edition in a text area
Used to edit custom LESS code in the customizer

uikit.js
---------
UIKit framework javascripts









Licenses & Authors
==================

Blob.js
------------------------
Author: Eli Grey, Devin Samarin
URL: http://eligrey.com, https://github.com/eboyjr
License: X11/MIT

FileSaver.js
------------------------
Author: Eli Grey 
URL: http://eligrey.com
License: X11/MIT

codemirror.js
--------------------
Author: Copyright (C) 2013 by Marijn Haverbeke <marijnh@gmail.com> and others
URL: http://codemirror.net/
License: See codemirror LICENSE file

Html5shiv.js
------------
Author: Sjoerd Visscher
URL: http://en.wikipedia.org/wiki/HTML5_Shiv, https://github.com/aFarkas/html5shiv
License: MIT/GPL2 Licensed

less.js
------------
Author: Alexis Sellier <self@cloudhead.net> 
URL: http://lesscss.org
License: Apache v2 License

spectrum.colorpicker.js
------------
Author: Brian Grinstead
URL: https://github.com/bgrins/spectrum
License: MIT License

UIkit framework
------------
Author: 2014 YOOtheme
URL: http://www.getuikit.com 
License: MIT License

Check each library LICENSE files for more details