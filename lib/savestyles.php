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
 * Ajax script for saving the customizer compiled CSS and use it in the real site.
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */


define('AJAX_SCRIPT', true);

require_once('../../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url($CFG->wwwroot . '/theme/uikit/lib/savestyles.php');

header('Content-Type: text/json');

$aValidUikitThemes = array(
    'default',
    'almost-flat',
    'gradient'
);


$base_theme = required_param('theme', PARAM_ALPHANUMEXT);
$variables = optional_param_array('lessVariables', array(), PARAM_RAW_TRIMMED);
$customLess = optional_param('customLess', '', PARAM_RAW_TRIMMED);
$css = required_param('css', PARAM_RAW_TRIMMED);

if (!in_array($base_theme, $aValidUikitThemes)) {
    $base_theme = $aValidUikitThemes[0];
}

$processedVariables = array();
foreach ($variables as $key => $val) {
    //Make sure the variable starts with "@"
    if (strpos($key, '@') !== 0) {
        $key = '@'.$key;
    }
    
    $processedVariables[$key] = $val;
}

try {

    //Treat warnings, errors, as exceptions:
    function handleError($errno, $errstr, $errfile, $errline, array $errcontext) {
        // error was suppressed with the @-operator
        if (0 === error_reporting()) {
            return false;
        }

        throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    set_error_handler('handleError');

    //Moodle config:
    require_once "../../../config.php";

    //Require login
    require_login(0, false);

    //Require site config permissions:
    if (!has_capability("moodle/site:config", $context)) {
        print_error('accessdenied', 'admin');
        die;
    }

    if(empty($css)){
        throw new Exception("Error: CSS code required");
    }
    
    //Also require that current theme is uikit theme
    if ($PAGE->theme->name !== 'uikit') {
        throw new Exception("UIKit theme is not selected");
    }

    global $DB;
    $table = "theme_uikit_less_settings";

    //Save generated CSS file for the site in moodledata to be loaded by the theme later:
    $fs = get_file_storage();
 
    // Prepare file record object
    $fileinfo = array(
        'contextid' => $context->id,
        'component' => 'theme_uikit',
        'filearea' => 'theme_uikit_styles',
        'itemid' => 0,
        'filepath' => '/',
        'filename' => 'theme_uikit_generated_styles.css'
    );
    
    //First delete file if existing:
    $file = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'], 
            $fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);
    if ($file) {
        $file->delete();
    }
    
    $fs->create_file_from_string($fileinfo, $css);


    
    
    //Also save customizations to database
    $DB->delete_records($table);

    $theme_record = new stdClass();
    $theme_record->setting = 'theme';
    $theme_record->value = $base_theme;
    $DB->insert_record($table, $theme_record, false, true);
    
    //Save theme version and moodle version used to generate the styles
    //in case we need it for later updgrades, etc.
    $theme_version_record = new stdClass();
    $theme_version_record->setting = 'version';
    $theme_version_record->value = $PAGE->theme->settings->version;
    $DB->insert_record($table, $theme_version_record, false, true);
    
    $moodle_version_record = new stdClass();
    $moodle_version_record->setting = 'moodle_version';
    $moodle_version_record->value = $CFG->version;
    $DB->insert_record($table, $moodle_version_record, false, true);

    if (!empty($customLess)) {
        $custom_less_record = new stdClass();
        $custom_less_record->setting = 'customLess';
        $custom_less_record->value = $customLess;
        $DB->insert_record($table, $custom_less_record, false, true);
    }

    foreach ($processedVariables as $name => $val) {
        $variable_record = new stdClass();
        $variable_record->setting = $name;
        $variable_record->value = $val;
        $DB->insert_record($table, $variable_record, false, true);
    }

    //Purge all caches:
    purge_all_caches();

    $result = array('status' => 'ok');
} catch (Exception $e) {
    $result = array('status' => 'error', 'message' => $e->getMessage());
}

echo json_encode($result);
