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
/* Slideshow Widget Settings */
$temp = new admin_settingpage('theme_uikit_slideshow', get_string('slideshowheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_slideshow', get_string('slideshowheadingsub', 'theme_uikit'), format_text(get_string('slideshowdesc', 'theme_uikit'), FORMAT_MARKDOWN)));

// Toggle Slideshow.
$name = 'theme_uikit/toggleslideshow';
$title = get_string('toggleslideshow', 'theme_uikit');
$description = get_string('toggleslideshowdesc', 'theme_uikit');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_uikit');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_uikit');
$displayafterlogin = get_string('displayafterlogin', 'theme_uikit');
$dontdisplay = get_string('dontdisplay', 'theme_uikit');
$default = '0';
$choices = array('1' => $alwaysdisplay, '2' => $displaybeforelogin, '3' => $displayafterlogin, '0' => $dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);


// Number of slides.
$name = 'theme_uikit/slideshownumber';
$title = get_string('slideshownumber', 'theme_uikit');
$description = '';
$default = 4;
$choices = range(1, 16);
$choices = array_combine($choices, $choices);
$temp->add(new admin_setting_configselect($name, $title, $description, $default, $choices));

// Hide slideshow on phones.
$name = 'theme_uikit/hideonphone';
$title = get_string('hideonphone', 'theme_uikit');
$description = get_string('hideonphonedesc', 'theme_uikit');
$display = get_string('alwaysdisplay', 'theme_uikit');
$dontdisplay = get_string('dontdisplay', 'theme_uikit');
$default = '';
$choices = array('' => $display, 'hidden-phone' => $dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$default = '#777';

// Slideshow border color
$name = 'theme_uikit/slideshowbordercolor';
$title = get_string('slideshowbordercolor', 'theme_uikit');
$previewconfig = null;
$setting = new admin_setting_configcolourpicker($name, $title, '', $default, $previewconfig);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Slideshow header color
$name = 'theme_uikit/slideshowtitlecolor';
$title = get_string('slideshowtitlecolor', 'theme_uikit');
$previewconfig = null;
$setting = new admin_setting_configcolourpicker($name, $title, '', $default, $previewconfig);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Slideshow caption color
$name = 'theme_uikit/slideshowcaptioncolor';
$title = get_string('slideshowcaptioncolor', 'theme_uikit');
$previewconfig = null;
$setting = new admin_setting_configcolourpicker($name, $title, '', $default, $previewconfig);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Slideshow button color
$name = 'theme_uikit/slideshowbuttoncolor';
$title = get_string('slideshowbuttoncolor', 'theme_uikit');
$previewconfig = null;
$setting = new admin_setting_configcolourpicker($name, $title, '', $default, $previewconfig);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Slideshow button text color
$name = 'theme_uikit/slideshowbuttontextcolor';
$title = get_string('slideshowbuttontextcolor', 'theme_uikit');
$previewconfig = null;
$default = '#FFF';
$setting = new admin_setting_configcolourpicker($name, $title, '', $default, $previewconfig);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$addSlideSettings = function($i, &$temp) {
    //This is the descriptor for Slide One
    $name = "theme_uikit/slide{$i}info";
    $params = new stdClass();
    $params->n = $i;
    $heading = get_string("slideheader", 'theme_uikit', $params);
    $setting = new admin_setting_heading($name, $heading, '');
    $temp->add($setting);

    // Title.
    $name = "theme_uikit/slide$i";
    $title = get_string('slidetitle', 'theme_uikit');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $default = '';
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Image.
    $name = "theme_uikit/slide{$i}image";
    $title = get_string('slideimage', 'theme_uikit');
    $setting = new admin_setting_configstoredfile($name, $title, '', "slide{$i}image");
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // Caption.
    $name = "theme_uikit/slide{$i}caption";
    $title = get_string('slidecaption', 'theme_uikit');
    $setting = new admin_setting_configtextarea($name, $title, '', '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL.
    $name = "theme_uikit/slide{$i}url";
    $title = get_string('slideurl', 'theme_uikit');
    $setting = new admin_setting_configtext($name, $title, '', '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    // URL text
    $name = "theme_uikit/slide{$i}urltext";
    $title = get_string('slideurltext', 'theme_uikit');
    $setting = new admin_setting_configtext($name, $title, '', '');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
};

/**
 * Add slides
 */
$numberofslides = get_config('theme_uikit', 'slideshownumber');
if(!$numberofslides){
    $numberofslides = 4;
}
foreach (range(1, $numberofslides) as $i) {
    $addSlideSettings($i, $temp);
}

$ADMIN->add('theme_uikit', $temp);
