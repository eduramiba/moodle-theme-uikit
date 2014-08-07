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

$temp = new admin_settingpage('theme_uikit_frontcontent', get_string('frontcontentheading', 'theme_uikit'));
$temp->add(new admin_setting_heading('theme_uikit_frontcontent', get_string('frontcontentheadingsub', 'theme_uikit'), format_text(get_string('frontcontentdesc', 'theme_uikit'), FORMAT_MARKDOWN)));

// Enable Frontpage Content
$name = 'theme_uikit/usefrontcontent';
$title = get_string('usefrontcontent', 'theme_uikit');
$description = get_string('usefrontcontentdesc', 'theme_uikit');
$default = false;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Frontpage Content
$name = 'theme_uikit/frontcontentarea';
$title = get_string('frontcontentarea', 'theme_uikit');
$description = get_string('frontcontentareadesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Frontpage Block alignment.
$name = 'theme_uikit/frontpageblocks';
$title = get_string('frontpageblocks', 'theme_uikit');
$description = get_string('frontpageblocksdesc', 'theme_uikit');
$left = get_string('left', 'theme_uikit');
$right = get_string('right', 'theme_uikit');
$default = 'left';
$choices = array('1' => $left, '0' => $right);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Toggle Frontpage Middle Blocks
$name = 'theme_uikit/frontpagemiddleblocks';
$title = get_string('frontpagemiddleblocks' , 'theme_uikit');
$description = get_string('frontpagemiddleblocksdesc', 'theme_uikit');
$alwaysdisplay = get_string('alwaysdisplay', 'theme_uikit');
$displaybeforelogin = get_string('displaybeforelogin', 'theme_uikit');
$displayafterlogin = get_string('displayafterlogin', 'theme_uikit');
$dontdisplay = get_string('dontdisplay', 'theme_uikit');
$default = '0';
$choices = array('1'=>$alwaysdisplay, '2'=>$displaybeforelogin, '3'=>$displayafterlogin, '0'=>$dontdisplay);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);