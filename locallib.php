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
    
    public function isminrole($minrole) {
        global $PAGE;
        switch ($minrole) {
            case 0: // Anyone who is logged in but not as guest.
                $ret = isloggedin() && !isguestuser();
                break;
            case 1: // Minimum is a non-editing teacher.
                $ret = has_capability('moodle/course:viewhiddencourses', $PAGE->context);
                break;
            case 2: // Minimum is a course creator.
                $ret = has_capability('moodle/course:create', $PAGE->context);
                break;
            case 3: // Minimum manager.
                $ret = has_capability('moodle/backup:userinfo', $PAGE->context);        
                break;
            case 4: // Minimum administrator.
                $ret = issiteadmin();                                                   
                break;
        }
        return $ret;
    }        
}
/* ** TODO: ***
function theme_wetboew_process_css($css, $theme) {

    // Set the background image for the logo.
    $logo = $theme->setting_file_url('logo', 'logo');
    $css = theme_wetboew_set_logo($css, $logo);

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_wetboew_set_customcss($css, $customcss);

    return $css;
}


function theme_wetboew_set_logo($css, $logo) {
    $logotag = '[[setting:logo]]';
    $logoheight = '[[logoheight]]';
    $logowidth = '[[logowidth]]';
    $logodisplay = '[[logodisplay]]';
    $width = '0';
    $height = '0';
    $display = 'none';
    $replacement = $logo;
    if (is_null($replacement)) {
        $replacement = '';
    } else {
        $dimensions = getimagesize('http:'.$logo);
        $width = $dimensions[0] . 'px';
        $height = $dimensions[1] . 'px';
        $display = 'block';
    }
    $css = str_replace($logotag, $replacement, $css);
    $css = str_replace($logoheight, $height, $css);
    $css = str_replace($logowidth, $width, $css);
    $css = str_replace($logodisplay, $display, $css);

    return $css;
}

/**
 * Serves any files associated with the theme settings.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
/*
function theme_wetboew_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = array()) {
    if ($context->contextlevel == CONTEXT_SYSTEM && ($filearea === 'logo')) {
        $theme = theme_config::load('wetboew');
        return $theme->setting_file_serve($filearea, $args, $forcedownload, $options);
    } else {
        send_file_not_found();
    }
}

/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
/*
function theme_wetboew_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}
*/
