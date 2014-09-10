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
$slideshowenabled = 
        ($PAGE->theme->settings->toggleslideshow == 1 
            || ($PAGE->theme->settings->toggleslideshow == 2 && !isloggedin()) 
            || ($PAGE->theme->settings->toggleslideshow == 3 && isloggedin()))
        ;

if ($slideshowenabled) {
    $hideonphone = $PAGE->theme->settings->hideonphone;

    function theme_uikit_get_slide_html(&$PAGE, $i) {
        $titleSetting = "slide$i";
        $captionSetting = "slide{$i}caption";
        $urlSetting = "slide{$i}url";
        $urlTextSetting = "slide{$i}urltext";

        $title = $PAGE->theme->settings->$titleSetting;
        $caption = $PAGE->theme->settings->$captionSetting;
        $url = $PAGE->theme->settings->$urlSetting;
        $urlText = $PAGE->theme->settings->$urlTextSetting;
        $image = $PAGE->theme->setting_file_url("slide{$i}image", "slide{$i}image");

        if (!empty($title) || !empty($caption) || !empty($url) || !empty($image)) {
            $html = '<div class="da-slide">';
            if (!empty($title)) {
                $html .= '<h2>' . $title . '</h2>';
            }
            if (!empty($caption)) {
                $html .= '<p>' . $caption . '</p>';
            }
            if (!empty($url)) {
                if (empty($urlText)) {
                    $urlText = get_string('readmore', 'theme_uikit');
                }
                $html .= '<a href="' . $url . '" class="da-link">' . $urlText . '</a>';
            }
            if (!empty($image)) {
                $html .= '<div class="da-img"><img src="' . $image . '" alt="' . $title . '"></div>';
            }
            $html .= '</div>';
        } else {
            $html = '';
        }

        return $html;
    }

    $slidesHtml = '';
    $slides = isset($PAGE->theme->settings->slideshownumber) ? $PAGE->theme->settings->slideshownumber : 4;
    foreach (range(1, $slides) as $i) {
        $slidesHtml .= theme_uikit_get_slide_html($PAGE, $i);
    }

    if(!empty($slidesHtml)){
        ?>
        <div id="da-slider" class="da-slider variant2 <?php echo $hideonphone ?>" style="background-position: 8650% 0%;">
            <?php echo $slidesHtml; ?>
            <nav class="da-arrows">
                <span class="da-arrows-prev"></span>
                <span class="da-arrows-next"></span>
            </nav>
        </div>
        <?php
    }
}
