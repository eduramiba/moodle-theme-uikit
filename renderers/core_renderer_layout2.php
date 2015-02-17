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
class theme_uikit_core_renderer extends abstract_uikit_core_renderer {
    
    public function body_attributes($additionalclasses = array()) {
        $additionalclasses[]= 'layout2 flex-grid-vertical page-navbar';
        
        if (isset($this->page->theme->settings->breadcrumbsplacement) && $this->page->theme->settings->breadcrumbsplacement != 1 
                && isset($this->page->theme->settings->pagenavbarcontent) && $this->page->theme->settings->pagenavbarcontent === 'dontshow') {
            $additionalclasses[]= 'no-page-navbar';
        }
        
        return parent::body_attributes($additionalclasses);
    }
    
    /**
     * Activate navigation slide toggle display.
     * @param string $region
     * @return string
     */
    public function blocks_for_region($region) {
        $content = parent::blocks_for_region($region);
        
        if($region === 'side-pre'){
            $responsivehtml = '
                <ul id="navigationAccordionNav" class="uk-nav uk-nav-side uk-visible-small">
                    <li><a id="navigationAccordionToggle" href="#"><span class="uk-icon uk-icon-bars"></span> '.get_string('navigationtoggletext', 'theme_uikit').'</a></li>
                </ul>
                ';
            
            $responsivehtml .= '<div id="navigationAccordion">'
                    . $content
                    . '</div>';
            
            return $responsivehtml;
        }else{
            return $content;
        }
    }
    
    protected function render_custom_menu_base(custom_menu $menu, $isOffCanvas = false){
        if(!isset($this->page->theme->settings->stickynavigationbar) || $this->page->theme->settings->stickynavigationbar){
            $stickyAttrs = array(
                'clsactive' => 'uk-active uk-margin-top'
            );
            
            if(!empty($this->page->theme->settings->stickynavigationbardelay)){
                $delayInPx = abs((int) $this->page->theme->settings->stickynavigationbardelay);
                
                $stickyAttrs['top']= '-'.$delayInPx;
                $stickyAttrs['animation']= 'uk-animation-slide-top';
            }
            
            $sticky = 'data-uk-sticky=\''.  json_encode($stickyAttrs).'\'';
        }else{
            $sticky = '';
        }
        
        
        
        $menu_items_html = '';
        
        foreach ($menu->get_children() as $item) {
            $menu_items_html .= $this->render_custom_menu_item($item, 0, $isOffCanvas);
        }
        
        $displayloggedusermode = isset($this->page->theme->settings->displayloggedusermode) ? $this->page->theme->settings->displayloggedusermode : 0;
        
        $bDisplayName = in_array($displayloggedusermode, array(0, 1));
        $bDisplayLogout = in_array($displayloggedusermode, array(0, 1, 2));
        
        if($bDisplayName || $bDisplayLogout){
            $menu_items_html .= $this->login_info_html_for_layout2_navigationbar($bDisplayName, $bDisplayLogout);
        }
        
        $buttonsclasses = $this->get_navigationbar_buttons_classes();
       $button_count = substr_count($menu_items_html, $buttonsclasses);
        
       if($button_count > 1){
           $buttongroup_class = 'uk-button-group';
       }else{
           $buttongroup_class = '';
       }
       
        $content = '<div id="navbar-buttongroup-uikit-theme" class="'.$buttongroup_class.' navbar-buttongroup-uikit-theme navbar navbar-fixed-top moodle-has-zindex" '.$sticky.'>';
        $content .= $menu_items_html;
        $content .= '</div>';
        
        return $content;
    }
    
    /*
     * This code renders the custom menu items for the
     * uikit button group with dropdowns.
     */
    protected function render_custom_menu_item(custom_menu_item $menunode, $level = 0, $isOffCanvas = false) {
        $content = '';
        if ($menunode->get_url() !== null) {
            $url = $menunode->get_url();
        } else {
            $url = '#';
        }
        
        $buttonsclasses = $this->get_navigationbar_buttons_classes();
        
        // If the child has menus render it as a sub menu.
        if ($menunode->has_children()) {
            //Dropdown (first parent)
            if($level === 0){
                $content .= html_writer::start_tag('div', array('class' => 'uk-button-dropdown', 'data-uk-dropdown' => "{mode:'click'}"));
                
                //Button
                $content .= html_writer::start_tag('a', array('href' => $url, 'class' => $buttonsclasses, 'href' => '#', 'title' => $menunode->get_title()));
                $content .= $menunode->get_text() . ' <i class="uk-icon uk-icon-caret-down"></i>';
                $content .= html_writer::end_tag('a');
                
                //Subelements
                $content .= html_writer::start_tag('div', array('class' => 'uk-dropdown uk-dropdown-small'));
                
                //List of subelements
                $content .= html_writer::start_tag('ul', array('class' => 'uk-nav uk-nav-dropdown', 'style' => 'text-align: start;'));
                foreach ($menunode->get_children() as $menunode) {
                    $content .= $this->render_custom_menu_item($menunode, $level + 1, $isOffCanvas);
                }
                $content .= html_writer::end_tag('ul');//End list of subelements
                
                $content .= html_writer::end_tag('div');//End subelements
                
                
                $content .= html_writer::end_tag('div');//End button group
            }else{
                //Sublist (not first parent)
                $content .= html_writer::start_tag('li', array('class' => 'uk-nav-header uk-text-bold'));
                $content .= $menunode->get_text();
                $content .= html_writer::end_tag('li');
                
                $content .= html_writer::start_tag('ul');
                foreach ($menunode->get_children() as $menunode) {
                    $content .= $this->render_custom_menu_item($menunode, $level + 1, $isOffCanvas);
                }
                $content .= html_writer::end_tag('ul');
            }
        } else {
            // The node doesn't have children so produce a final menuitem.
            if($level === 0){
                //First level element:
                $content .= html_writer::link($url, $menunode->get_text(), array('class' => $buttonsclasses, 'title' => $menunode->get_title()));
            }else{
                //Subelement:
                $content .= html_writer::start_tag('li');
                $content .= html_writer::link($url, $menunode->get_text(), array('title' => $menunode->get_title()));
                $content .= html_writer::end_tag('li');
            }
        }
        
        return $content;
    }

     /**
     * Custom function similar to renderer_base::login_info but with more options for this theme.
     */
     protected function login_info_html_for_layout2_navigationbar($bDisplayName = true, $bDisplayLogout = true) {
       global $USER, $CFG, $DB;

        if (during_initial_install()) {
            return '';
        }

        $course = $this->page->course;
        
        $buttonsclasses = $this->get_navigationbar_buttons_classes();
        
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
        
        
        $profileIcon = ' <i class="uk-icon uk-icon-user"></i> ';
        
        
        if ($isLoggedInAs) {
            $fullname = fullname($realuser, true);
            $loginastitle = get_string('loginas');
            $realuserinfo = "<a class=\"$buttonsclasses\" href=\"$CFG->wwwroot/course/loginas.php?id=$course->id&amp;sesskey=".sesskey()."\"";
            $realuserinfo .= "title =\"".$loginastitle."\">$fullname</a>";
        } else {
            $realuserinfo = '';
        }

        if (empty($course->id)) {
            // $course->id is not defined during installation
            return '';
        } else if (isloggedin()) {
            $context = context_course::instance($course->id);

            if($bDisplayName){
                $username = fullname($USER, true);

                // Since Moodle 2.0 this link always goes to the public profile page (not the course profile page)
                $linktitle = get_string('viewprofile');
                $username = "<a class=\"$buttonsclasses\" href=\"$CFG->wwwroot/user/profile.php?id=$USER->id\" title=\"$linktitle\">$profileIcon ".$this->processMenuItemText($username)."</a>";
                if (is_mnet_remote_user($USER) and $idprovider = $DB->get_record('mnet_host', array('id' => $USER->mnethostid))) {
                    $username .= " from <a href=\"{$idprovider->wwwroot}\">{$idprovider->name}</a>";
                }
            }
            
            if($bDisplayName){
                if (isguestuser()) {
                    $loggedinas = $realuserinfo . get_string('guest');
                    
                    $loggedinas .= $this->get_login_navigationbar_button($buttonsclasses);
                } else if (is_role_switched($course->id)) { // Has switched roles
                    $rolename = '';
                    if ($role = $DB->get_record('role', array('id' => $USER->access['rsw'][$context->path]))) {
                        $rolename = ': ' . role_get_name($role, $context);
                    }
                    
                    $loggedinas = $username . $rolename;
                    
                    $url = new moodle_url('/course/switchrole.php', array('id' => $course->id, 'sesskey' => sesskey(), 'switchrole' => 0, 'returnurl' => $this->page->url->out_as_local_url(false)));
                    $switchRoleReturnIcon = ' <i class="uk-icon uk-icon-random"></i> ';
                    $loggedinas .= html_writer::tag('a', $switchRoleReturnIcon . get_string('switchrolereturn'), array('href' => $url, 'class' => $buttonsclasses));
                } else {
                    $loggedinas = $realuserinfo . $username;
                    
                    if ($bDisplayLogout) {
                        $loggedinas .= $this->get_logout_navigationbar_button($buttonsclasses);
                    }
                }
            }else{
                if($bDisplayLogout){
                    $loggedinas = $this->get_logout_navigationbar_button($buttonsclasses);
                }else{
                    $loggedinas = '';
                }
            }
        } else {
            $loggedinas = $this->get_login_navigationbar_button($buttonsclasses);
        }

        return $loggedinas;
    }
    
    protected function get_logout_navigationbar_button($buttonsclasses){
        global $CFG;
        $logoutIcon = ' <i class="uk-icon uk-icon-mail-forward"></i> ';
        $text = get_string('logout', 'theme_uikit');
        
        return "<a class=\"$buttonsclasses\" title=\"$text\" href=\"$CFG->wwwroot/login/logout.php?sesskey=" . sesskey() . "\">".$logoutIcon." " . $this->processMenuItemText($text) . '</a>';
    }
    
    protected function get_login_navigationbar_button($buttonsclasses){
        $is_loginpage = ((string)$this->page->url === get_login_url());
        if($is_loginpage){
            return '';
        }
        
        $loginurl = get_login_url();
        $loginIcon = ' <i class="uk-icon uk-icon-sign-in"></i> ';
        $text = get_string('login');
        
        return "<a class=\"$buttonsclasses\" title=\"$text\" href=\"$loginurl\">" . $loginIcon . $text . '</a>';
    }

    protected function get_navigationbar_buttons_classes() {
        $buttonsclasses = join(' ', array(
            'uk-button',
            isset($this->page->theme->settings->navigationbuttonssize) ? $this->page->theme->settings->navigationbuttonssize : 'uk-button-small',
            isset($this->page->theme->settings->navigationbuttonsclass) ? $this->page->theme->settings->navigationbuttonsclass : ''
        ));
        
        return $buttonsclasses;
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
            return '<span class="uk-visible-large">'.$text.'</span>';
        }else{
            return $text;
        }
    }
}
