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
$temp = new admin_settingpage('theme_uikit_marketing', get_string('marketingheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_marketing', get_string('marketingheadingsub', 'theme_uikit'), format_text(get_string('marketingdesc', 'theme_uikit'), FORMAT_MARKDOWN)));

// Toggle Marketing Spots.
$name = 'theme_uikit/togglemarketing';
$title = get_string('togglemarketing', 'theme_uikit');
$description = get_string('togglemarketingdesc', 'theme_uikit');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_uikit');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_uikit');
$displayafterlogin = get_string('displayafterlogin', 'theme_uikit');
$dontdisplay = get_string('dontdisplay', 'theme_uikit');
$default = '0';
$choices = array('1' => $alwaysdisplay, '2' => $displaybeforelogin, '3' => $displayafterlogin, '0' => $dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$addSpotSettings = function($i, &$temp) {
    //Descriptor
    $name = 'theme_uikit/marketing' . $i . 'info';
    $heading = get_string('marketing' . $i, 'theme_uikit');
    $information = get_string('marketinginfodesc', 'theme_uikit');
    $setting = new admin_setting_heading($name, $heading, $information);
    $temp->add($setting);

    //Title
    $name = 'theme_uikit/marketing' . $i;
    $title = get_string('marketingtitle', 'theme_uikit');
    $description = get_string('marketingtitledesc', 'theme_uikit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //Heading icon
    $name = 'theme_uikit/marketing' . $i . 'icon';
    $title = get_string('marketingicon', 'theme_uikit');
    $description = get_string('marketingicondesc', 'theme_uikit');
    $default = 'star';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //Image
    $name = 'theme_uikit/marketing' . $i . 'image';
    $title = get_string('marketingimage', 'theme_uikit');
    $description = get_string('marketingimagedesc', 'theme_uikit');
    $setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing' . $i . 'image');
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //Text content
    $name = 'theme_uikit/marketing' . $i . 'content';
    $title = get_string('marketingcontent', 'theme_uikit');
    $description = get_string('marketingcontentdesc', 'theme_uikit');
    $default = '';
    $setting = new admin_setting_confightmleditor($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //Button text
    $name = 'theme_uikit/marketing' . $i . 'buttontext';
    $title = get_string('marketingbuttontext', 'theme_uikit');
    $description = get_string('marketingbuttontextdesc', 'theme_uikit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, $default);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);

    //Button url
    $name = 'theme_uikit/marketing' . $i . 'buttonurl';
    $title = get_string('marketingbuttonurl', 'theme_uikit');
    $description = get_string('marketingbuttonurldesc', 'theme_uikit');
    $default = '';
    $setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
    
    //Spot button type
    $name = 'theme_uikit/marketing' . $i . 'buttontype';
    $title = get_string('marketingbuttontype', 'theme_uikit');
    $default = 'uk-button-primary';

    $class_normal = get_string('componentclass-normal', 'theme_uikit');
    $class_primary = get_string('componentclass-primary', 'theme_uikit');
    $class_success = get_string('componentclass-success', 'theme_uikit');
    $class_danger = get_string('componentclass-danger', 'theme_uikit');
    $class_link = get_string('componentclass-link', 'theme_uikit');

    $choices = array(
        '' => $class_normal, 
        'uk-button-primary' => $class_primary, 
        'uk-button-success' => $class_success,
        'uk-button-danger' => $class_danger,
        'uk-button-link' => $class_link
    );
    $setting = new admin_setting_configselect($name, $title, '', $default, $choices); 
    $setting->set_updatedcallback('theme_reset_all_caches');
    $temp->add($setting);
};

foreach (range(1, 3) as $i) {
    $addSpotSettings($i, $temp);
}

$ADMIN->add('theme_uikit', $temp);