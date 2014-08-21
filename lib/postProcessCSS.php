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
 * Ajax script for the customizer to post-process compiled CSS by Moodle.
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('AJAX_SCRIPT', true);

require_once('../../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url($CFG->wwwroot.'/theme/uikit/lib/postProcessCSS.php');

header('Content-Type: text/json');

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
    
    $css = required_param('css', PARAM_RAW_TRIMMED);

    //Post process moodle placeholders like font and image urls
    $themeName = 'uikit';
    $theme = theme_config::load($themeName);
    $postProcessedCSS = $theme->post_process($css);
    
    $result = array('status' => 'ok', 'css' => $postProcessedCSS);
} catch (Exception $e) {
    $result = array('status' => 'error', 'message' => $e->getMessage());
}

echo json_encode($result);
