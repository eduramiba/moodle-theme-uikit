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

$displaysitename = isset($PAGE->theme->settings->displaysitename) ? $PAGE->theme->settings->displaysitename : true;
$displayloggedusermode = isset($PAGE->theme->settings->displayloggedusermode) ? $PAGE->theme->settings->displayloggedusermode : 0;

?>


<header id="page-navigation" class="flexgrow" role="navigation">
    <?php echo $OUTPUT->page_heading_menu(); ?>
    
    <?php echo $OUTPUT->custom_menu('', false); ?>
    
    <?php if (isloggedin() && $hasheaderprofilepic) { ?>
        <div class="uk-visible-small">&nbsp;</div>
        <div id="profilepic" style="display: inline-block;">
            <p class="socialheading"><?php echo $USER->firstname; ?></p>
            <ul class="socials unstyled">
                <li>
                    <?php echo $OUTPUT->user_picture($USER); ?>
                </li>
            </ul>            
        </div>
    <?php
    }?>
</header>