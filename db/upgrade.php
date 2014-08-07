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
 * Upgrade/install script for UIKit Theme
 *
 * @package   theme_uikit
 * @copyright 2014 Eduardo Ramos
 * @authors   Eduardo Ramos
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

function xmldb_theme_uikit_upgrade($oldversion) {
    global $CFG;
    global $DB;

    $result = TRUE;
    
 
    
    if ($oldversion < 2014080701) {
        $dbman = $DB->get_manager(); // loads ddl manager and xmldb classes

        // Define table theme_uikit_less_settings to be created.
        $table = new xmldb_table('theme_uikit_less_settings');

        // Adding fields to table theme_uikit_less_settings.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('setting', XMLDB_TYPE_CHAR, '200', null, XMLDB_NOTNULL, null, null);
        $table->add_field('value', XMLDB_TYPE_TEXT, null, null, null, null, null);

        // Adding keys to table theme_uikit_less_settings.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));

        // Conditionally launch create table for theme_uikit_less_settings.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Uikit savepoint reached.
        upgrade_plugin_savepoint(true, 2014080701, 'theme', 'uikit');
    }

    return $result;
}
