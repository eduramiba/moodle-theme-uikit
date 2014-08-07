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
        
function theme_uikit_print_font(&$PAGE, $i){
    $setting = "googlefont$i";
    if(isset($PAGE->theme->settings->$setting) && trim($PAGE->theme->settings->$setting) !== ''){
        $font = trim($PAGE->theme->settings->$setting);
        $font = urlencode($font);
        return '<link href="//fonts.googleapis.com/css?family='.$font.'" rel="stylesheet" type="text/css">';
    }else{
        return '';
    }
}

foreach(range(1, 10) as $i){
    echo theme_uikit_print_font($PAGE, $i);
}
