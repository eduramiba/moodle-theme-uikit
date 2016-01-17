UIkit Theme for Moodle
=======================

Key features of this theme
---------------------------

* **Contains a very advanced and interactive visual styles customizer**
* 3 base themes to build your site appearance
* 2 different page layouts: grid based and flex based
* Fully responsive design
* Support of Google fonts
* Integrates Fontawesome for displaying most icons in Moodle
* Slideshow, marketing spots and social networks for your site frontpage like in the essential theme
* Many other cool features such as: login page and navigation menu customization, possibility of showing only enrolled courses in combo lists and google analytics integration

It supports Moodle versions from 2.5 to 3.0

* package   Moodle UIkit theme (theme_uikit)
* copyright 2013-2016 Eduardo Ramos
* authors   Eduardo Ramos
* license   [GNU GPL v3 or later](http://www.gnu.org/copyleft/gpl.html)

This theme is based on the UIkit CSS framework version 2.24.3 (http://www.getuikit.com)
It contains all unmodified less* CSS sources from the UIKit framework in folder /less/uikit, except for FontAwesome url in icon.less.

It is inspired by bootstrapbase theme and essential theme (https://moodle.org/plugins/view.php?plugin=theme_essential). A big thank you to the creators of these two themes.

Many features and settings are based on the essential theme, while others are new for this theme, specially the visual style manager.

**Notice: these theme is NOT an official UIkit team release.**

*less CSS
Less CSS is a Object Oriented way of writing CSS code. All Less CSS files
for this theme are stored in the /less folder. A developer can use less
to generate the CSS files in the /style folder.


This theme includes an advanced Visual Style Customizer to change the appearance of the whole site with a few clicks. This customizer is inspired by the UIkit customizer (http://www.getuikit.com/docs/customizer.html)






JavaScript Libraries
=====================


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
LESS - Leaner CSS v2.5.3
Javascript official LESS compiler
Used to compile styles from LESS code in the browser in the customizer

spectrum.colorpicker.js
--------------------
Spectrum Colorpicker v1.2.0 for the customizer color variables

codemirror.js and codemirror less.js mode
--------------------
CodeMirror version 5.10
Library for advanced source code edition in a text area
Used to edit custom LESS code in the customizer

uikit.js
---------
UIkit framework javascript









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
Author: 2015 YOOtheme
URL: http://www.getuikit.com 
License: MIT License

Check each library LICENSE files for more details
