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
    global $CFG;
    $tag = '[[setting:fontwww]]';
	
    $theme = theme_config::load('uikit');
    if (!empty($theme->settings->bootstrapcdn)) {
        $css = str_replace($tag, '//netdna.bootstrapcdn.com/font-awesome/4.3.0/fonts/', $css);
    } else {
        //Prepare local URL without http(s) and domain, so some browsers load the font even with mixed content.
        $url = $CFG->wwwroot.'/theme/uikit/fonts/';
        $localurl = parse_url($url, PHP_URL_PATH);
        
        if(empty($localurl)){
            //Some error happened, at least try with the full URL
            $localurl = $url;
        }
        
        $css = str_replace($tag, $localurl, $css);
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
    return str_replace($tag, $replacement, $css);
}

function theme_uikit_set_pagebackground($css, $pagebackground) {
    $tag = '[[setting:pagebackground]]';
    if (!empty($pagebackground)) {
        $replacement = "background-image: url(\"$pagebackground\")";
    }else{
        $replacement = "/* No image */";
    }
    return str_replace($tag, $replacement, $css);
}

function theme_uikit_set_headerbackground($css, $headerbackground) {
    $tag = '[[setting:headerbackground]]';
    if (!empty($headerbackground)) {
        $replacement = "background-image: url(\"$headerbackground\")";
    }else{
        $replacement = "/* No image */";
    }
    return str_replace($tag, $replacement, $css);
}

function theme_uikit_set_footerbackground($css, $footerbackground) {
    $tag = '[[setting:footerbackground]]';
    if (!empty($footerbackground)) {
        $replacement = "background-image: url(\"$footerbackground\")";
    }else{
        $replacement = "/* No image */";
    }
    return str_replace($tag, $replacement, $css);
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

function theme_uikit_set_slideshow_sizing($css, &$theme) {
    //Replace slideshow colors:
    $setting = 'slideshowsizingmode';

    $modecss = 'auto';
    if (isset($theme->settings->$setting)) {
        if ($theme->settings->$setting === 'height') {
            $modecss = 'auto 100%';
        } elseif ($theme->settings->$setting === 'width') {
            $modecss = '100% auto';
        }
    }
    $tag = "[[setting:$setting]]";

    return str_replace($tag, $modecss, $css);
}

function theme_uikit_set_slideshow_colors($css, &$theme) {
    //Replace slideshow colors:
    $defaults = array(
        'slideshowtitlecolor' => '#fff',
        'slideshowcaptioncolor' => '#fff',
        'slideshowarrowscolor' => '#fff'
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


/**
 * This function checks if the generated styles file has been included, and replaces the placeholder with the real generated css (saved in moodledata).
 * Then runs other post-processing functions (logo, background images, etc.) of this theme with the final css.
 * @param string $css
 * @return string
 */
function theme_uikit_process_css($css, $theme) {
    $placeholder = '[[theme_uikit_full_generated_styles]]';
    if(strpos($css, $placeholder) !== false){
        //Generated styles placeholder found, put real styles from moodledata:
        
        $context = context_system::instance();
        $fileinfo = array(
            'contextid' => $context->id,
            'component' => 'theme_uikit',
            'filearea' => 'theme_uikit_styles',
            'itemid' => 0,
            'filepath' => '/',
            'filename' => 'theme_uikit_generated_styles.css'
        );

        $fs = get_file_storage();
        $generated_css_file = $fs->get_file($fileinfo['contextid'], $fileinfo['component'], $fileinfo['filearea'], 
            $fileinfo['itemid'], $fileinfo['filepath'], $fileinfo['filename']);
        
        if($generated_css_file){
            $generatedcss = $generated_css_file->get_content();
        }else{
            //Error: the file should be present. Try to recover by loading the theme base styles:
            $generatedcss = file_get_contents(dirname(__FILE__).'/style/themeuikit.css');
        }
        
        $css = str_replace($placeholder, $generatedcss, $css);

        //Do a second replace of the placeholder, in case generatedcss contains malicious css that has the same placeholder (it would cause endless calls to this function)
        $css = str_replace($placeholder, '', $css);

        //We need to post-process the styles again by core Moodle to include images and fonts, and run the rest of this theme post-processing functions
        $themeName = 'uikit';
        $theme = theme_config::load($themeName);
        $css = $theme->post_process($css);
    }else{
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
        $css = theme_uikit_set_slideshow_sizing($css, $theme);
        $css = theme_uikit_set_slideshow_colors($css, $theme);

        // Set the font path.
        $css = theme_uikit_set_fontwww($css);
    }
    
    return $css;
}

function theme_uikit_page_init(moodle_page $page) {
    $page->requires->jquery();
}