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
$pre = 'side-pre';
$post = 'side-post';
$rtl = right_to_left();

if ($rtl) {
    $regionbsid = 'region-bs-main-and-post';
    // In RTL the sides are reversed, so swap the 'uikitblocks' method parameter....
    $temp = $pre;
    $pre = $post;
    $post = $temp;
} else {
    $regionbsid = 'region-bs-main-and-pre';
}

$hassidepre = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-pre', $OUTPUT));
$hassidepost = (empty($PAGE->layout_options['noblocks']) && $PAGE->blocks->region_has_content('side-post', $OUTPUT));

$preClass = 'uk-width-1-1 uk-width-large-2-10';
$contentClass = 'uk-width-1-1 uk-width-large-8-10';

$preClass .= ' content-pre';

if(!$hassidepre){
    $contentClass = 'uk-width-1-1';
}

if($hassidepost){
    $regionClass = 'uk-width-1-1 uk-width-medium-1-1 uk-width-large-1-1 mdl-width-xlarge-7-10';
    $postClass = 'uk-width-1-1 uk-width-medium-1-1 uk-width-large-1-1 mdl-width-xlarge-3-10';
}else{
    $regionClass = 'uk-width-1-1';
    $postClass = '';
}

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


        <!-- Start Main Regions -->
        <div id="page">
            <?php require_once(dirname(__FILE__) . '/includes/layout2/header.php'); ?>
            
            <div id="page-content">
                <div id="<?php echo $regionbsid ?>" class="uk-margin-bottom">
                    <div id="pre-and-content" class="uk-grid uk-grid-no-gutter">
                        <?php if($hassidepre){echo $OUTPUT->uikitblocks($pre, $preClass);} ?>
                        <div id="region-main-uikit" class="<?php echo $contentClass; ?>">
                            <section id="region-main" class="uk-margin-bottom">
                                <div id="main-content-box" class="uk-grid uk-grid-no-gutter">
                                    <div class="<?php echo $regionClass; ?>">
                                        <?php
                                                    echo $OUTPUT->course_content_header();
                                                    echo $OUTPUT->main_content();
                                                    echo $OUTPUT->course_content_footer();
                                                ?>
                                    </div>
                                    <div class="<?php echo $postClass; ?>">
                                        <?php if($hassidepost) {echo $OUTPUT->uikitblocks($post);} ?>
                                    </div>
                                </div>
                            </section>
                            
                            <?php require_once(dirname(__FILE__) . '/includes/footer.php'); ?>

                            <?php echo $OUTPUT->standard_footer_html(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Main Regions --> 

        <a href="#" class="smoothScroll" title="<?php print_string('backtotop', 'theme_uikit'); ?>" data-uk-smooth-scroll>
            <div id="toTop" style="display: none;">
                <i class="uk-icon-chevron-circle-up"></i>
            </div>
		</a>

        <?php echo $OUTPUT->standard_end_of_body_html(); ?>
        
        <!-- Start Google Analytics -->
        <?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
        <!-- End Google Analytics -->
    </body>
</html>
