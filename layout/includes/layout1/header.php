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

$haslogo = (!empty($PAGE->theme->settings->logo));
$logoshowsummary = isset($PAGE->theme->settings->logoshowsummary) && $PAGE->theme->settings->logoshowsummary;
$hasheaderprofilepic = (empty($PAGE->theme->settings->headerprofilepic)) ? false : $PAGE->theme->settings->headerprofilepic;
$icon = 'pencil-square-o';
if(!empty($PAGE->theme->settings->siteicon)){
    $icon = $PAGE->theme->settings->siteicon;
}

?>

<?php if(empty($PAGE->layout_options['noheader'])){ ?>
    <header id="page-header" role="banner">
        <div id="page-header-content">
            <div class="uk-grid">
            <!-- HEADER: LOGO AREA -->
                <div class="uk-width-7-10">
                    <?php
                                        if (!$haslogo) { ?>
                        <div class="uk-grid uk-grid-small">
                            <div class="uk-width-3-10 uk-width-medium-2-10 uk-width-large-1-10">
                                <i id="headerlogo" class="uk-icon uk-icon-<?php echo $icon; ?>"></i>
                            </div>
                            <div class="uk-width-7-10 uk-width-medium-8-10 uk-width-large-9-10">
                                <h1 id="title">
                                    <a href="<?php echo $CFG->wwwroot; ?>" class="headerLink"><?php echo $SITE->shortname; ?></a>
                                </h1>
                                <h2 id="subtitle" class="uk-text-muted"><?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?></h2>
                            </div>
                        </div>
                    <?php
                                        } else {
						$backgroundUrl = $PAGE->theme->setting_file_url('logo', 'logo');
					?>
                        <a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                            <img src="<?php echo $backgroundUrl; ?>" alt="">
                        </a>
                        <?php if ($logoshowsummary){ ?>
                            <h2 id="subtitle" class="uk-text-muted clear"><?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?></h2>
                        <?php } ?>
                    <?php
                                        } ?>
                </div>
                <?php if (isloggedin() && $hasheaderprofilepic) { ?>
                    <div class="uk-width-3-10" id="profilepic">
                        <p class="socialheading"><?php echo $USER->firstname; ?></p>
                        <ul class="socials unstyled">
                            <li>
                                <?php echo $OUTPUT->user_picture($USER); ?>
                            </li>
                        </ul>            
                    </div>
                <?php
                                        } ?>
                
                <div class="uk-width-1-1">
                    <?php require_once(dirname(__FILE__) . '/../socialicons.php'); ?>
                </div>           
            <?php

                                        if (!empty($courseheader)) { ?>
                    <div id="course-header"><?php echo $courseheader; ?></div>
                <?php } ?>
            </div>
        </div>
    </header>
<?php }
