<?php
/**
 * This file is part of the wet-boew-moodle project.
 *
 * Copyright © 2016 onwards by TNG Consulting Inc. Inc.
 *
 * The WETBOEW theme for Moodle is provided freely as open source software, can be redistributed
 * and/or modified it under the terms of the GNU General Public License version 3.0 or later.
 *
 * This software is distributed in the hope that it will be useful. However, there is no warranty,
 * implied or otherwise, of merchantability or fitness for any purpose.
 *
 * If for any reason a copy of the GNU General Public License was not included with this project,
 * you can view it online by going to: https://www.gnu.org/licenses/gpl-3.0.en.html</p>
**/
/**
 * @package    theme_wetboew
 * @copyright  2016 TNG Consulting Inc. unless otherwise noted.
 * @author     Michael Milette <www.tngconsulting.ca>
 * @license    WET-BOEW-Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    WET-BOEW: https://github.com/wet-boew/wet-boew/blob/master/License-eng.txt MIT License.
 * @license    Government of Canada graphics: Government of Canada http://www.tbs-sct.gc.ca/fip-pcim/index-eng.asp .
 * @license    3rd party software included with WET-BOEW: Held by the respective copyright holders as noted in those files.
**/

defined('MOODLE_INTERNAL') || die();

// This settings file must be edited and copied either one level up from wet-boew-php
// or in thewebroot of your webserver. See DEVNOTES.txt for more information.

// --------------------------------------------------------------------------
// Choose a theme. Uncomment the one you want.
// --------------------------------------------------------------------------

// $_SITE['wb_theme'] = "theme-base";        // WET Base theme
// $_SITE['wb_theme'] = 'theme-gc-intranet'; // Government of Canada Web Usability Intranet theme.
// $_SITE['wb_theme'] = 'theme-gcweb';       // Canada.ca theme.
// $_SITE['wb_theme'] = 'theme-gcwu-fegc';   // Government of Canada Web Usability theme.
// $_SITE['wb_theme'] = 'theme-ogpl';        // OGPL theme.
// $_SITE['wb_theme'] = 'theme-wet-boew';    // WET-BOEW theme.
if (!isset($_SITE['wb_theme'])) $_SITE['wb_theme'] = 'theme-base'; // Default is Base WET theme

if (isset($_GET['wettheme'])) {
    $_SITE['wb_theme'] = preg_replace('/[^-a-z0-9]/', '', $_GET['wettheme']);
    setcookie('wettheme', $_SITE['wb_theme'], 0, '/');
} else if (isset($_COOKIE['wettheme'])) {
    $_SITE['wb_theme'] = $_COOKIE['wettheme'];
}

// All WET-BOEW files will go under this directory.
$_SITE['wb_www_root'] = parse_url($CFG->wwwroot, PHP_URL_PATH).'/theme/wetboew/framework'; // Make blank if in the root of your site (no trailing slash!).
$_SITE['wb_www_root'] = '/themes31/theme/wetboew/framework'; // Make blank if in the root of your site (no trailing slash!).
// Location of the WET-BOEW-PHP files.
$_SITE['wb_php_root'] = $_SITE['wb_www_root'] . '/wet-boew-php';
// Location of the WET-BOEW-THEMES core files.
$_SITE['wb_core_root'] =  $_SITE['wb_www_root'] . '/themes-dist/' . $_SITE['wb_theme'];
// Location of the root of your website (not necessarily the webroot).
$_SITE['wb_website_root'] = $CFG->wwwroot;

// Include the standard distribution config with the default settings.
include $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_root'] . '/dist-php/config/config.php';

// --------------------------------------------------------------------------
// Override wet-boew-php/dist-php/config/config.php settings for the specific site.
// --------------------------------------------------------------------------

// Modify to point to your sites search implementation.
$_SITE['wb_search_file'] = $_SITE['wb_php_dist_folder'] ."/search/search.php";

// Link to Home page.
$_SITE['wb_site_href_en'] = $_SITE['wb_website_root'] . "/index-en.php";
$_SITE['wb_site_href_fr'] = $_SITE['wb_website_root'] . "/index-fr.php";

// Terms and Conditions Link.
$_SITE['wb_terms_href_en'] = $_SITE['wb_website_root'] . "/license-en.php";
$_SITE['wb_terms_href_fr'] = $_SITE['wb_website_root'] . "/licence-fr.php";

// Location of the language selection link. Point to whatever script suits your site.
$_SITE['wb_cmblang_href_en'] = $_SITE['wb_php_dist_folder'] . "/langselect/lang.php";
$_SITE['wb_cmblang_href_fr'] = $_SITE['wb_php_dist_folder'] . "/langselect/lang.php";