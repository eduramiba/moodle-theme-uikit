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
 * Renderers to align Moodle's HTML with that expected by UIkit
 *
 * @package    theme_uikit
 * @copyright  2014 Eduardo Ramos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->dirroot . '/course/renderer.php');

class theme_uikit_core_course_renderer extends core_course_renderer {

    /**
     * Returns HTML to print tree with course categories and courses for the frontpage
     *
     * Overriden in UIKit theme so the option to only show enrolled courses is used when viewing the combo list in frontpage.
     * 
     * @return string
     */
    public function frontpage_combo_list() {
        $showOnlyEnrolled = $this->page->theme->settings->combolistshowonlyenrrolled;
        if ($showOnlyEnrolled) {
            return $this->frontpage_combo_list_only_enrolled();
        } else {
            return parent::frontpage_combo_list();
        }
    }

    /**
     * Returns HTML to print tree with course categories and courses for the frontpage only including enrolled courses
     * 
     * @return string
     */
    public function frontpage_combo_list_only_enrolled() {
        if (!isloggedin() || isguestuser()) {
            return '';
        }
        
        $courses_ids = theme_uikit_utils::get_enrolled_course_ids();

        global $CFG;
        require_once($CFG->libdir . '/coursecatlib.php');
        $chelper = new coursecat_helper();
        $chelper->set_subcat_depth(0)->
                set_categories_display_options(array(
                    'limit' => 0,
                ))->
                set_courses_display_options(array(
                    'limit' => 0,
                    'courses_filter_ids' => $courses_ids
                ))->
                set_attributes(array('class' => 'frontpage-category-combo'));
        $chelper->set_show_courses(self::COURSECAT_SHOW_COURSES_AUTO);

        $course_cat_tree = $this->coursecat_tree($chelper, coursecat::get(0));

        
        if(empty($course_cat_tree)){
            $course_cat_tree = html_writer::tag('div', get_string('noenrolments', 'theme_uikit'), array('class' => 'uk-alert uk-alert-danger', 'style' => 'clear: both;'));
        }
        return $course_cat_tree;
    }

    /**
     * Returns HTML to display the subcategories and courses in the given category
     *
     * This method is re-used by AJAX to expand content of not loaded category
     * 
     * Overriden in UIKit theme so the option to only show enrolled courses is used when viewing the combo list in frontpage.
     *
     * @param coursecat_helper $chelper various display options
     * @param coursecat $coursecat
     * @param int $depth depth of the category in the current tree
     * @return string
     */
    protected function coursecat_category_content(coursecat_helper $chelper, $coursecat, $depth) {
        if (!$this->page->theme->settings->combolistshowonlyenrrolled) {
            return parent::coursecat_category_content($chelper, $coursecat, $depth); //No filter, directly use core behaviour
        }

        $content = '';
        // Subcategories
        $content .= $this->coursecat_subcategories($chelper, $coursecat, $depth);
        

        // Courses
        $options = $chelper->get_courses_display_options();
        $options['recursive'] = true;//Get all courses of categories and subcategories
        $courses_recursive = $coursecat->get_courses($options);
        
        /**
        * Filter courses if necessary:
        */
        $courses_filter_ids = $chelper->get_courses_display_option('courses_filter_ids');
        $courses_recursive = theme_uikit_utils::filter_courses($courses_recursive, $courses_filter_ids);

        if (!empty($courses_recursive)) {
            $options = $chelper->get_courses_display_options();
            $courses_category = $coursecat->get_courses($options);
            
            /**
            * Filter courses if necessary:
            */
            $courses_category = theme_uikit_utils::filter_courses($courses_category, $courses_filter_ids);
            
            $viewmoreurl = $chelper->get_courses_display_option('viewmoreurl');
            if ($viewmoreurl) {
                // the option for 'View more' link was specified, display more link (if it is link to category view page, add category id)
                if ($viewmoreurl->compare(new moodle_url('/course/index.php'), URL_MATCH_BASE)) {
                    $chelper->set_courses_display_option('viewmoreurl', new moodle_url($viewmoreurl, array('categoryid' => $coursecat->id)));
                }
            }

            $content .= $this->coursecat_courses($chelper, $courses_category, $coursecat->get_courses_count());
        }else{
            return '';
        }
        
        return $content;
    }

    /**
     * Returns HTML to display a course category as a part of a tree
     *
     * This is an internal function, to display a particular category and all its contents
     * use {@link core_course_renderer::course_category()}
     * 
     * Overriden in UIKit theme so the option to only show enrolled courses is used when viewing the combo list in frontpage.
     *
     * @param coursecat_helper $chelper various display options
     * @param coursecat $coursecat
     * @param int $depth depth of this category in the current tree
     * @return string
     */
    protected function coursecat_category(coursecat_helper $chelper, $coursecat, $depth) {
        if (!$this->page->theme->settings->combolistshowonlyenrrolled) {
            return parent::coursecat_category($chelper, $coursecat, $depth);
        }

        $categorycontent = $this->coursecat_category_content($chelper, $coursecat, $depth);

        if (empty($categorycontent)) {
            return '';
        } else {
            // Make sure JS file to expand category content is included.
            $this->coursecat_include_js();
            return parent::coursecat_category($chelper, $coursecat, $depth);
        }
    }
    
    /**
     * Returns HTML to display a tree of subcategories and courses in the given category.
     * 
     * Overriden in UIKit theme so the option to only show enrolled courses is used when viewing a category.
     *
     * @param coursecat_helper $chelper various display options
     * @param coursecat $coursecat top category (this category's name and description will NOT be added to the tree)
     * @return string
     */
    protected function coursecat_tree(coursecat_helper $chelper, $coursecat) {
        $showOnlyEnrolled = $this->page->theme->settings->combolistshowonlyenrrolled;
        if($showOnlyEnrolled){
            $courses_ids = theme_uikit_utils::get_enrolled_course_ids();
            $chelper->set_courses_display_option('courses_filter_ids', $courses_ids);
        }
        
        return parent::coursecat_tree($chelper, $coursecat);
    }
}
