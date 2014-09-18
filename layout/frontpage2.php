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
 * UIKit theme
 *
 * @package    theme
 * @subpackage uikit
 * @author     Eduardo Ramos
 * @author     Based on code originally written by Julian (@moodleman) Ridden, G J Bernard, Mary Evans, Bas Brands, Stuart Lamour and David Scotson.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
$regionbsid = 'region-bs-main-and-pre';

echo $OUTPUT->doctype()
?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
    <head>
        <title><?php echo $OUTPUT->page_title(); ?></title>
        <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
        <?php echo $OUTPUT->standard_head_html() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Google web fonts -->
		<?php require_once(dirname(__FILE__).'/includes/googlefonts.php'); ?>
        <!-- iOS Homescreen Icons -->
        <?php require_once(dirname(__FILE__) . '/includes/iosicons.php'); ?>
    </head>

    <body <?php echo $OUTPUT->body_attributes(); ?>>

        <?php echo $OUTPUT->standard_top_of_body_html() ?>


        <div id="page" class="flex-grid-horizontal-wrap flexgrow">
            <?php require_once(dirname(__FILE__) . '/includes/layout2/header.php'); ?>
            
            <div id="page-content" class="flex-grid-horizontal-wrap flexgrow">
                <div id="<?php echo $regionbsid ?>" class="flex-grid-horizontal-wrap flexgrow">
                    <div id="pre-and-content" class="flex-grid-horizontal flexgrow">
                        <?php 
                                $sidePreClasses = 'content-pre';
                                $regionClasses = 'flexgrow';
                                
                                $hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
                                
                                if(!$hassidepre && !$PAGE->user_is_editing()){
                                    $regionClasses = 'flex-full-width';
                                }
                        
                                echo $OUTPUT->uikitblocks('side-pre', $sidePreClasses);
                                require_once(dirname(__FILE__) . '/includes/layout2/frontpage-content.php');
                            ?>
                    </div>
                </div>
                
                <?php require_once(dirname(__FILE__) . '/includes/hidden_blocks.php'); ?>
            </div>
        </div>

        <?php 
                $footerplacement = isset($PAGE->theme->settings->footerplacement) ? $PAGE->theme->settings->footerplacement : 1;
                
                if($footerplacement == 1){
                    require_once(dirname(__FILE__) . '/includes/footer.php');

                    echo $OUTPUT->standard_footer_html();
                }
            ?>
        
        <?php echo $OUTPUT->standard_end_of_body_html() ?>
        
        <!-- Start Google Analytics -->
        <?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
        <!-- End Google Analytics -->
    </body>
</html>