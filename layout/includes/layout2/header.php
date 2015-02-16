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
    <header id="page-header" role="banner" class="flexauto">
        <div id="page-header-content" class="flex-grid-horizontal">
            <!-- HEADER: LOGO AREA -->
            <div id="page-header-content-logo">
                <?php
                                            if (!$haslogo) { ?>
                    <div>
                        <i id="headerlogo" class="uk-icon uk-icon-<?php echo $icon; ?>"></i>
                        <h1 id="title" class="uk-display-inline">
                            <a href="<?php echo $CFG->wwwroot; ?>" class="headerLink"><?php echo $SITE->shortname; ?></a>
                        </h1>
                        <h2 id="subtitle" class="uk-text-muted">
                            <?php p(strip_tags(format_text($SITE->summary, FORMAT_HTML))) ?>
                        </h2>
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
            <div id="page-header-content-navigation" class="flexgrow flex-grid-vertical">
                <?php
                                                if(!isset($hasnavigation) || $hasnavigation){
                                                    require_once(dirname(__FILE__) . '/navbar.php');
                                                }
                                            ?>

                <?php require_once(dirname(__FILE__) . '/../socialicons.php');?>

                <?php require_once(dirname(__FILE__) . '/../pagenavbarbreadcrumbs.php');?>
            </div>
        </div>
    </header>
<?php }
