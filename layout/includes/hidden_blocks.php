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
if (is_siteadmin()) { ?>
    <div class="hidden-blocks uk-panel uk-panel-box uk-alert uk-alert-danger uk-margin">
        <div class="uk-panel-badge uk-badge uk-badge-danger"><i class="uk-icon uk-icon-warning"></i> <?php echo get_string('visibleadminonly', 'theme_uikit') ?></div>
        <div class="uk-margin-top">
            <?php
                echo $OUTPUT->uikitblocks('hidden-dock');
                ?>
        </div>
    </div>
<?php }