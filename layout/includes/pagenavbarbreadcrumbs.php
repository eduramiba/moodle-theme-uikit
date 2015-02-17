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
 * This code was written and released by Bas Brands and is added as a
 * value add to the uikit theme.
 * 
 * Top navbar breadcrumbs
 *
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
//Check for theme settings 
if (empty($PAGE->layout_options['nobreadcrumbs'])) {
    if (!isset($this->page->theme->settings->breadcrumbsplacement) || $this->page->theme->settings->breadcrumbsplacement == 1) { ?>
        <div id="page-navbar">
            <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
        </div>
        <?php
        } else {
            $pagenavbarcontentmode = isset($this->page->theme->settings->pagenavbarcontent) ? $this->page->theme->settings->pagenavbarcontent : 'pageheading';
            if($pagenavbarcontentmode != 'dontshow'){
                ?>
                <div id="page-navbar">
                    <div>
                        <?php
                                                                switch($pagenavbarcontentmode){
                                                                    case 'custom':
                                                                        $pagenavbartext = !empty($this->page->theme->settings->pagenavbarcustomcontent) ? $this->page->theme->settings->pagenavbarcustomcontent : '';
                                                                        break;
                                                                    case 'sitename':
                                                                        $pagenavbartext = $SITE->fullname;
                                                                        break;
                                                                    case 'siteshortname':
                                                                        $pagenavbartext = $SITE->shortname;
                                                                        break;
                                                                    case 'sitesummary':
                                                                        $pagenavbartext = $SITE->summary;
                                                                        break;
                                                                    case 'pagetitle':
                                                                        $pagenavbartext = $PAGE->title;
                                                                        break;
                                                                    case 'pageheading':
                                                                    default:
                                                                        $pagenavbartext = $PAGE->heading;
                                                                        break;
                                                                }

                                                                if (empty($pagenavbartext)) {
                                                                    $pagenavbartext = '&nbsp;';
                                                                }

                                                                echo $pagenavbartext;
                                                                ?>
                    </div>
                </div>
            <?php } ?>
        <?php
        }
    ?>
<?php
}