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
 * This is built using the Clean template to allow for new theme's using
 * UIKit framework
 *
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$settings = null;

defined('MOODLE_INTERNAL') || die;


$ADMIN->add('themes', new admin_category('theme_uikit', 'UIKit'));

//Visual style Manager link:
if ($hassiteconfig) { // needs this condition or there is error on login page
    $ADMIN->add('theme_uikit', new admin_externalpage('theme_uikit_visual_manager', 
        get_string('visualstylemanager', 'theme_uikit'), 
        $CFG->wwwroot."/theme/uikit/customizer/index.php", 
        'moodle/site:config'));
}





// "geneicsettings" settingpage
$temp = new admin_settingpage('theme_uikit_generic', get_string('geneicsettings', 'theme_uikit'));

// Default Site icon setting.
$name = 'theme_uikit/siteicon';
$title = get_string('siteicon', 'theme_uikit');
$description = get_string('siteicondesc', 'theme_uikit');
$default = 'graduation-cap';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$temp->add($setting);

// Include Awesome Font from Bootstrapcdn
$name = 'theme_uikit/bootstrapcdn';
$title = get_string('bootstrapcdn', 'theme_uikit');
$description = get_string('bootstrapcdndesc', 'theme_uikit');
$setting = new admin_setting_configcheckbox($name, $title, $description, 0);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Logo file setting.
$name = 'theme_uikit/logo';
$title = get_string('logo', 'theme_uikit');
$description = get_string('logodesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'logo');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Page Background Image.
$name = 'theme_uikit/pagebackground';
$title = get_string('pagebackground', 'theme_uikit');
$description = get_string('pagebackgrounddesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'pagebackground');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Header Background Image.
$name = 'theme_uikit/headerbackground';
$title = get_string('headerbackground', 'theme_uikit');
$description = get_string('headerbackgrounddesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'headerbackground');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Footer Background Image.
$name = 'theme_uikit/footerbackground';
$title = get_string('footerbackground', 'theme_uikit');
$description = get_string('footerbackgrounddesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'footerbackground');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Footer Image.
$name = 'theme_uikit/footerimage';
$title = get_string('footerimage', 'theme_uikit');
$description = get_string('footerimagedesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'footerimage');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Favicon file setting.
$name = 'theme_uikit/favicon';
$title = get_string('favicon', 'theme_uikit');
$description = get_string('favicondesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'favicon');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// User picture in header setting.
$name = 'theme_uikit/headerprofilepic';
$title = get_string('headerprofilepic', 'theme_uikit');
$description = get_string('headerprofilepicdesc', 'theme_uikit');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Copyright setting.
$name = 'theme_uikit/copyright';
$title = get_string('copyright', 'theme_uikit');
$description = get_string('copyrightdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$temp->add($setting);

// Footnote setting.
$name = 'theme_uikit/footnote';
$title = get_string('footnote', 'theme_uikit');
$description = get_string('footnotedesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Footer blocks setting.
$name = 'theme_uikit/footerblocks';
$title = get_string('footerblocks', 'theme_uikit');
$description = get_string('footerblocksdesc', 'theme_uikit');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_uikit');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_uikit');
$displayafterlogin = get_string('displayafterlogin', 'theme_uikit');
$dontdisplay = get_string('dontdisplay', 'theme_uikit');
$default = '0';
$choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Combo list with enrolled courses only
$name = 'theme_uikit/combolistshowonlyenrrolled';
$title = get_string('combolistshowonlyenrrolled', 'theme_uikit');
$description = get_string('combolistshowonlyenrrolleddesc', 'theme_uikit');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);






/* Custom Menu Settings */
$temp = new admin_settingpage('theme_uikit_custommenu', get_string('custommenuheading', 'theme_uikit'));

//This is the descriptor for the following Moodle settings
$name = 'theme_uikit/mydashboardinfo';
$heading = get_string('mydashboardinfo', 'theme_uikit');
$information = get_string('mydashboardinfodesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// Toggle dashboard display in custommenu.
$name = 'theme_uikit/displaymydashboard';
$title = get_string('displaymydashboard', 'theme_uikit');
$description = get_string('displaymydashboarddesc', 'theme_uikit');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

//This is the descriptor for the following Moodle settings
$name = 'theme_uikit/mycoursesinfo';
$heading = get_string('mycoursesinfo', 'theme_uikit');
$information = get_string('mycoursesinfodesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// Toggle courses display in custommenu.
$name = 'theme_uikit/displaymycourses';
$title = get_string('displaymycourses', 'theme_uikit');
$description = get_string('displaymycoursesdesc', 'theme_uikit');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Set terminology for dropdown course list
$name = 'theme_uikit/mycoursetitle';
$title = get_string('mycoursetitle', 'theme_uikit');
$description = get_string('mycoursetitledesc', 'theme_uikit');
$default = 'course';
$choices = array(
    'course' => get_string('mycourses', 'theme_uikit'),
    'unit' => get_string('myunits', 'theme_uikit'),
    'class' => get_string('myclasses', 'theme_uikit'),
    'module' => get_string('mymodules', 'theme_uikit'),
    'subject' => get_string('mysubjects', 'theme_uikit'),
);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Choose dropdown course list mode
$name = 'theme_uikit/displaymycoursesmode';
$title = get_string('displaymycoursesmode', 'theme_uikit');
$description = get_string('displaymycoursesmodedesc', 'theme_uikit');
$courselist = get_string('courselist', 'theme_uikit');
$onlytoplevelhierarchy = get_string('onlytoplevelhierarchy', 'theme_uikit');
$fullhierarchy = get_string('fullhierarchy', 'theme_uikit');
$default = '0';
$choices = array('0' => $courselist, '1' => $onlytoplevelhierarchy, '2' => $fullhierarchy);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);



/* Slideshow Widget Settings */
include dirname(__FILE__).'/settings/slideshow.php';

/* Login page settings */
include dirname(__FILE__).'/settings/loginpage.php';

/* Frontpage content settings */
include dirname(__FILE__).'/settings/frontpage.php';

/* Marketing Spot Settings */
include dirname(__FILE__).'/settings/marketing.php';

/* Social Networks Settings */
include dirname(__FILE__).'/settings/socialnetworks.php';

/* Mobile apps */
include dirname(__FILE__).'/settings/mobileapps.php';

/* Google Fonts */
include dirname(__FILE__).'/settings/googlefonts.php';

/* Google Analytics */
include dirname(__FILE__).'/settings/googleanalytics.php';