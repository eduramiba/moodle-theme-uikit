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

        <?php require_once(dirname(__FILE__) . '/includes/layout1/header.php'); ?>

        <?php require_once(dirname(__FILE__) . '/includes/layout1/navbar.php'); ?>

        <div id="page">
			<div id="aditional-frontpage-content">
				<!-- Start Slideshow -->
				<?php require_once(dirname(__FILE__).'/includes/slideshow.php'); ?>
				<!-- End Slideshow -->

				<!-- Start Marketing Spots -->
				<?php require_once(dirname(__FILE__).'/includes/marketingspots.php'); ?>
				<!-- End Marketing Spots -->
			</div>
			
            <div id="page-content">
                <div id="<?php echo $regionbsid ?>">
                    <div id="pre-and-content" class="uk-grid">
                        <?php 
                                $sidePreClasses = 'uk-width-1-1 uk-width-medium-1-3 uk-width-large-1-4 uk-width-xlarge-2-10';
                                $regionClasses = 'uk-width-1-1 uk-width-medium-2-3 uk-width-large-3-4 uk-width-xlarge-8-10';
                                
                                $hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
                                
                                if(!$hassidepre && !$PAGE->user_is_editing()){
                                    $regionClasses = 'uk-width-1-1';
                                }
                        
                                if(empty($PAGE->theme->settings->frontpageblocks) || $PAGE->theme->settings->frontpageblocks === 'left'){
                                    require_once(dirname(__FILE__) . '/includes/layout1/frontpage-content.php');
                                    echo $OUTPUT->uikitblocks('side-pre', $sidePreClasses);
                                }else{
                                    echo $OUTPUT->uikitblocks('side-pre', $sidePreClasses);
                                    require_once(dirname(__FILE__) . '/includes/layout1/frontpage-content.php');
                                }
                            ?>
                    </div>
                </div>
                
                <?php require_once(dirname(__FILE__) . '/includes/hidden_blocks.php'); ?>
            </div>
        </div>


        <?php require_once(dirname(__FILE__) . '/includes/footer.php'); ?>

        <?php echo $OUTPUT->standard_footer_html(); ?>

        <?php echo $OUTPUT->standard_end_of_body_html() ?>
        
        <!-- Start Google Analytics -->
        <?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
        <!-- End Google Analytics -->
    </body>
</html>