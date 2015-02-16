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
$hasiphoneicon = (!empty($PAGE->theme->settings->iphoneicon));
$hasipadicon = (!empty($PAGE->theme->settings->ipadicon));
$hasiphoneretinaicon = (!empty($PAGE->theme->settings->iphoneretinaicon));
$hasipadretinaicon = (!empty($PAGE->theme->settings->ipadretinaicon));

function theme_uikit_meta_homeicon($url, $size){
    ?>
    <link rel="icon" sizes="<?php echo $size; ?>" href="<?php echo $url //Android and others ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="<?php echo $size; ?>" href="<?php echo $url //iOS ?>" />
    <meta name="msapplication-square<?php echo $size; ?>ogo" content="<?php echo $url //Windows ?>"/>
<?php
}

if ($hasiphoneicon) {
    $iphoneicon = $PAGE->theme->setting_file_url('iphoneicon', 'iphoneicon');
    theme_uikit_meta_homeicon($iphoneicon, "57x57");
}

if ($hasipadicon) {
    $ipadicon = $PAGE->theme->setting_file_url('ipadicon', 'ipadicon');
    theme_uikit_meta_homeicon($ipadicon, "72x72");
}

if ($hasiphoneretinaicon) {
    $iphoneretinaicon = $PAGE->theme->setting_file_url('iphoneretinaicon', 'iphoneretinaicon');
    theme_uikit_meta_homeicon($iphoneretinaicon, "114x114");
}

if ($hasipadretinaicon) {
    $ipadretinaicon = $PAGE->theme->setting_file_url('ipadretinaicon', 'ipadretinaicon');
    theme_uikit_meta_homeicon($ipadretinaicon, "144x144");
}