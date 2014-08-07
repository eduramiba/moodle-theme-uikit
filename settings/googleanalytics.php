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
/* Analytics Settings */
$temp = new admin_settingpage('theme_uikit_analytics', get_string('analyticsheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_analytics', get_string('analyticsheadingsub', 'theme_uikit'), format_text(get_string('analyticsdesc', 'theme_uikit'), FORMAT_MARKDOWN)));

// Enable Analytics
$name = 'theme_uikit/useanalytics';
$title = get_string('useanalytics', 'theme_uikit');
$description = get_string('useanalyticsdesc', 'theme_uikit');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Google Analytics ID
$name = 'theme_uikit/analyticsid';
$title = get_string('analyticsid', 'theme_uikit');
$description = get_string('analyticsiddesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Clean Analytics URL
$name = 'theme_uikit/analyticsclean';
$title = get_string('analyticsclean', 'theme_uikit');
$description = get_string('analyticscleandesc', 'theme_uikit');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Track Admins
$name = 'theme_uikit/analyticsadmin';
$title = get_string('analyticsadmin', 'theme_uikit');
$description = get_string('analyticsadmindesc', 'theme_uikit');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);