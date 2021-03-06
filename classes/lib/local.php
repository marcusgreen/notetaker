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
 * Local lib - main library of static functions.
 *
 * @package     mod_notetaker
 * @copyright   2020 Jo Beaver <myemail@example.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace mod_notetaker\lib;

defined('MOODLE_INTERNAL') || die;

class local {     
    
    /**
     * Gets the notes associated with a module instance from the database. 
     * Converts time to human readable format.
     * @param $modid ID of the module instance. 
     */
    public static function get_notes($modid) {
        global $DB;
        
        $results = $DB->get_records('notetaker_notes', ['modid' => $modid]);        

        foreach ($results as $result) {  
            if ($result->timemodified != NULL) {                
                $result->timemodified = userdate($result->timemodified, '%d %B %Y'); 
            } else {
                $result->timecreated = userdate($result->timecreated, '%d %B %Y');                
            }          
                            
        }
        return $results;
    }

    /**
     * Deletes a note from the database.
     * @param $modid ID of the module instance.
     * @param $noteid ID of the note.
     */
    public static function delete($modid, $noteid) {
        global $DB;
        $DB->delete_records('notetaker_notes', ['modid' => $modid, 'id' => $noteid]);
    }
}
