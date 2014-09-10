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
 * Renderers to align Moodle's HTML with that expected by UIKit
 *
 * @package    theme_uikit
 * @copyright  2014 Eduardo Ramos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

global $PAGE;
$layout = isset($PAGE->theme->settings->themelayout) ? $PAGE->theme->settings->themelayout : 1;

require_once dirname(__FILE__).'/lib/utils.php';

require_once dirname(__FILE__).'/renderers/core_renderer_abstract.php';

switch($layout){
    case 2:
        require_once dirname(__FILE__).'/renderers/core_renderer_layout2.php';
        break;
    case 1:
    default:
        require_once dirname(__FILE__).'/renderers/core_renderer_layout1.php';
        break;
}

require_once dirname(__FILE__).'/renderers/core_course_renderer.php';

