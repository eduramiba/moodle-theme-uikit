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
        $additionalclasses[]= 'layout1';
        return parent::body_attributes($additionalclasses);
    }
    
    protected function render_custom_menu_base(custom_menu $menu, $isOffCanvas = false){
        if($isOffCanvas){
            $content = '<ul class="uk-nav uk-nav-offcanvas uk-nav-parent-icon" data-uk-nav="{multiple:true}">';
        }else{
            $content = '<ul class="uk-navbar-nav">';
        }
        foreach ($menu->get_children() as $item) {
            $content .= $this->render_custom_menu_item($item, 0, $isOffCanvas);
        }

        return $content . '</ul>';
    }
    
    /*
     * This code renders the custom menu items for the
     * uikit dropdown menu.
     */
    protected function render_custom_menu_item(custom_menu_item $menunode, $level = 0, $isOffCanvas = false) {
        if ($menunode->get_url() !== null) {
            $url = $menunode->get_url();
        } else {
            $url = '#';
        }
        
        // If the child has menus render it as a sub menu.
        if ($menunode->has_children()) {
            if($isOffCanvas){
                $content = '<li class="uk-parent">';
                $content .= html_writer::start_tag('a', array('href' => '#', 'title' => $menunode->get_title(), 'class' => 'uk-text-bold'));
                $content .= $menunode->get_text();
                $content .= html_writer::end_tag('a');
                $content .= '<ul class="uk-nav-sub">';
                
                foreach ($menunode->get_children() as $menunode) {
                    $content .= $this->render_custom_menu_item($menunode, $level + 1, $isOffCanvas);
                }
                
                $content .= '</ul>';
                $content .= '</li>';
            }else{
                //Dropdown (first parent)
                if($level == 0){
                    $content = '<li class="uk-parent" data-uk-dropdown>';
                    $content .= html_writer::start_tag('a', array('href' => $url, 'title' => $menunode->get_title()));
                    $content .= $menunode->get_text();
                    $content .= ' <i class="uk-icon-caret-down"></i>';
                    $content .= html_writer::end_tag('a');
                    $content .= '<div class="uk-dropdown uk-dropdown-navbar">';
                    
                    $content .= '<ul class="uk-nav uk-nav-navbar uk-nav-parent uk-nav-parent-icon" data-uk-nav="{multiple:true}">';
                    foreach ($menunode->get_children() as $menunode) {
                        $content .= $this->render_custom_menu_item($menunode, $level + 1, $isOffCanvas);
                    }
                    $content .= '</ul>';
                    
                    $content .= '</div>';
                    $content .= '</li>';
                }else{
                    //Sublist (not first parent)
                    $content = html_writer::start_tag('li', array('class' => 'uk-parent'));
                    
                    $category_url = $url;
                    if($level < 2){
                        $category_url = '#';
                    }
                    
                    $sublist_header_attributes = array('href' => $category_url, 'title' => $menunode->get_title(), 'class' => 'uk-text-bold');
                    
                    $content .= html_writer::start_tag('a', $sublist_header_attributes);
                    $content .= html_writer::start_tag('span', array('class' => 'uikit-dropdown-menu-sublist'));//This is so the text never makes the submenu caret drop to the next line
                    $content .= $menunode->get_text();
                    $content .= html_writer::end_tag('span');
                    $content .= html_writer::end_tag('a');
                    
                    if($level == 1){
                        $sublist_attributes = array('class' => 'uk-nav-sub');
                    }else{
                        $sublist_attributes = null;
                    }
                    $content .= html_writer::start_tag('ul', $sublist_attributes);
                    
                    foreach ($menunode->get_children() as $menunode) {
                        $content .= $this->render_custom_menu_item($menunode, $level + 1, $isOffCanvas);
                    }
                    $content .= html_writer::end_tag('ul');
                    
                    $content .= html_writer::end_tag('li');
                }
            }
        } else {
            // The node doesn't have children so produce a final menuitem.
            $content = '<li>';
            $content .= html_writer::link($url, $menunode->get_text(), array('title' => $menunode->get_title()));
            $content .= '</li>';
        }
        
        return $content;
    }
}
