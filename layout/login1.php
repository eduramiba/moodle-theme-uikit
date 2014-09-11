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
    $hasheader = !isset($PAGE->theme->settings->loginpagehasheader) || $PAGE->theme->settings->loginpagehasheader;
    $hasnavigation = !isset($PAGE->theme->settings->loginpagehasnavigation) || $PAGE->theme->settings->loginpagehasnavigation;
    $hasfooter = !isset($PAGE->theme->settings->loginpagehasfooter) || $PAGE->theme->settings->loginpagehasfooter;

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
        <?php require_once(dirname(__FILE__).'/includes/iosicons.php'); ?>
    </head>

    <body <?php echo $OUTPUT->body_attributes(); ?>>

        <?php echo $OUTPUT->standard_top_of_body_html() ?>

        <?php if($hasheader){ require_once(dirname(__FILE__) . '/includes/layout1/header.php'); } ?>

        <?php if($hasnavigation){ require_once(dirname(__FILE__) . '/includes/layout1/navbar.php'); } ?>

        <!-- Start Main Regions -->
        <div id="page" class="page-login">
            <div id="page-content">
                <section id="region-main" class="uk-container-center">
					<div id="main-content-box">
						<?php
							echo $OUTPUT->main_content();
						?>
					</div>
                </section>
            </div>
        </div>
        <!-- End Main Regions --> 

        <?php if($hasfooter){ require_once(dirname(__FILE__) . '/includes/footer.php');} ?>

        <?php echo $OUTPUT->standard_footer_html(); ?>

        <?php echo $OUTPUT->standard_end_of_body_html() ?>

        <!-- Start Google Analytics -->
        <?php require_once(dirname(__FILE__).'/includes/analytics.php'); ?>
        <!-- End Google Analytics -->
    </body>
</html>
