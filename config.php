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
 * Configuration for UIKit Theme.
 *
 * For full information about creating Moodle themes, see:
 * http://docs.moodle.org/dev/Themes_2.0
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @authors   Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

$THEME->doctype = 'html5';
$THEME->yuicssmodules = array();
$THEME->name = 'uikit';
$THEME->parents = array();
$THEME->supportscssoptimisation = false;

//Load current style settings:
global $DB;
$table = "theme_uikit_less_settings";

//Check if generated styles are available for the site and load them
$context = context_system::instance();
$fileinfo = array(
    'contextid' => $context->id,
    'component' => 'theme_uikit',
    'filearea' => 'theme_uikit_styles',
    'itemid' => 0,
    'filepath' => '/',
    'filename' => 'theme_uikit_generated_styles.css'
);

$fs = get_file_storage();
$generated_css_file = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'], 
    $fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);

$THEME->sheets = array();
if ($generated_css_file) {
    $THEME->sheets[]= 'generated';//Load a file with just a placeholder where the real saved styles will be put by the theme post-process function
}else{
    $THEME->sheets[]= 'themeuikit';//Load base styles for theme uikit
}

$THEME->csspostprocess = 'theme_uikit_process_css';

$THEME->sheets[]= 'slides';

$THEME->editor_sheets = array();

$THEME->plugins_exclude_sheets = array(
    'block' => array(
        'html'
    ),
    'gradereport' => array(
        'grader',
    ),
);

$THEME->rendererfactory = 'theme_overridden_renderer_factory';

$THEME->layouts = array(
    // Most backwards compatible layout without the blocks - this is the layout used by default
    'base' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post',
    ),
    // Front page.
    'frontpage' => array(
        'file' => 'frontpage.php',
        'regions' => array('side-pre', 'home-up', 'home-left', 'home-middle', 'home-right', 'home-down', 'footer-left', 'footer-middle', 'footer-right', 'hidden-dock'),
        'defaultregion' => 'hidden-dock'
    ),
    // Standard layout with blocks, this is recommended for most pages with general information.
    'standard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right', 'hidden-dock'),
        'defaultregion' => 'side-post',
    ),
    // Course page.
    'course' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post'
    ),
    // Page content and modules.
    'incourse' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post',
    ),
    // Category listing page.
    	'coursecategory' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post',
    ),
    // My dashboard page.
    'mydashboard' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    // My public page.
    'mypublic' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'side-post', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-post',
        'options' => array('langmenu'=>true),
    ),
    // Public Login page.
    'login' => array(
        'file' => 'login.php',
        'regions' => array('footer-left', 'footer-middle', 'footer-right', 'hidden-dock'),
        'defaultregion' => 'hidden-dock',
        'options' => array('langmenu'=>true),
    ),
    // Server administration scripts.
    'admin' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-pre',
    ),
    // Report Pages.
    'report' => array(
        'file' => 'general.php',
        'regions' => array('side-pre', 'footer-left', 'footer-middle', 'footer-right'),
        'defaultregion' => 'side-pre',
    ),
    
	
	// Embeded pages, like iframe/object embeded in moodleform - it needs as much space as possible.
    'embedded' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks' => true, 'nobreadcrumbs' => true, 'noheader' => true)
    ),
    // Maintenance page
    'maintenance' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks' => true, 'nobreadcrumbs' => true, 'noheader' => true)
    ),
    // Popup layout with only content and header
    'popup' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks' => true, 'nobreadcrumbs' => true, 'noheader' => true)
    ),
	// Should display the content and basic headers only.
    'print' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks' => true, 'nobreadcrumbs' => true, 'noheader' => true)
    ),
    // Redirect page
    'redirect' => array(
        'file' => 'general.php',
        'regions' => array(),
        'options' => array('noblocks' => true, 'nobreadcrumbs' => true, 'noheader' => true)
    )
);

$THEME->javascripts = array(
    'uikit',
    'uikit-addons/sticky',
    'general',
    'modernizr',
	'cslider'
);

$useragent = '';
if (!empty($_SERVER['HTTP_USER_AGENT'])) {
    $useragent = $_SERVER['HTTP_USER_AGENT'];
}

if(class_exists('core_useragent')){
    if (core_useragent::is_ie() && !core_useragent::check_ie_version('9.0')) {
        $THEME->javascripts[] = 'html5shiv';
    }
}else{
    if (check_browser_version('MSIE') && !check_browser_version('MSIE', '9.0')) {
        $THEME->javascripts[] = 'html5shiv';
    }
}


$THEME->hidefromselector = false;

$THEME->blockrtlmanipulations = array(
    'side-pre' => 'side-post',
    'side-post' => 'side-pre'
);
