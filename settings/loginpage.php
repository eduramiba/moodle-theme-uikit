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

$temp = new admin_settingpage('theme_uikit_loginpage', get_string('loginpageheading', 'theme_uikit'));

// Enable Header
$name = 'theme_uikit/loginpagehasheader';
$title = get_string('loginpagehasheader', 'theme_uikit');
$description = '';
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Enable Navigation
$name = 'theme_uikit/loginpagehasnavigation';
$title = get_string('loginpagehasnavigation', 'theme_uikit');
$description = '';
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Enable Footer
$name = 'theme_uikit/loginpagehasfooter';
$title = get_string('loginpagehasfooter', 'theme_uikit');
$description = '';
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Login box heading image
$name = 'theme_uikit/loginheaderimage';
$title = get_string('loginheaderimage', 'theme_uikit');
$description = get_string('loginheaderimagedesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'loginheaderimage');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);