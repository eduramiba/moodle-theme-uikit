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
$temp = new admin_settingpage('theme_uikit_mobileapps', get_string('mobileappsheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_mobileapps', get_string('mobileappsheadingsub', 'theme_uikit'), format_text(get_string('mobileappsdesc', 'theme_uikit'), FORMAT_MARKDOWN)));
// Android App url setting.
$name = 'theme_uikit/android';
$title = get_string('android', 'theme_uikit');
$description = get_string('androiddesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// iOS App url setting.
$name = 'theme_uikit/ios';
$title = get_string('ios', 'theme_uikit');
$description = get_string('iosdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

//This is the descriptor for iOS Icons
$name = 'theme_uikit/iosiconinfo';
$heading = get_string('iosicon', 'theme_uikit');
$information = get_string('iosicondesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

// iPhone Icon.
$name = 'theme_uikit/iphoneicon';
$title = get_string('iphoneicon', 'theme_uikit');
$description = get_string('iphoneicondesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneicon');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// iPhone Retina Icon.
$name = 'theme_uikit/iphoneretinaicon';
$title = get_string('iphoneretinaicon', 'theme_uikit');
$description = get_string('iphoneretinaicondesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'iphoneretinaicon');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// iPad Icon.
$name = 'theme_uikit/ipadicon';
$title = get_string('ipadicon', 'theme_uikit');
$description = get_string('ipadicondesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadicon');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// iPad Retina Icon.
$name = 'theme_uikit/ipadretinaicon';
$title = get_string('ipadretinaicon', 'theme_uikit');
$description = get_string('ipadretinaicondesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'ipadretinaicon');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);