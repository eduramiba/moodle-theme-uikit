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

$temp = new admin_settingpage('theme_uikit_layout', get_string('layoutheading', 'theme_uikit'));


if(!function_exists('theme_uikit_redirect_to_layout_settings')){
    /**
    * We need to reload this page after a layout change or it could look weird.
    */
    function theme_uikit_redirect_to_layout_settings(){
        global $CFG;
        theme_reset_all_caches();
        redirect($CFG->wwwroot.'/admin/settings.php?section=theme_uikit_layout');
    }
}

global $PAGE;

// Layout mode setting
$name = 'theme_uikit/themelayout';
$title = get_string('themelayout', 'theme_uikit');
$description = get_string('themelayoutdesc', 'theme_uikit');
$default = 1;
$choices = array(1 => get_string('themelayout1', 'theme_uikit'), 2 => get_string('themelayout2', 'theme_uikit'));
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);

if($PAGE->pagelayout !== 'maintenance'){
    $setting->set_updatedcallback('theme_uikit_redirect_to_layout_settings');
}else{
    $setting->set_updatedcallback('theme_reset_all_caches');
}

$temp->add($setting);



$chosenlayout = get_config('theme_uikit', 'themelayout');

if($chosenlayout == 1){
    //No settings for the moment
}elseif($chosenlayout == 2){
    //Navigation buttons size
    $name = 'theme_uikit/navigationbuttonssize';
    $title = get_string('navigationbuttonssize', 'theme_uikit');
    $default = '';
    $choices = array(
        'uk-button-mini' => get_string('navigationbuttonssize-mini', 'theme_uikit'),
        'uk-button-small' => get_string('navigationbuttonssize-small', 'theme_uikit'),
        '' => get_string('navigationbuttonssize-normal', 'theme_uikit'),
        'uk-button-large' => get_string('navigationbuttonssize-large', 'theme_uikit'),
    );
    $setting = new admin_setting_configselect($name, $title, '', $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Navigation buttons class
    $name = 'theme_uikit/navigationbuttonsclass';
    $title = get_string('navigationbuttonsclass', 'theme_uikit');
    $default = '';
    $choices = array(
        '' => get_string('navigationbuttonsclass-normal', 'theme_uikit'),
        'uk-button-primary' => get_string('navigationbuttonsclass-primary', 'theme_uikit'),
        'uk-button-success' => get_string('navigationbuttonsclass-success', 'theme_uikit'),
        'uk-button-danger' => get_string('navigationbuttonsclass-danger', 'theme_uikit'),
        'uk-button-link' => get_string('navigationbuttonsclass-link', 'theme_uikit'),
    );
    $setting = new admin_setting_configselect($name, $title, '', $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Footer placement
    $name = 'theme_uikit/footerplacement';
    $title = get_string('footerplacement', 'theme_uikit');
    $default = 1;
    $choices = array(1 => get_string('footerplacementpageend', 'theme_uikit'), 2 => get_string('footerplacementaftermaincontent', 'theme_uikit'));
    $setting = new admin_setting_configselect($name, $title, '', $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
}

//Sticky navigation bar
$name = 'theme_uikit/stickynavigationbar';
$title = get_string('stickynavigationbar', 'theme_uikit');
$description = get_string('stickynavigationbardesc', 'theme_uikit');
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$stickynavigationbar = get_config('theme_uikit', 'stickynavigationbar');

/**
 * Sticky navigation options
 */
if($stickynavigationbar){
    $name = 'theme_uikit/stickynavigationbardelay';
    $title = get_string('stickynavigationbardelay', 'theme_uikit');
    $description = get_string('stickynavigationbardelaydesc', 'theme_uikit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default, PARAM_INT);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
}


//Breadcrumbs placement
$name = 'theme_uikit/breadcrumbsplacement';
$title = get_string('breadcrumbsplacement', 'theme_uikit');
$default = 1;
$choices = array(1 => get_string('breadcrumbsplacement-pagenavbar', 'theme_uikit'), 2 => get_string('breadcrumbsplacement-mainregion', 'theme_uikit'));
$setting = new admin_setting_configselect($name, $title, '', $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$breadcrumbsplacement = get_config('theme_uikit', 'breadcrumbsplacement');

if($breadcrumbsplacement == 2){
    $name = 'theme_uikit/pagenavbarcontent';
    $title = get_string('pagenavbarcontent', 'theme_uikit');
    $default = 'pageheading';
    $choices = array(
        'pageheading' => get_string('pagenavbarcontent-pageheading', 'theme_uikit'),
        'pagetitle' => get_string('pagenavbarcontent-pagetitle', 'theme_uikit'),
        'sitename' => get_string('pagenavbarcontent-sitename', 'theme_uikit'),
        'siteshortname' => get_string('pagenavbarcontent-siteshortname', 'theme_uikit'),
        'sitessummary' => get_string('pagenavbarcontent-sitessummary', 'theme_uikit'),
        'custom' => get_string('pagenavbarcontent-custom', 'theme_uikit'),
        'dontshow' => get_string('pagenavbarcontent-dontshow', 'theme_uikit')
    );
    $setting = new admin_setting_configselect($name, $title, '', $default, $choices);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    $pagenavbarcontent = get_config('theme_uikit', 'pagenavbarcontent');
    if($pagenavbarcontent == 'custom'){
        $name = 'theme_uikit/pagenavbarcustomcontent';
        $title = get_string('pagenavbarcustomcontent', 'theme_uikit');
        $default = '';
        $setting = new admin_setting_configtext($name, $title, '', $default, PARAM_RAW_TRIMMED);
        $setting->set_updatedcallback('theme_reset_all_caches');
        $temp->add($setting);
    }
}


$ADMIN->add('theme_uikit', $temp);