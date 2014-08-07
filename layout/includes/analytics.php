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
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
//Check for theme settings 

function analytics_trackurl() {
    global $DB, $PAGE, $COURSE;
    $pageinfo = get_context_info_array($PAGE->context->id);
    $trackurl = "'/";

    // Adds course category name.
    if (isset($pageinfo[1]->category)) {
        if ($category = $DB->get_record('course_categories', array('id'=>$pageinfo[1]->category))) {
            $cats=explode("/",$category->path);
            foreach(array_filter($cats) as $cat) {
                if ($categorydepth = $DB->get_record("course_categories", array("id" => $cat))) {;
                    $trackurl .= urlencode($categorydepth->name).'/';
                }
            }
        }
    }

    // Adds course full name.
    if (isset($pageinfo[1]->fullname)) {
        if (isset($pageinfo[2]->name)) {
            $trackurl .= urlencode($pageinfo[1]->fullname).'/';
        } else if ($PAGE->user_is_editing()) {
            $trackurl .= urlencode($pageinfo[1]->fullname).'/'.get_string('edit');
        } else {
            $trackurl .= urlencode($pageinfo[1]->fullname).'/'.get_string('view');
        }
    }

    // Adds activity name.
    if (isset($pageinfo[2]->name)) {
        $trackurl .= urlencode($pageinfo[2]->modname).'/'.urlencode($pageinfo[2]->name);
    }
    
    $trackurl .= "'";
    return $trackurl;
}
 
function insert_analytics_tracking() {
    global $PAGE;
    $enabled = (empty($PAGE->theme->settings->useanalytics)) ? false : $PAGE->theme->settings->useanalytics;
    $siteid = (empty($PAGE->theme->settings->analyticsid)) ? false : $PAGE->theme->settings->analyticsid;
    $cleanurl = (empty($PAGE->theme->settings->analyticsclean)) ? false : $PAGE->theme->settings->analyticsclean;
    $trackadmin = (empty($PAGE->theme->settings->analyticsadmin)) ? false : $PAGE->theme->settings->analyticsadmin;
    
    if ($cleanurl) {
        $addition = 
            "{'hitType' : 'pageview',
            'page' : ".analytics_trackurl().",
            'title' : '".addslashes($PAGE->heading)."'
            }";
    } else {
        $addition = "'pageview'";
    }
    
    
    if ($enabled && (!is_siteadmin() || $trackadmin)) {
        echo "   
            <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            ga('create', '".$siteid."', {'siteSpeedSampleRate': 50});
            ga('send', ".$addition.");
            
            </script>
            ";
    }
}

insert_analytics_tracking();