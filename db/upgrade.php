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
 * Upgrade script for filter_courseprofesores.
 *
 * Ensures the student role archetype is granted the viewprofesores capability,
 * which was missing after a previous upgrade that removed it.
 *
 * @package    filter_courseprofesores
 * @copyright  2026 Daniel Ferrada
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Execute plugin upgrade steps.
 *
 * @param int $oldversion The old plugin version.
 * @return bool True on success.
 */
function xmldb_filter_courseprofesores_upgrade($oldversion): bool {
    global $DB;

    if ($oldversion < 2026060308) {
        // Assign the viewprofesores capability to all roles with the 'student' archetype.
        // This fixes a gap where the capability was removed from access.php in a previous
        // version and later restored, but existing role assignments were not updated.
        $studentroles = $DB->get_records('role', ['archetype' => 'student']);
        $systemcontext = \context_system::instance();

        foreach ($studentroles as $role) {
            assign_capability(
                'filter/courseprofesores:viewprofesores',
                CAP_ALLOW,
                $role->id,
                $systemcontext->id,
                true
            );
        }

        // Also mark for cache purge so capability changes take effect immediately.
        // Moodles upgrade process handles this via purge_caches() but we ensure
        // the capability table is updated.
        upgrade_plugin_savepoint(true, 2026060308, 'filter', 'courseprofesores');
    }

    return true;
}