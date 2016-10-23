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
 * Version details
 *
 * @package    theme_wetboew
 * @copyright  2016 TNG Consulting Inc. (www.tngconsulting.ca)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

require_once __DIR__.'/../../course/renderer.php';
 
class wetboew {
    // Property declaration.

    private $data = array();

    function __construct() {
        $this->themedir = basename(__DIR__);
        $this->themename = 'theme_'.basename(__DIR__);
    }

    // Method declarations.

    public function __get($property) {
        if (isset($this->data[$property])) {
        	return $this->data[$property];
        }
        return null;
    }

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }
}