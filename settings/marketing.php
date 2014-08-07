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

//This is the descriptor for Marketing Spot One
$name = 'theme_uikit/marketing1info';
$heading = get_string('marketing1', 'theme_uikit');
$information = get_string('marketinginfodesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

//Marketing Spot One.
$name = 'theme_uikit/marketing1';
$title = get_string('marketingtitle', 'theme_uikit');
$description = get_string('marketingtitledesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing1icon';
$title = get_string('marketingicon', 'theme_uikit');
$description = get_string('marketingicondesc', 'theme_uikit');
$default = 'star';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing1image';
$title = get_string('marketingimage', 'theme_uikit');
$description = get_string('marketingimagedesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing1image');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing1content';
$title = get_string('marketingcontent', 'theme_uikit');
$description = get_string('marketingcontentdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing1buttontext';
$title = get_string('marketingbuttontext', 'theme_uikit');
$description = get_string('marketingbuttontextdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing1buttonurl';
$title = get_string('marketingbuttonurl', 'theme_uikit');
$description = get_string('marketingbuttonurldesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

//This is the descriptor for Marketing Spot Two
$name = 'theme_uikit/marketing2info';
$heading = get_string('marketing2', 'theme_uikit');
$information = get_string('marketinginfodesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

//Marketing Spot Two.
$name = 'theme_uikit/marketing2';
$title = get_string('marketingtitle', 'theme_uikit');
$description = get_string('marketingtitledesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing2icon';
$title = get_string('marketingicon', 'theme_uikit');
$description = get_string('marketingicondesc', 'theme_uikit');
$default = 'star';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing2image';
$title = get_string('marketingimage', 'theme_uikit');
$description = get_string('marketingimagedesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing2image');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing2content';
$title = get_string('marketingcontent', 'theme_uikit');
$description = get_string('marketingcontentdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing2buttontext';
$title = get_string('marketingbuttontext', 'theme_uikit');
$description = get_string('marketingbuttontextdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing2buttonurl';
$title = get_string('marketingbuttonurl', 'theme_uikit');
$description = get_string('marketingbuttonurldesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

//This is the descriptor for Marketing Spot Three
$name = 'theme_uikit/marketing3info';
$heading = get_string('marketing3', 'theme_uikit');
$information = get_string('marketinginfodesc', 'theme_uikit');
$setting = new admin_setting_heading($name, $heading, $information);
$temp->add($setting);

//Marketing Spot Three.
$name = 'theme_uikit/marketing3';
$title = get_string('marketingtitle', 'theme_uikit');
$description = get_string('marketingtitledesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing3icon';
$title = get_string('marketingicon', 'theme_uikit');
$description = get_string('marketingicondesc', 'theme_uikit');
$default = 'star';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing3image';
$title = get_string('marketingimage', 'theme_uikit');
$description = get_string('marketingimagedesc', 'theme_uikit');
$setting = new admin_setting_configstoredfile($name, $title, $description, 'marketing3image');
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing3content';
$title = get_string('marketingcontent', 'theme_uikit');
$description = get_string('marketingcontentdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_confightmleditor($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing3buttontext';
$title = get_string('marketingbuttontext', 'theme_uikit');
$description = get_string('marketingbuttontextdesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, $default);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$name = 'theme_uikit/marketing3buttonurl';
$title = get_string('marketingbuttonurl', 'theme_uikit');
$description = get_string('marketingbuttonurldesc', 'theme_uikit');
$default = '';
$setting = new admin_setting_configtext($name, $title, $description, '', PARAM_URL);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);


$ADMIN->add('theme_uikit', $temp);