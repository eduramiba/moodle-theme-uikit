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
$temp = new admin_settingpage('theme_uikit_social', get_string('socialheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_social', get_string('socialheadingsub', 'theme_uikit'), format_text(get_string('socialdesc', 'theme_uikit'), FORMAT_MARKDOWN)));

// Website url setting.
$name = 'theme_uikit/website';
$title = get_string('website', 'theme_uikit');
$description = get_string('websitedesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Facebook url setting.
$name = 'theme_uikit/facebook';
$title = get_string('facebook', 'theme_uikit');
$description = get_string('facebookdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Flickr url setting.
$name = 'theme_uikit/flickr';
$title = get_string('flickr', 'theme_uikit');
$description = get_string('flickrdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Twitter url setting.
$name = 'theme_uikit/twitter';
$title = get_string('twitter', 'theme_uikit');
$description = get_string('twitterdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Google+ url setting.
$name = 'theme_uikit/googleplus';
$title = get_string('googleplus', 'theme_uikit');
$description = get_string('googleplusdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// LinkedIn url setting.
$name = 'theme_uikit/linkedin';
$title = get_string('linkedin', 'theme_uikit');
$description = get_string('linkedindesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Pinterest url setting.
$name = 'theme_uikit/pinterest';
$title = get_string('pinterest', 'theme_uikit');
$description = get_string('pinterestdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Instagram url setting.
$name = 'theme_uikit/instagram';
$title = get_string('instagram', 'theme_uikit');
$description = get_string('instagramdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// YouTube url setting.
$name = 'theme_uikit/youtube';
$title = get_string('youtube', 'theme_uikit');
$description = get_string('youtubedesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Skype url setting.
$name = 'theme_uikit/skype';
$title = get_string('skype', 'theme_uikit');
$description = get_string('skypedesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// VKontakte url setting.
$name = 'theme_uikit/vk';
$title = get_string('vk', 'theme_uikit');
$description = get_string('vkdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);