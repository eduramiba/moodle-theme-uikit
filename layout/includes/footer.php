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

$showMoodleDocs = isset($PAGE->theme->settings->showmoodledocs) && $PAGE->theme->settings->showmoodledocs;
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
                <div class="uk-grid uk-grid-width-1 uk-grid-width-medium-1-3" data-uk-grid-margin>
                    <div>
                        <?php echo $OUTPUT->uikitblocks($footerl, 'additional-block'); ?>
                    </div>
                    <div>
                        <?php echo $OUTPUT->uikitblocks($footerm, 'additional-block'); ?>
                    </div>
                    <div>
                        <?php echo $OUTPUT->uikitblocks($footerr, 'additional-block'); ?>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="footerlinks">
            <?php if ($hascopyright) { ?>
                <p class="copy">&copy; <?php echo date("Y").' '.$hascopyright; ?> </p>
            <?php } ?>
            
            <?php if ($showMoodleDocs) { ?>
                <p class="helplink"><?php echo page_doc_link(get_string('moodledocslink')); ?></p>
            <?php } ?>

            <?php if ($hasfooterimage) { 
                    $footerUrl = $PAGE->theme->setting_file_url('footerimage', 'footerimage');
                    ?>
                <div class="footimage">
                    <img src="<?php echo $footerUrl; ?>" alt="">
                </div>
            <?php } ?>
            
            <?php if ($hasfootnote) { ?>
                <div class="footnote"><?php echo $hasfootnote; ?></div>
            <?php } ?>
        </div>
        
        <?php
            $context = context_system::instance();
            if (has_capability("moodle/site:config", $context)){
                if($OUTPUT->check_stale_savedstyles()){
                    ?>
                    <div id="uikit-stale-saved-styles-alert" class="uk-alert uk-alert-danger">
                        <p><span class="uk-icon uk-icon-exclamation-circle uk-text-large"></span> <?php echo get_string('warning_saved_styles_different_theme_version', 'theme_uikit') ?></p>
                        <p><a href="<?php echo $CFG->wwwroot; ?>/theme/uikit/customizer/index.php"><?php echo get_string('warning_saved_styles_different_theme_version_action', 'theme_uikit') ?></a></p>
                    </div>
              <?php 
                }
                
                global $CFG;
                if(isset($CFG->themedesignermode) && $CFG->themedesignermode){
                    ?>
                    <div id="uikit-theme-designer-alert" class="uk-alert uk-alert-danger">
                        <p><span class="uk-icon uk-icon-exclamation-triangle uk-text-large"></span> <?php echo get_string('warning_theme_designer_enabled', 'theme_uikit') ?></p>
                        <p><a href="<?php echo $CFG->wwwroot; ?>/admin/settings.php?section=themesettings"><?php echo get_string('warning_theme_designer_disable', 'theme_uikit') ?></a></p>
                    </div>
             <?php 
                } 
            }?>
    </footer>
<?php }