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
 * Plugin upgrade steps are defined here.
 *
 * @package     mod_notetaker
 * @category    upgrade
 * @copyright   2020 Jo Beaver <myemail@example.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute mod_notetaker upgrade from the given old version.
 *
 * @param int $oldversion
 * @return bool
 */
function xmldb_notetaker_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2020060611) {

        // Define table notetaker to be created.
        $table = new xmldb_table('notetaker');

        // Adding fields to table notetaker.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('course', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null);
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('intro', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('introformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('publicposts', XMLDB_TYPE_BINARY, null, null, XMLDB_NOTNULL, null, null);

        // Adding keys to table notetaker.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('fk_course', XMLDB_KEY_FOREIGN, ['course'], 'course', ['id']);

        // Conditionally launch create table for notetaker.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Notetaker savepoint reached.
        upgrade_mod_savepoint(true, 2020060611, 'notetaker');
    }

    if ($oldversion < 2020061000) {

        // Define table notetaker_notes to be created.
        $table = new xmldb_table('notetaker_notes');

        // Adding fields to table notetaker_notes.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('notetakerid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('notecontent', XMLDB_TYPE_TEXT, null, null, null, null, null);
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('publicpost', XMLDB_TYPE_BINARY, null, null, XMLDB_NOTNULL, null, null);

        // Adding keys to table notetaker_notes.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('notetakerid', XMLDB_KEY_FOREIGN, ['notetakerid'], 'notetaker', ['id']);

        // Conditionally launch create table for notetaker_notes.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Notetaker savepoint reached.
        upgrade_mod_savepoint(true, 2020061000, 'notetaker');
    }

    if ($oldversion < 2020061300) {

        // Define table notetaker_notes to be created.
        $table = new xmldb_table('notetaker_notes');

        // Adding fields to table notetaker_notes.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('modid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('notecontent', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('noteformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('publicpost', XMLDB_TYPE_BINARY, null, null, XMLDB_NOTNULL, null, null);

        // Adding keys to table notetaker_notes.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('modid', XMLDB_KEY_FOREIGN, ['modid'], 'notetaker', ['id']);

        // Conditionally launch create table for notetaker_notes.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Notetaker savepoint reached.
        upgrade_mod_savepoint(true, 2020061300, 'notetaker');
    }

    if ($oldversion < 2020061303) {

        // Define table notetaker_notes to be created.
        $table = new xmldb_table('notetaker_notes');

        // Adding fields to table notetaker_notes.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('modid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('notetext', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('noteformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('publicpost', XMLDB_TYPE_BINARY, null, null, XMLDB_NOTNULL, null, null);

        // Adding keys to table notetaker_notes.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('modid', XMLDB_KEY_FOREIGN, ['modid'], 'notetaker', ['id']);

        // Conditionally launch create table for notetaker_notes.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Notetaker savepoint reached.
        upgrade_mod_savepoint(true, 2020061303, 'notetaker');
    }

    if ($oldversion < 2020061704) {

        // Define table notetaker_notes to be created.
        $table = new xmldb_table('notetaker_notes');

        // Adding fields to table notetaker_notes.
        $table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
        $table->add_field('modid', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null);
        $table->add_field('notetext', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
        $table->add_field('noteformat', XMLDB_TYPE_INTEGER, '4', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timecreated', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, '0');
        $table->add_field('timemodified', XMLDB_TYPE_INTEGER, '10', null, null, null, null);
        $table->add_field('publicpost', XMLDB_TYPE_BINARY, null, null, XMLDB_NOTNULL, null, null);

        // Adding keys to table notetaker_notes.
        $table->add_key('primary', XMLDB_KEY_PRIMARY, ['id']);
        $table->add_key('modid', XMLDB_KEY_FOREIGN, ['modid'], 'notetaker', ['id']);

        // Conditionally launch create table for notetaker_notes.
        if (!$dbman->table_exists($table)) {
            $dbman->create_table($table);
        }

        // Notetaker savepoint reached.
        upgrade_mod_savepoint(true, 2020061704, 'notetaker');
    }

    return true;
}
