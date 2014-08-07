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
    $showMiddleBlocks = isset($PAGE->theme->settings->frontpagemiddleblocks)
        && (
            $PAGE->theme->settings->frontpagemiddleblocks == 1
            || ($PAGE->theme->settings->frontpagemiddleblocks == 2 && !isloggedin())
            || ($PAGE->theme->settings->frontpagemiddleblocks == 3 && isloggedin())
        );

    $homeup = 'home-up';
    $homel = 'home-left';
    $homem = 'home-middle';
    $homer = 'home-right';
    $homedown = 'home-down';
    
    if($showMiddleBlocks){ ?>
        <div id="middle-blocks">
            <div class="uk-grid" data-uk-grid-margin>
                <div class="uk-width-1-1">
                    <?php echo $OUTPUT->uikitblocks($homeup, 'additional-block'); ?>
                </div>
                <div class="uk-width-1-1 uk-width-large-1-3">
                    <?php echo $OUTPUT->uikitblocks($homel, 'additional-block'); ?>
                </div>
                <div class="uk-width-1-1 uk-width-large-1-3">
                    <?php echo $OUTPUT->uikitblocks($homem, 'additional-block'); ?>
                </div>
                <div class="uk-width-1-1 uk-width-large-1-3">
                    <?php echo $OUTPUT->uikitblocks($homer, 'additional-block'); ?>
                </div>
                <div class="uk-width-1-1">
                    <?php echo $OUTPUT->uikitblocks($homedown, 'additional-block'); ?>
                </div>
            </div>
        </div>
<?php }