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
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Include the Awesome Font.
 */
function theme_uikit_set_fontwww($css) {
    $tag = '[[setting:fontwww]]';
	
    $theme = theme_config::load('uikit');
    if (!empty($theme->settings->bootstrapcdn)) {
        $css = str_replace($tag, '//netdna.bootstrapcdn.com/font-awesome/4.1.0/fonts/', $css);
    } else {
        $css = str_replace($tag, '/theme/uikit/fonts/', $css);
    }
    return $css;
}

/**
 * Adds the logo to CSS.
 *
 * @param string $css The CSS.
 * @param string $logo The URL of the logo.
 * @return string The parsed CSS
 */
function theme_uikit_set_logo($css, $logo) {
    $tag = '[[setting:logo]]';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    }
    $css = str_replace($tag, $replacement, $css);
    return $css;
}

function theme_uikit_set_pagebackground($css, $pagebackground) {
    $tag = '[[setting:pagebackground]]';
    if (!empty($pagebackground)) {
        $replacement = "background-image: url(\"$pagebackground\")";
    }else{
        $replacement = "/* No image */";
    }
    $css = str_replace($tag, $replacement, $css);
    
    return $css;
}

function theme_uikit_set_headerbackground($css, $headerbackground) {
    $tag = '[[setting:headerbackground]]';
    if (!empty($headerbackground)) {
        $replacement = "background-image: url(\"$headerbackground\")";
    }else{
        $replacement = "/* No image */";
    }
    $css = str_replace($tag, $replacement, $css);
    
    return $css;
}

function theme_uikit_set_footerbackground($css, $footerbackground) {
    $tag = '[[setting:footerbackground]]';
    if (!empty($footerbackground)) {
        $replacement = "background-image: url(\"$footerbackground\")";
    }else{
        $replacement = "/* No image */";
    }
    $css = str_replace($tag, $replacement, $css);
    
    return $css;
}

function theme_uikit_set_loginheaderimage($css, $loginheaderimage) {
    //Active the rules if necessary:
    $rule_tag = '[[setting:loginheaderimagerule]]';
    if (!empty($loginheaderimage)) {
        $rule = ".loginpanel";
    }else{
        $rule = "._loginimagedisabled_";
    }
    $css = str_replace($rule_tag, $rule, $css);
    
    //Replace url:
    $url_tag = '[[setting:loginheaderimageurl]]';
    $css = str_replace($url_tag, $loginheaderimage, $css);
    
    
    return $css;
}

function theme_uikit_set_slideshow_colors($css, &$theme) {
    //Replace slideshow colors:
    $defaults = array(
        'slideshowbordercolor' => '#777',
        'slideshowtitlecolor' => '#777',
        'slideshowcaptioncolor' => '#777',
        'slideshowbuttoncolor' => '#777',
        'slideshowbuttontextcolor' => '#777'
    );
    
    foreach ($defaults as $setting => $default) {
        if(!empty($theme->settings->$setting)){
            $color = $theme->settings->$setting;
        }else{
            $color = $default;
        }
        
        $tag = "[[setting:$setting]]";
        
        $css = str_replace($tag, $color, $css);
    }
    
    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
function theme_uikit_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM) {
        $theme = theme_config::load('uikit');
        
        $valid_files = array(
            'logo',
            'favicon',
            'footerimage',
            'pagebackground',
            'headerbackground',
            'footerbackground',
            'loginheaderimage',
            'iphoneicon',
            'iphoneretinaicon',
            'ipadicon',
            'ipadretinaicon'
        );
        
        preg_match("slide\d+image", $filearea);
        
        if (in_array($filearea, $valid_files) || preg_match("#slide\d+image#", $filearea) || preg_match("#marketing\d+image#", $filearea)) {
            return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
        } else {
            send_file_not_found();
        }
    } else {
        send_file_not_found();
    }
}

/**
 * get_performance_output() override get_peformance_info()
 *  in moodlelib.php. Returns a string
 * values ready for use.
 *
 * @return string
 */
function uikit_performance_output($param) {
    $html = '<div class="uk-grid performanceinfo"><div><h2>Performance Information</h2></div>';
    if (isset($param['realtime'])){
        $html .= '<div class="uk-width-1-4"><a href="#"><var id="load">' . $param['realtime'] . ' secs</var><span>Load Time</span></a></div>';
    }
    if (isset($param['memory_total'])){
        $html .= '<div class="uk-width-1-4"><a href="#"><var id="memory">' . display_size($param['memory_total']) . '</var><span>Memory Used</span></a></div>';
    }
    if (isset($param['includecount'])){
        $html .= '<div class="uk-width-1-4"><a href="#"><var id="included">' . $param['includecount'] . ' Files </var><span>Included</span></a></div>';
    }
    if (isset($param['dbqueries'])){
        $html .= '<div class="uk-width-1-4"><a href="#"><var id="db">' . $param['dbqueries'] . ' </var><span>DB Read/Write</span></a></div>';
    }
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

function theme_uikit_process_css($css, $theme) {
    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_uikit_set_logo($css, $logo);

    // Set the background image for the page.
    $setting = 'pagebackground';
    $pagebackground = $theme->setting_file_url($setting, $setting);
    $css = theme_uikit_set_pagebackground($css, $pagebackground);
    
    // Set the background image for the header.
    $setting = 'headerbackground';
    $pagebackground = $theme->setting_file_url($setting, $setting);
    $css = theme_uikit_set_headerbackground($css, $pagebackground);
    
    // Set the background image for the footer.
    $setting = 'footerbackground';
    $pagebackground = $theme->setting_file_url($setting, $setting);
    $css = theme_uikit_set_footerbackground($css, $pagebackground);
    
    // Set the login image instead of header.
    $setting = 'loginheaderimage';
    $loginheaderimage = $theme->setting_file_url($setting, $setting);
    $css = theme_uikit_set_loginheaderimage($css, $loginheaderimage);
    
	// Set the slideshow colors
    $css = theme_uikit_set_slideshow_colors($css, $theme);
	
    // Set the font path.
    $css = theme_uikit_set_fontwww($css);
    return $css;
}

function theme_uikit_page_init(moodle_page $page) {
    $page->requires->jquery();
}