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

$temp = new admin_settingpage('theme_uikit_custommenu', get_string('custommenuheading', 'theme_uikit'));

// Toggle site name in navigation bar
$name = 'theme_uikit/displaysitename';
$title = get_string('displaysitename', 'theme_uikit');
$description = '';
$default = true;
$setting = new admin_setting_configcheckbox($name, $title, $description, $default, true, false);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

// Choose logged user mode
$name = 'theme_uikit/displayloggedusermode';
$title = get_string('displayloggedusermode', 'theme_uikit');
$description = get_string('displayloggedusermodedesc', 'theme_uikit');
$showcomplete = get_string('displayloggedusermodecomplete', 'theme_uikit');
$showshort = get_string('displayloggedusermodeshort', 'theme_uikit');
$onlylogout = get_string('displayloggedusermodeonlylogout', 'theme_uikit');
$hide = get_string('displayloggedusermodehide', 'theme_uikit');
$default = '0';
$choices = array('0' => $showcomplete, '1' => $showshort, '2' => $onlylogout, '3' => $hide);
$setting = new admin_setting_configselect($name, $title, $description, $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

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

// Choose position of theme navigation elements
$name = 'theme_uikit/themenavigationelementsmode';
$title = get_string('themenavigationelementsmode', 'theme_uikit');
$default = '1';
$choices = array('1' => get_string('themenavigationelementsmodeafter', 'theme_uikit'), '2' => get_string('themenavigationelementsmodebefore', 'theme_uikit'));
$setting = new admin_setting_configselect($name, $title, '', $default, $choices);
$setting->set_updatedcallback('theme_reset_all_caches');
$temp->add($setting);

$ADMIN->add('theme_uikit', $temp);