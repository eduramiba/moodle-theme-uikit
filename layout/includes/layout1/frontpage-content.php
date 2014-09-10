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
?>
<div id="region-main-uikit" class="<?php echo $regionClasses; ?>"> 
    <section id="region-main" class="uk-margin-bottom">
		<div id="main-content-box">
			<!-- Start Frontpage Content -->
			<?php if(!empty($PAGE->theme->settings->usefrontcontent) && $PAGE->theme->settings->usefrontcontent == 1 && !empty($PAGE->theme->settings->frontcontentarea)) { 
				echo $PAGE->theme->settings->frontcontentarea;
				?>
				<div class="bor mt10"></div>	
			<?php }?>
			<!-- End Frontpage Content -->
            
			<!-- Start Middle Blocks -->
				<?php require_once(dirname(__FILE__).'/../middleblocks.php'); ?>
			<!-- End Middle Blocks -->
			
			<?php
			
				echo $OUTPUT->course_content_header();
				echo $OUTPUT->main_content();
				echo $OUTPUT->course_content_footer();
			?>
		</div>        
    </section>
</div>