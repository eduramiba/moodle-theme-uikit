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
require_once($CFG->libdir. '/coursecatlib.php');
abstract class abstract_uikit_core_renderer extends core_renderer {
    
     /**
     * Extended login info to support modes in this theme settings.
     * 
     * Return the standard string that says whether you are logged in (and switched
     * roles/logged in as another user).
     * @param bool $withlinks if false, then don't include any links in the HTML produced.
     * If not set, the default is the nologinlinks option from the theme config.php file,
     * and if that is not set, then links are included.
     * @param int $displaymode
     * @return string HTML fragment.
     */
    public function login_info($withlinks = null, $displaymode = 0){
        switch($displaymode){
            case 1:
                return $this->login_info_html(true, false);
            case 2:
                return $this->login_info_html(false);
            case 3:
                return '';
            case 0:
            default:
                return parent::login_info($withlinks);
        }
    }
    
    /**
     * Custom function similar to renderer_base::login_info but with more options for this theme.
     */
    protected function login_info_html($bDisplayName = true, $bDisplayLoggedInAsText = true, $bDisplayLogout = true, $withlinks = true) {
       global $USER, $CFG, $DB;

        if (during_initial_install()) {
            return '';
        }

        if (is_null($withlinks)) {
            $withlinks = empty($this->page->layout_options['nologinlinks']);
        }

        $loginpage = ((string)$this->page->url === get_login_url());
        $course = $this->page->course;
        
        
        if(class_exists('\\core\\session\\manager')){
            //Moodle 2.6 or newer
            $isLoggedInAs = \core\session\manager::is_loggedinas();
            if($isLoggedInAs){
                $realuser = \core\session\manager::get_realuser();
            }
        }else{
            //Moodle 2.5 or older
            $isLoggedInAs = session_is_loggedinas();
            if($isLoggedInAs){
                $realuser = session_get_realuser();
            }
        }
        
        
        
        if ($isLoggedInAs) {
            $fullname = fullname($realuser, true);
            if ($withlinks) {
                $loginastitle = get_string('loginas');
                $realuserinfo = " [<a href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\"";
                $realuserinfo .= "title =\"".$loginastitle."\">$fullname</a>] ";
            } else {
                $realuserinfo = " [$fullname] ";
            }
        } else {
            $realuserinfo = '';
        }

        $loginurl = get_login_url();
        
        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            if($bDisplayName){
                $username = fullname($USER, true);

                // Since Moodle 2.0 this link always goes to the public profile page (not the course profile page)
                if ($withlinks) {
                    $linktitle = get_string('viewprofile');
                    $username = "<a href=\"$CFG->wwwroot/user/profile.php?id=$USER->id\" title=\"$linktitle\">$username</a>";
                } else {
                    $username = $username;
                }
                if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id' => $USER->mnethostid))) {
                    if ($withlinks) {
                        $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                    } else {
                        $username .= " from {$idprovider->name}";
                    }
                }
            }
            
            if($bDisplayName){
                if (isguestuser()) {
                    if($bDisplayLoggedInAsText){
                        $loggedinas = $realuserinfo . get_string('loggedinasguest');
                    }else{
                        $loggedinas = $realuserinfo . get_string('guest');
                    }
                        
                    if (!$loginpage && $withlinks) {
                        $loggedinas .= " (<a href=\"$loginurl\">" . get_string('login') . '</a>)';
                    }
                } else if (is_role_switched($course->id)) { // Has switched roles
                    $rolename = '';
                    if ($role = $DB->get_record('role', array('id' => $USER->access['rsw'][$context->path]))) {
                        $rolename = ': ' . role_get_name($role, $context);
                    }
                    
                    if($bDisplayLoggedInAsText){
                        $loggedinas = get_string('loggedinas', 'moodle', $username) . $rolename;
                    }else{
                        $loggedinas = $username . $rolename;
                    }
                    
                    if ($withlinks) {
                        $url = new moodle_url('/course/switchrole.php', array('id' => $course->id, 'sesskey' => sesskey(), 'switchrole' => 0, 'returnurl' => $this->page->url->out_as_local_url(false)));
                        $loggedinas .= '(' . html_writer::tag('a', get_string('switchrolereturn'), array('href' => $url)) . ')';
                    }
                } else {
                    if($bDisplayLoggedInAsText){
                        $loggedinas = $realuserinfo . get_string('loggedinas', 'moodle', $username);
                    }else{
                        $loggedinas = $realuserinfo . $username;
                    }
                    
                    if ($bDisplayLogout && $withlinks) {
                        $loggedinas .= " (<a href=\"$CFG->wwwroot/login/logout.php?sesskey=" . sesskey() . "\">" . get_string('logout') . '</a>)';
                    }
                }
            }else{
                if($bDisplayLogout){
                    $loggedinas = "<a href=\"$CFG->wwwroot/login/logout.php?sesskey=" . sesskey() . "\">" . get_string('logout') . '</a>';
                }else{
                    $loggedinas = '';
                }
            }
        } else {
            if($bDisplayLoggedInAsText){
                $loggedinas = get_string('loggedinnot', 'moodle');
                if (!$loginpage && $withlinks) {
                    $loggedinas .= " (<a href=\"$loginurl\">" . get_string('login') . '</a>)';
                }
            }else{
                $loggedinas = "<a href=\"$loginurl\">" . get_string('login') . '</a>';
            }
        }

        $loggedinas = '<div class="logininfo">'.$loggedinas.'</div>';
        
        return $loggedinas;
    }
    
    /**
     * Returns HTML attributes to use within the body tag. This includes an ID and classes.
     *
     * @since 2.5.1 2.6
     * @param string|array $additionalclasses Any additional classes to give the body tag,
     * @return string
     */
    public function body_attributes($additionalclasses = array()) {
        if (!is_array($additionalclasses)) {
            $additionalclasses = explode(' ', $additionalclasses);
        }

        //Check and indicate moodle version with a body class
        //Note: this is used to avoid maintaining 2 different theme branches already,
        //while only 2.5 and 2.6 are out since the theme development started...
        global $CFG;
        $bIsMoodle26Plus = $CFG->version >= 2013111500;//Around first release of Moodle 2.6
        if ($bIsMoodle26Plus) {
            $moodleVersionClass = 'moodle26plus';
        }else{
            $moodleVersionClass = 'moodle26prior';
        }
        
        if(empty($additionalclasses)){
            $additionalclasses = array();
        }
        
        $nopagenavbar = (isset($this->page->theme->settings->breadcrumbsplacement) && $this->page->theme->settings->breadcrumbsplacement == 2)
                && (isset($this->page->theme->settings->pagenavbarcontent) && $this->page->theme->settings->pagenavbarcontent == 'dontshow');
        $pagenavbarclass = '';
        if($nopagenavbar){
            $pagenavbarclass = 'nopagenavbar';
        }
        
        $aClasses = array_merge(array('theme_uikit', $moodleVersionClass, $pagenavbarclass), $additionalclasses);
        
        return ' id="'. $this->body_id().'" class="'.$this->body_css_classes($aClasses).'"';
    }
    
   
    
    /*
     * This renders a notification message.
     * Uses bootstrap compatible html.
     */

    public function notification($message, $classes = 'notifyproblem') {
        $message = clean_text($message);
        $type = '';

        if ($classes == 'notifyproblem') {
            $type = 'uk-alert uk-alert-danger';
        }
        if ($classes == 'notifysuccess') {
            $type = 'uk-alert uk-alert-success';
        }
        if ($classes == 'notifymessage') {
            $type = 'uk-alert uk-alert-info';
        }
        if ($classes == 'redirectmessage') {
            $type = 'uk-alert uk-alert-large';
        }
        return "<div class=\"$type\" data-uk-alert>"
                . '<a href="" class="uk-alert-close uk-close"></a>'
                . "<p>$message</p></div>";
    }

    /*
     * This renders the navbar.
     * Uses uikit compatible html.
     */

    public function navbar() {
        $items = $this->page->navbar->get_items();
        if(empty($items)){
            return '';
        }
        $breadcrumbs = array();
        foreach ($items as $item) {
            $item->hideicon = true;
            $breadcrumbs[] = $this->render($item);
        }
        $list_items = '<li>' . join("</li><li>", $breadcrumbs) . '</li>';
        $title = '<span class="accesshide">' . get_string('pagepath') . '</span>';
        return $title . "<ul class=\"uk-breadcrumb\">$list_items</ul>";
    }
    
    /**
     * Processes a menu item text for responsive features.
     * The text of the element will hide when the size of the viewport is small.
     * Do not include icon of the item.
     * @param string $text
     * @param bool $isOffCanvas
     * @return string
     */
    protected function processMenuItemText($text, $isOffCanvas = false){
        if(!$isOffCanvas){
            return '<span class="uk-hidden-small">'.$text.'</span>';
        }else{
            return $text;
        }
    }

    /**
     * Renders tabtree
     *
     * @param tabtree $tabtree
     * @return string
     */
    protected function render_tabtree(tabtree $tabtree) {
        if (empty($tabtree->subtree)) {
            return '';
        }
        $firstrow = $secondrow = '';
        foreach ($tabtree->subtree as $tab) {
            $firstrow .= $this->render($tab);
            if (($tab->selected || $tab->activated) && !empty($tab->subtree) && $tab->subtree !== array()) {
                $secondrow = $this->tabtree($tab->subtree);
            }
        }
        return html_writer::tag('ul', $firstrow, array('class' => 'uk-tab')) . $secondrow;
    }

    /**
     * Renders tabobject (part of tabtree)
     *
     * This function is called from {@link core_renderer::render_tabtree()}
     * and also it calls itself when printing the $tabobject subtree recursively.
     *
     * @param tabobject $tab
     * @return string HTML fragment
     */
    protected function render_tabobject(tabobject $tab) {
        if ($tab->selected or $tab->activated) {
            return html_writer::tag('li', html_writer::tag('a', $tab->text), array('class' => 'uk-active'));
        } else if ($tab->inactive) {
            return html_writer::tag('li', html_writer::tag('a', $tab->text), array('class' => 'uk-disabled'));
        } else {
            if (!($tab->link instanceof moodle_url)) {
                // backward compartibility when link was passed as quoted string
                $link = "<a href=\"$tab->link\" title=\"$tab->title\">$tab->text</a>";
            } else {
                $link = html_writer::link($tab->link, $tab->text, array('title' => $tab->title));
            }
            return html_writer::tag('li', $link);
        }
    }

    /**
     * Outputs the page's footer
     * @return string HTML fragment
     */
    public function footer() {
        global $CFG, $DB, $USER;

        $output = $this->container_end_all(true);

        $footer = $this->opencontainers->pop('header/footer');

        if (debugging() and $DB and $DB->is_transaction_started()) {
            // TODO: MDL-20625 print warning - transaction will be rolled back
        }

        // Provide some performance info if required
        $performanceinfo = '';
        if (defined('MDL_PERF') || (!empty($CFG->perfdebug) and $CFG->perfdebug > 7)) {
            $perf = get_performance_info();
            if (defined('MDL_PERFTOLOG') && !function_exists('register_shutdown_function')) {
                error_log("PERF: " . $perf['txt']);
            }
            if (defined('MDL_PERFTOFOOT') || debugging() || $CFG->perfdebug > 7) {
                $performanceinfo = uikit_performance_output($perf);
            }
        }

        $footer = str_replace($this->unique_performance_info_token, $performanceinfo, $footer);

        $footer = str_replace($this->unique_end_html_token, $this->page->requires->get_end_code(), $footer);

        $this->page->set_state(moodle_page::STATE_DONE);

        if (!empty($this->page->theme->settings->persistentedit) && property_exists($USER, 'editing') && $USER->editing && !$this->really_editing) {
            $USER->editing = false;
        }

        return $output . $footer;
    }

    protected function render_custom_menu(custom_menu $menu, $isOffCanvas = false) {
        global $CFG;
        
        
        $themeMenuItemsMode = isset($this->page->theme->settings->themenavigationelementsmode) ? $this->page->theme->settings->themenavigationelementsmode : 1;
        
        if($themeMenuItemsMode == 2){
            //We use negative branchsort so any site custom elements appear after theme elements
            $langposition = -3000;
            $dashboardposition = -2000;
            $mycoursesposition = -1000;
        }else{
            //We use positive branchsort so any site custom elements appear before theme elements
            $langposition = 1000;
            $dashboardposition = 2000;
            $mycoursesposition = 3000;
        }
        
        // TODO: eliminate this duplicated logic, it belongs in core, not
        // here. See MDL-39565.
        $addlangmenu = true;
        $langs = get_string_manager()->get_list_of_translations();
        if (count($langs) < 2 or empty($CFG->langmenu) or ($this->page->course != SITEID and !empty($this->page->course->lang))) {
            $addlangmenu = false;
        }

        if ($addlangmenu) {
            $language = $menu->add('<i class="uk-icon uk-icon-language"></i> '.$this->processMenuItemText(get_string('language'), $isOffCanvas), new moodle_url('#'), get_string('language'), $langposition);
            foreach ($langs as $langtype => $langname) {
                if($this->page->has_set_url()){
                    $pageurl = $this->page->url;
                }else{
                    $pageurl = '/';
                }
                $language->add($langname, new moodle_url($pageurl, array('lang' => $langtype)), $langname);
            }
        }
        
        /*
         * This code adds the My Dashboard
         * functionality to the custommenu.
         */
        $hasdisplaymydashboard = (empty($this->page->theme->settings->displaymydashboard)) ? false : $this->page->theme->settings->displaymydashboard;
        if (isloggedin() && $hasdisplaymydashboard) {
            $branchlabel = '<i class="uk-icon-dashboard"></i> ' . $this->processMenuItemText(get_string('mydashboard', 'theme_uikit'), $isOffCanvas);
            $branchurl = new moodle_url('#');
            $branchtitle = get_string('mydashboard', 'theme_uikit');
            $branchsort = $dashboardposition;

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $branchsort);
            
            if($isOffCanvas){
                $elemClass = '';
            }else{
                $elemClass = 'uk-text-bold';
            }
            
            $branch->add('<span class="'.$elemClass.'"><i class="uk-icon-user"></i> ' . get_string('profile') . '</span>', new moodle_url('/user/profile.php'), get_string('profile'));
            $branch->add('<span class="'.$elemClass.'"><i class="uk-icon-calendar"></i> ' . get_string('pluginname', 'block_calendar_month') . '</span>', new moodle_url('/calendar/view.php'), get_string('pluginname', 'block_calendar_month'));
            $branch->add('<span class="'.$elemClass.'"><i class="uk-icon-envelope"></i> ' . get_string('pluginname', 'block_messages') . '</span>', new moodle_url('/message/index.php'), get_string('pluginname', 'block_messages'));
            $branch->add('<span class="'.$elemClass.'"><i class="uk-icon-file"></i> ' . get_string('privatefiles', 'block_private_files') . '</span>', new moodle_url('/user/files.php'), get_string('privatefiles', 'block_private_files'));
            $branch->add('<span class="'.$elemClass.'"><i class="uk-icon-signout"></i> ' . get_string('logout') . '</span>', new moodle_url('/login/logout.php'), get_string('logout'));
        }
        
         /*
         * This code adds the current enrolled
         * courses to the custommenu.
         */
        $hasdisplaymycourses = (empty($this->page->theme->settings->displaymycourses)) ? false : $this->page->theme->settings->displaymycourses;
        if (isloggedin() && $hasdisplaymycourses) {
            $mycoursetitle = $this->page->theme->settings->mycoursetitle;
            if ($mycoursetitle == 'module') {
                $branchlabel = '<i class="uk-icon-briefcase"></i> ' . $this->processMenuItemText(get_string('mymodules', 'theme_uikit'), $isOffCanvas);
                $branchtitle = get_string('mymodules', 'theme_uikit');
            } else if ($mycoursetitle == 'unit') {
                $branchlabel = '<i class="uk-icon-briefcase"></i> ' . $this->processMenuItemText(get_string('myunits', 'theme_uikit'), $isOffCanvas);
                $branchtitle = get_string('myunits', 'theme_uikit');
            } else if ($mycoursetitle == 'class') {
                $branchlabel = '<i class="uk-icon-briefcase"></i> ' . $this->processMenuItemText(get_string('myclasses', 'theme_uikit'), $isOffCanvas);
                $branchtitle = get_string('myclasses', 'theme_uikit');
            } else if ($mycoursetitle == 'subject') {
                $branchlabel = '<i class="uk-icon-briefcase"></i> ' . $this->processMenuItemText(get_string('mysubjects', 'theme_uikit'), $isOffCanvas);
                $branchtitle = get_string('mysubjects', 'theme_uikit');
            } else {
                $branchlabel = '<i class="uk-icon-briefcase"></i> ' . $this->processMenuItemText(get_string('mycourses', 'theme_uikit'), $isOffCanvas);
                $branchtitle = get_string('mycourses', 'theme_uikit');
            }
            $branchurl = new moodle_url('#');

            $branch = $menu->add($branchlabel, $branchurl, $branchtitle, $mycoursesposition);
            
            $this->add_my_courses_subelements($branch);
        }
        
        return $this->render_custom_menu_base($menu, $isOffCanvas);
    }
    
    /**
     * 
     */
    protected abstract function render_custom_menu_base(custom_menu $menu, $isOffCanvas = false);
    
    /**
     * Prepares the my courses dropdown elements with simple or full categories hierarchy
     * @param custom_menu_item $branch
     */
    protected function add_my_courses_subelements(custom_menu_item $branch){
        $courses = enrol_get_my_courses(NULL, 'fullname ASC');

        if ($courses) {
            $courses_ids = theme_uikit_utils::get_enrolled_course_ids();
            
            if(isset($this->page->theme->settings->displaymycoursesmode)){
                $display_my_courses_mode = $this->page->theme->settings->displaymycoursesmode;
            }else{
                $display_my_courses_mode = 0;
            }
            
            if ($display_my_courses_mode == 0) {
                /**
               * Just add the courses, no hierarchy
               */
                foreach ($courses as $course) {
                    if ($course->visible) {
                        $branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id=' . $course->id), format_string($course->shortname));
                    }
                }
            } else {
                if ($display_my_courses_mode == 2) {
                    $max_depth = 0; //Full hierarchy
                } else {
                    $max_depth = 1; //Only top level category
                }

                $chelper = new coursecat_helper();
                $chelper->set_subcat_depth($max_depth)->
                        set_categories_display_options(array(
                            'limit' => 0,
                        ))->
                        set_courses_display_options(array(
                            'limit' => 0,
                            'courses_filter_ids' => $courses_ids
                        ))->
                        set_attributes(array('class' => 'frontpage-category-combo'));
                
                $this->coursecat_dropdown_tree($branch, $chelper, coursecat::get(0));
            }
        } else {
            $branch->add('<strong>' . get_string('noenrolments', 'theme_uikit') . '</strong>', new moodle_url('#'), get_string('noenrolments', 'theme_uikit'));
        }
    }
    
    /**
     * Returns HTML to display a tree of subcategories and courses in the given category
     *
     * @param custom_menu_item $branch Menu branch
     * @param coursecat_helper $chelper various display options
     * @param coursecat $coursecat top category (this category's name and description will NOT be added to the tree)
     * @return string
     */
    protected function coursecat_dropdown_tree(custom_menu_item $branch, coursecat_helper $chelper, coursecat $coursecat) {
        $options = $chelper->get_courses_display_options();
        $options['recursive'] = true;//Get all courses of categories and subcategories
        $courses_recursive = $coursecat->get_courses($options);
        
        /**
        * Filter courses if necessary:
        */
        $courses_filter_ids = $chelper->get_courses_display_option('courses_filter_ids');
        $courses_recursive = theme_uikit_utils::filter_courses($courses_recursive, $courses_filter_ids);
        if(empty($courses_recursive)){
            return;
        }
        
        
        $options = $chelper->get_courses_display_options();
        $courses = $coursecat->get_courses($options);

        /**
         * Add category title
         */
        $max_depth = $chelper->get_subcat_depth();
        $root_id = 0;
        if($coursecat->id != $root_id && ($max_depth <= 0 || $coursecat->depth <= $max_depth)){
            $categoryname = $coursecat->get_formatted_name();
            $new_branch = $branch->add($categoryname, new moodle_url('/course/index.php', array('categoryid' => $coursecat->id)));
        }else{
            $new_branch = $branch;
        }
        
        /**
        * Add courses
        * Filter courses if necessary:
        */
        $courses_filter_ids = $chelper->get_courses_display_option('courses_filter_ids');
        $courses = theme_uikit_utils::filter_courses($courses, $courses_filter_ids);

        //Add courses:
        foreach ($courses as $course) {
            if ($course->visible) {
                $new_branch->add(format_string($course->fullname), new moodle_url('/course/view.php?id=' . $course->id), format_string($course->shortname));
            }
        }
        
        
        /**
         * Then add subcategories
         */
        if ($coursecat->get_children_count()) {
            $subcategories = $coursecat->get_children($chelper->get_courses_display_options());
            
            foreach ($subcategories as $subcategory) {
                $this->coursecat_dropdown_tree($new_branch, $chelper, $subcategory);
            }
        }
    }

    /*
     * Overriding the custom_menu function ensures the custom menu is
     * always shown, even if no menu items are configured in the global
     * theme settings page.
     */

    public function custom_menu($custommenuitems = '', $isOffCanvas = false) {
        global $CFG;

        if (!empty($CFG->custommenuitems)) {
            $custommenuitems .= $CFG->custommenuitems;
        }
        $custommenu = new custom_menu($custommenuitems, current_language());
        return $this->render_custom_menu($custommenu, $isOffCanvas);
    }

    /*
     * This code replaces the icons in the Admin block with
     * FontAwesome variants where available.
     */

    protected function render_pix_icon(pix_icon $icon) {
        $iconReplacement = self::replace_moodle_icon($icon);
        if ($iconReplacement !== false) {
            return $iconReplacement;
        } else {
            return parent::render_pix_icon($icon);
        }
    }

    protected static function replace_moodle_icon(pix_icon $icon) {
        $name = $icon->pix;
        if(isset($icon->attributes) && !empty($icon->attributes['title'])){
            $title = sprintf(' title="%s"', $icon->attributes['title']);
        }else{
            $title = '';
        }
        
        $icons = array(
            'add' => 'plus',
            'book' => 'book',
            'chapter' => 'file',
            'docs' => 'question',
            'generate' => 'gift',
            'i/assignroles' => 'certificate',
            'i/backup' => 'upload',
            'i/badge' => 'trophy',
            'i/calendar' => 'calendar',
            'i/checkpermissions' => 'user',
            'i/cohort' => 'users',
            'i/down' => 'arrow-down',
            'i/dropdown' => 'caret-down',
            'i/edit' => 'pencil',
            'i/email' => 'envelope',
            'i/export' => 'upload',
            'i/files' => 'files-o',
            'i/filter' => 'filter',
            'i/folder' => 'folder',
            'i/grades' => 'table',
            'i/group' => 'group',
            'i/import' => 'download',
            'i/info' => 'info-circle',
            'i/marker' => 'lightbulb-o',
            'i/move_2d' => 'arrows',
            'i/dragdrop' => 'arrows',
            'i/navigationitem' => 'circle-o',
            'i/outcomes' => 'magic',
            'i/permissions' => 'key',
            'i/publish' => 'globe',
            'i/reload' => 'refresh',
            'i/report' => 'list-alt',
            'i/restore' => 'download',
            'i/return' => 'repeat',
            'i/roles' => 'user',
            'i/settings' => 'cog',
            'i/show' => 'eye',
            'i/hide' => 'eye-slash',
            'i/scales' => 'signal',
            'i/switchrole' => 'random',
            'i/twoway' => 'arrows-h',
            'i/user' => 'user',
            'i/users' => 'users',
            'i/warning' => 'warning',
            'i/withsubcat' => 'sitemap',
            
            'm/USD' => 'dollar',
            
            't/add' => 'plus',
            't/addcontact' => 'plus',
            't/approve' => 'check',
            't/award' => 'trophy',
            't/backup' => 'upload',
            't/restore' => 'download',
            't/block' => 'ban',
            't/block_to_dock' => 'caret-square-o-left',
            't/block_to_dock_rtl' => 'caret-square-o-right',
            't/dock_to_block' => 'caret-square-o-right',
            't/dock_to_block_rtl' => 'caret-square-o-left',
            't/dock_close' => 'times-circle',
            't/down' => 'arrow-down',
            't/calc' => 'star',
            't/calc_off' => 'star-o',
            't/cohort' => 'users',
            't/copy' => 'copy',
            't/delete' => 'times',
            't/removecontact' => 'times',
            't/edit_menu' => 'cog',
            't/edit' => 'cog',
            't/editstring' => 'pencil',
            't/email' => 'envelope',
            't/emailno' => 'envelope-o',
            't/grades' => 'table',
            't/more' => 'plus',
            't/move' => 'sort',
            't/sort' => 'sort',
            't/sort_asc' => 'sort-asc',
            't/sort_desc' => 'sort-desc',
            't/message' => 'comment',
            't/messages' => 'comments',
            't/lock' => 'unlock',
            't/locked' => 'lock',
            't/unlock' => 'lock',
            't/down' => 'arrow-down',
            't/left' => 'arrow-left',
            't/right' => 'arrow-right',
            't/up' => 'arrow-up',
            't/user' => 'user',
            't/print' => 'print',
        );
        
        //Issue #39 UIkit not compatible with un/hidding course sections in Moodle 3.0
        //We place an img tag just after the new icon because some Moodle modules try to find the img with javascript to alter it...
        //Sorry for this hack, they should be using classes instead of assuming that render_pix_icon will render an img tag
        if(strpos($name, 'uk-icon') === 0){
             return "<i class=\"$name uk-icon mr2\" ".$title."></i><img class=\"uk-hidden\" />";
        }elseif (isset($icons[$name])) {
            return "<i class=\"uk-icon-$icons[$name] uk-icon mr2\" ".$title."></i><img class=\"uk-hidden\" />";
        } else {
            return false;
        }
    }

    /**
     * Get the HTML for blocks in the given region.
     *
     * @since 2.5.1 2.6
     * @param string $region The region to get HTML for.
     * @return string HTML.
     * Written by G J Bernard
     */
    public function uikitblocks($region, $classes = array(), $tag = 'aside') {
        $classes = (array) $classes;
        $classes[] = 'block-region';
        $attributes = array(
            'id' => 'block-region-' . preg_replace('#[^a-zA-Z0-9_\-]+#', '-', $region),
            'class' => join(' ', $classes),
            'data-blockregion' => $region,
            'data-droptarget' => '1'
        );
        return html_writer::tag($tag, $this->blocks_for_region($region), $attributes);
    }

    /**
     * Returns HTML to display a "Turn editing on/off" button in a form.
     *
     * @param moodle_url $url The URL + params to send through when clicking the button
     * @return string HTML the button
     * Written by G J Bernard
     */
    public function edit_button(moodle_url $url) {
        $url->param('sesskey', sesskey());
        if ($this->page->user_is_editing()) {
            $url->param('edit', 'off');
            $btn = 'uk-button-danger';
            $title = get_string('turneditingoff');
            $icon = 'uk-icon-power-off';
        } else {
            $url->param('edit', 'on');
            $btn = 'uk-button-success';
            $title = get_string('turneditingon');
            $icon = 'uk-icon-edit';
        }
        return html_writer::tag('a', html_writer::start_tag('i', array('class' => $icon)) .
                        html_writer::end_tag('i'), array('href' => $url, 'class' => 'uk-button uk-button-small ' . $btn, 'title' => $title, 'data-uk-tooltip' => ''));
    }

    /**
     * Renders a single button widget.
     *
     * This will return HTML to display a form containing a single button.
     *
     * @param single_button $button
     * @return string HTML fragment
     */
    protected function render_single_button(single_button $button) {
        $attributes = array('type'     => 'submit',
                            'value'    => $button->label,
                            'disabled' => $button->disabled ? 'disabled' : null,
                            'title'    => $button->tooltip,
                            'class' => 'uk-button');

        if ($button->actions) {
            $id = html_writer::random_id('single_button');
            $attributes['id'] = $id;
            foreach ($button->actions as $action) {
                $this->add_action_handler($action, $id);
            }
        }

        // first the input element
        $output = html_writer::empty_tag('input', $attributes);

        // then hidden fields
        $params = $button->url->params();
        if ($button->method === 'post') {
            $params['sesskey'] = sesskey();
        }
        foreach ($params as $var => $val) {
            $output .= html_writer::empty_tag('input', array('type' => 'hidden', 'name' => $var, 'value' => $val));
        }

        // then div wrapper for xhtml strictness
        $output = html_writer::tag('div', $output);

        // now the form itself around it
        if ($button->method === 'get') {
            $url = $button->url->out_omit_querystring(true); // url without params, the anchor part allowed
        } else {
            $url = $button->url->out_omit_querystring();     // url without params, the anchor part not allowed
        }
        if ($url === '') {
            $url = '#'; // there has to be always some action
        }
        $attributes = array('method' => $button->method,
                            'action' => $url,
                            'id'     => $button->formid);
        $output = html_writer::tag('form', $output, $attributes);

        // and finally one more wrapper with class
        return html_writer::tag('div', $output, array('class' => $button->class));
    }
    
    
    
    
    
    
    
    
    /**
     * BLOCKS Rendering
     */
    
    /**
     * Prints a nice side block with an optional header.
     *
     * The content is described
     * by a {@link core_renderer::block_contents} object.
     *
     * <div id="inst{$instanceid}" class="block_{$blockname} block">
     *      <div class="header"></div>
     *      <div class="content">
     *          ...CONTENT...
     *          <div class="footer">
     *          </div>
     *      </div>
     *      <div class="annotation">
     *      </div>
     * </div>
     *
     * @param block_contents $bc HTML for the content
     * @param string $region the region the block is appearing in.
     * @return string the HTML to be output.
     */
    public function block(block_contents $bc, $region) {
        $bc = clone($bc); // Avoid messing up the object passed in.
        if (empty($bc->blockinstanceid) || !strip_tags($bc->title)) {
            $bc->collapsible = block_contents::NOT_HIDEABLE;
        }
        $skiptitle = strip_tags($bc->title);
        if ($bc->blockinstanceid && !empty($skiptitle)) {
            $bc->attributes['aria-labelledby'] = 'instance-'.$bc->blockinstanceid.'-header';
        } else if (!empty($bc->arialabel)) {
            $bc->attributes['aria-label'] = $bc->arialabel;
        }
        if ($bc->collapsible == block_contents::HIDDEN) {
            $bc->add_class('hidden');
        }
        if (!empty($bc->controls)) {
            $bc->add_class('block_with_controls');
        }
        
        //UIKit classes:
        $bc->add_class('uk-panel');
        $bc->add_class('uk-panel-box');
        $bc->add_class('uk-panel-header');

        $output = '';

        $output .= html_writer::start_tag('div', $bc->attributes);

        $output .= $this->block_header($bc);
        $output .= $this->block_content($bc);

        $output .= html_writer::end_tag('div');

        $output .= $this->block_annotation($bc);

        $this->init_block_hider_js($bc);
        return $output;
    }

    /**
     * Produces a header for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_header(block_contents $bc) {

        $title = '';
        if ($bc->title) {
            $attributes = array();
            if ($bc->blockinstanceid) {
                $attributes['id'] = 'instance-'.$bc->blockinstanceid.'-header';
            }
            
            $title = html_writer::tag('h2', $bc->title, $attributes);
        }

        $controlshtml = $this->block_controls($bc->controls);
        
        $output = '';
        if ($title || $controlshtml) {
            $output .= '<div class="header">';
            $output .= $controlshtml;
            $output .= html_writer::tag('div', $title, array('class' => 'uk-panel-title'));
            $output .= html_writer::tag('div', html_writer::tag('div', '', array('class'=>'block_action')), array('class'=>'uk-panel-badge title'));
            $output .= '</div>';
        }
        
        return $output;
    }

    /**
     * Produces the content area for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_content(block_contents $bc) {
        $output = html_writer::start_tag('div', array('class' => 'content'));
        if (!$bc->title && !$this->block_controls($bc->controls)) {
            $output .= html_writer::tag('div', '', array('class'=>'block_action notitle'));
        }
        $output .= $bc->content;
        $output .= $this->block_footer($bc);
        $output .= html_writer::end_tag('div');

        return $output;
    }

    /**
     * Produces the footer for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_footer(block_contents $bc) {
        $output = '';
        if ($bc->footer) {
            $output .= html_writer::tag('div', $bc->footer, array('class' => 'footer'));
        }
        return $output;
    }

    /**
     * Produces the annotation for a block
     *
     * @param block_contents $bc
     * @return string
     */
    protected function block_annotation(block_contents $bc) {
        $output = '';
        if ($bc->annotation) {
            $output .= html_writer::tag('div', $bc->annotation, array('class' => 'blockannotation'));
        }
        return $output;
    }

    /**
     * Calls the JS require function to hide a block.
     *
     * @param block_contents $bc A block_contents object
     */
    protected function init_block_hider_js(block_contents $bc) {
        if (!empty($bc->attributes['id']) and $bc->collapsible != block_contents::NOT_HIDEABLE) {
            $config = new stdClass;
            $config->id = $bc->attributes['id'];
            $config->title = strip_tags($bc->title);
            $config->preference = 'block' . $bc->blockinstanceid . 'hidden';
            $config->tooltipVisible = get_string('hideblocka', 'access', $config->title);
            $config->tooltipHidden = get_string('showblocka', 'access', $config->title);

            $this->page->requires->js_init_call('M.util.init_block_hider', array($config));
            user_preference_allow_ajax_update($config->preference, PARAM_BOOL);
        }
    }
    
    /**
     * Returns the URL for the favicon.
     */
    public function favicon() {
        $theme = theme_config::load('uikit');
        $favicon = $theme->setting_file_url('favicon', 'favicon');
        if(!empty($favicon)){
            return $favicon;//Custom favicon
        }else{
            return $this->pix_url('favicon', 'theme');//Default favicon
        }
    }
    
    /**
     * Checks if there are customizer saved styles and they were saved in an old version.
     */
    public function check_stale_savedstyles(){
        global $DB;
        $table = "theme_uikit_less_settings";
        
        $saved_theme = $DB->get_field($table, 'value', array('setting' => 'theme'));
        
        if(!empty($saved_theme)){//Any styles saved?
            $current_theme_version = $this->page->theme->settings->version;
            $saved_styles_version = $saved_theme = $DB->get_field($table, 'value', array('setting' => 'version'));
            
            return $current_theme_version !== $saved_styles_version;
        }
        
        return false;
    }
}
