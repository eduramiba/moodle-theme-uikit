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
 * Utils for this theme
 *
 * @package    theme_uikit
 * @copyright  2014 Eduardo Ramos
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

if (!defined('MOODLE_INTERNAL')) {
    die;
}

/**
 * Class that holds some utils for this theme
 */
class theme_uikit_utils {
    /**
    * Returns an array with all enrolled course ids
    * @return int[]
    */
   public static function get_enrolled_course_ids(){
       static $course_ids = null;//static cache

       if($course_ids === null){
           $courses = enrol_get_my_courses();
           $course_ids = array_map(function($course) {
               return $course->id;
           }, $courses);
       }

       return $course_ids;
   }


   /**
    * Filters an array of courses by their ids.
    * @param array $courses
    * @param int[] $courses_filter_ids
    * @return array
    */
   public static function filter_courses($courses, $courses_filter_ids){
       if ($courses_filter_ids !== null && $courses_filter_ids !== false) {
           foreach ($courses as $index => $course) {
               if (!in_array($course->id, $courses_filter_ids)) {
                   unset($courses[$index]);
               }
           }
       }

       return $courses;
   }
}