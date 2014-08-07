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
 
$footerl = 'footer-left';
$footerm = 'footer-middle';
$footerr = 'footer-right';

$hasfooterimage = (!empty($PAGE->theme->settings->footerimage));
$hascopyright = (empty($PAGE->theme->settings->copyright)) ? false : $PAGE->theme->settings->copyright;
$hasfootnote = (empty($PAGE->theme->settings->footnote)) ? false : $PAGE->theme->settings->footnote;

$showFooterBlocks = isset($PAGE->theme->settings->footerblocks)
        && (
            $PAGE->theme->settings->footerblocks == 1
            || ($PAGE->theme->settings->footerblocks == 2 && !isloggedin())
            || ($PAGE->theme->settings->footerblocks == 3 && isloggedin())
        );

if(empty($PAGE->layout_options['noblocks'])){ ?>
    <footer id="page-footer">
        <?php if ($showFooterBlocks) { ?>
            <div id="footer-blocks">
                <div class="uk-grid" data-uk-grid-margin>
                    <div class="uk-width-1-1 uk-width-large-1-3">
                        <?php echo $OUTPUT->uikitblocks($footerl, 'additional-block'); ?>
                    </div>

                    <div class="uk-width-1-1 uk-width-large-1-3">
                        <?php echo $OUTPUT->uikitblocks($footerm, 'additional-block'); ?>
                    </div>

                    <div class="uk-width-1-1 uk-width-large-1-3">
                        <?php echo $OUTPUT->uikitblocks($footerr, 'additional-block'); ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="footerlinks">
            <?php if ($hascopyright) {
                echo '<p class="copy">&copy; '.date("Y").' '.$hascopyright.'</p>';
            } ?>

            <?php if ($hasfooterimage) { 
                    $footerUrl = $PAGE->theme->setting_file_url('footerimage', 'footerimage');
                    ?>
                <div class="footimage">
                    <img src="<?php echo $footerUrl; ?>" alt="">
                </div>
            <?php } ?>
            
            <?php if ($hasfootnote) {
                echo '<div class="footnote">'.$hasfootnote.'</div>';
            } ?>
        </div>
    </footer>
<?php }