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
 * Settings for the courseprofesores filter.
 *
 * @package    filter_courseprofesores
 * @copyright  2026 Daniel Ferrada
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {

    $settings->add(new admin_setting_heading(
        'filter_courseprofesores/generalsettings',
        get_string('settingsheading', 'filter_courseprofesores'),
        ''
    ));

    $settings->add(new admin_setting_configcheckbox(
        'filter_courseprofesores/showavatars',
        get_string('showavatars', 'filter_courseprofesores'),
        get_string('showavatars_desc', 'filter_courseprofesores'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'filter_courseprofesores/showdepartment',
        get_string('showdepartment', 'filter_courseprofesores'),
        get_string('showdepartment_desc', 'filter_courseprofesores'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'filter_courseprofesores/showinstitution',
        get_string('showinstitution', 'filter_courseprofesores'),
        get_string('showinstitution_desc', 'filter_courseprofesores'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'filter_courseprofesores/showmessagelink',
        get_string('showmessagelink', 'filter_courseprofesores'),
        get_string('showmessagelink_desc', 'filter_courseprofesores'),
        1
    ));

    $settings->add(new admin_setting_configcheckbox(
        'filter_courseprofesores/showparticipantslink',
        get_string('showparticipantslink', 'filter_courseprofesores'),
        get_string('showparticipantslink_desc', 'filter_courseprofesores'),
        1
    ));

    $roleoptions = [
        'editingteacher' => get_string('editingteacher', 'moodle'),
        'teacher' => get_string('teacher', 'moodle'),
        'manager' => get_string('manager', 'moodle'),
    ];

    $settings->add(new admin_setting_configmulticheckbox(
        'filter_courseprofesores/rolesincluded',
        get_string('rolesincluded', 'filter_courseprofesores'),
        get_string('rolesincluded_desc', 'filter_courseprofesores'),
        ['editingteacher' => 1, 'teacher' => 1, 'manager' => 1],
        $roleoptions
    ));

    $styleoptions = [
        'cards' => get_string('displaystyle_cards', 'filter_courseprofesores'),
        'list' => get_string('displaystyle_list', 'filter_courseprofesores'),
        'compact' => get_string('displaystyle_compact', 'filter_courseprofesores'),
    ];

    $settings->add(new admin_setting_configselect(
        'filter_courseprofesores/displaystyle',
        get_string('displaystyle', 'filter_courseprofesores'),
        '',
        'cards',
        $styleoptions
    ));
}
