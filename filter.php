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
 * Compatibility shim for filter_courseprofesores.
 *
 * This file exists only for backward compatibility with Moodle versions
 * prior to 4.5 that still load filter classes from filter.php.
 * The actual implementation has been moved to classes/text_filter.php
 * as required by MDL-82427 for Moodle 4.5+ and 5.0+.
 *
 * @package    filter_courseprofesores
 * @copyright  2026 Daniel Ferrada
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @deprecated since Moodle 4.5 - Use \filter_courseprofesores\text_filter instead.
 */

defined('MOODLE_INTERNAL') || die();

// This alias ensures backward compatibility with legacy loaders or third-party plugins
// that still expect the global class name 'filter_courseprofesores'.
// Moodle 4.5+ and 5.0+ natively use the namespaced \filter_courseprofesores\text_filter.
class_alias(\filter_courseprofesores\text_filter::class, 'filter_courseprofesores');

