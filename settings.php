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
 * @copyright  2015-2016 Jeremy Hopkins (Coventry University)
 * @copyright  2015-2016 Fernando Acedo (3-bits.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

defined('MOODLE_INTERNAL') || die;

// Fix date format - enable leading zeros for day.
$CFG->nofixday  = true;

$settings = null;
//require_once(__DIR__.'/libs/admin_confightmleditor.php');
require_once(__DIR__.'/locallib.php');

if (is_siteadmin()) {
    // WET-BOEW theme settings page.
    global $PAGE;
    $ADMIN->add('themes', new admin_category('theme_wetboew', 'WETBOEW'));

    // include(dirname(__FILE__) . '/settings/array_definitions.php');
    // include(dirname(__FILE__) . '/settings/colors.php');
    // include(dirname(__FILE__) . '/settings/fonts.php');
    // include(dirname(__FILE__) . '/settings/buttons.php');
    // include(dirname(__FILE__) . '/settings/header.php');
    // include(dirname(__FILE__) . '/settings/header_menus.php');
    // include(dirname(__FILE__) . '/settings/header_user.php');
    // include(dirname(__FILE__) . '/settings/header_social.php');
    // include(dirname(__FILE__) . '/settings/header_navbar.php');
    // include(dirname(__FILE__) . '/settings/header_navbar_menu.php');
    // include(dirname(__FILE__) . '/settings/block_settings.php');
    // include(dirname(__FILE__) . '/settings/block_regions.php');
    // include(dirname(__FILE__) . '/settings/course.php');
    // include(dirname(__FILE__) . '/settings/marketing_blocks.php');
    // include(dirname(__FILE__) . '/settings/frontpage_courses.php');
    // include(dirname(__FILE__) . '/settings/frontpage_ticker.php');
    // include(dirname(__FILE__) . '/settings/frontpage_slider.php');
    // include(dirname(__FILE__) . '/settings/alert_box.php');
    // include(dirname(__FILE__) . '/settings/layout.php');
    // include(dirname(__FILE__) . '/settings/footer.php');
    // include(dirname(__FILE__) . '/settings/mobile_settings.php');
    // include(dirname(__FILE__) . '/settings/social_wall.php');
    // include(dirname(__FILE__) . '/settings/analytics.php');
    // include(dirname(__FILE__) . '/settings/custom_css.php');
}
