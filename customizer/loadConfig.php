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
 * Script to load customizer configuration.
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die;
}

//Load customizer configuration and properties:
$directory = dirname(__FILE__);
$configPath = $directory . DIRECTORY_SEPARATOR . 'config.json';
if (!file_exists($configPath)) {
    throw new Exception("Could not find configuration file for the customizer");
}
if (!function_exists('json_decode')) {
    throw new Exception("JSON module seems to be missing. Please add it to your PHP install");
}
$customizerConfig = json_decode(file_get_contents($configPath), true);

if ($customizerConfig === false) {
    throw new Exception("Config file could not be loaded");
}

//Add available google fonts to font-family type list:
foreach (range(1, 10) as $i) {
    $fontSetting = "googlefont$i";
    if (isset($PAGE->theme->settings->$fontSetting) && trim($PAGE->theme->settings->$fontSetting) !== '') {
        $font = trim($PAGE->theme->settings->$fontSetting);
        $customizerConfig['values']['font-family'][$font] = $font;
    }
}

//Translate variable names:
$stringManager = get_string_manager();
foreach ($customizerConfig['groups'] as &$group) {
    $groupStringId = 'group-' . $group['id'];

    if (!isset($group['name'])) {
        if ($stringManager->string_exists($groupStringId, 'theme_uikit')) {
            $group['name'] = get_string($groupStringId, 'theme_uikit');
        } else {
            $group['name'] = $group['id'];
        }
    }

    foreach ($group['elements'] as &$element) {
        $var = $element['var'];
        if (!isset($element['name'])) {
            if ($stringManager->string_exists($var, 'theme_uikit')) {
                $element['name'] = get_string($var, 'theme_uikit');
            } else {
                $element['name'] = $var;
            }
        }
    }
}

$strings = $stringManager->load_component_strings('theme_uikit', 'en');

//Populate customizer configuration with translations that it may need:
$customizerConfig['translations'] = array();
foreach ($strings as $string => $translation) {
    if(stripos($string, 'js-') === 0){
        list(,$simplename) = explode('-', $string, 2);
        $customizerConfig['translations'][$simplename] = get_string($string, 'theme_uikit');//Load current language translation
    }
}