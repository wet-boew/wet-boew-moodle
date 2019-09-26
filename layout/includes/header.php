<?php
/**
 * This file is part of the wet-boew-moodle project.
 *
 * Copyright © 2016 onwards by TNG Consulting Inc.
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
**/

defined('MOODLE_INTERNAL') || die();

require_once $CFG->dirroot . '/theme/wetboew/locallib.php';

if (empty($extracss)) $extracss = '';
if (empty($extracontent)) $extracontent = '';

switch ($columns) {
    case 1:
        $regionmain = 'span12';
        break;
    case 2: // Set default (LTR) layout mark-up for a two column page (side-pre-only).
        $regionmain = 'span9 pull-right';
        //$sidepre = 'span3 desktop-first-column';
        $sidepre = 'span3';
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $regionmain = 'span9 desktop-first-column';
            $sidepre = 'span3 pull-right';
        } else {
            $extracss = '.dir-ltr .usermenu {float: none;display: inline-block;}';
        }
        break;
    case 3: // Set default (LTR) layout mark-up for a three column page.
        $regionmainbox = 'span9 desktop-first-column';
        $regionmain = 'span8 pull-right';
        $sidepre = 'span4 desktop-first-column';
        $sidepost = 'span3 pull-right';
        // Reset layout mark-up for RTL languages.
        if (right_to_left()) {
            $regionmainbox = 'span9 pull-right';
            $regionmain = 'span8';
            $sidepre = 'span4 pull-right';
            $sidepost = 'span3 desktop-first-column';
        } else {
            $extracss = '.dir-ltr .usermenu {float: none;display: inline-block;}';
        }
        break;
}

$plugin = new StdClass();
require $CFG->dirroot . '/theme/wetboew/version.php';
$_PAGE['modified'] = date('Y-m-d', getlastmod());
$_PAGE['version'] = date('Y-m-d', strtotime(substr($plugin->version, 0, 8)));
if(substr($plugin->version, -2) != '00') { // development versions don't end in 00.
    $_PAGE['version'] .= ' (dev ' . substr($plugin->version, -2) . ')';
}

$_PAGE['isapp'] = '1';
$_PAGE['issplash'] = (!empty($_PAGE['issplash']) ? $_PAGE['issplash'] : '0');
$_PAGE['isserv']   = (!empty($_PAGE['isserv'])   ? $_PAGE['isserv']   : '0');

$_PAGE['lang1'] = substr(current_language(),0,2);

// $_SITE['wb_theme'] = 'theme-gcwu-fegc';

require_once $CFG->dirroot . '/theme/wetboew/wetconfig.php';

if ($_PAGE['issplash']) {
    $_PAGE['short_title_' . $_PAGE['lang1']] = get_string('welcome', 'theme_wetboew');
} elseif ($_PAGE['isserv']) {
    $_PAGE['short_title_' . $_PAGE['lang1']] = get_string('error404', 'theme_wetboew');
} else {
    $defaulttitle = $PAGE->navbar->get_items();
    if (empty($defaulttitle)) {
        $defaulttitle = '';
    } else {
        $defaulttitle = end($defaulttitle)->text;
        if (!empty($PAGE->theme->settings->custombreadcrumb) && $defaulttitle == get_string('home')) {
            $defaulttitle = format_string($SITE->fullname, false) . ' - ' . $defaulttitle;
        }
    }
    $customtitles = array(
            '/backup/import.php' => get_string('importdata'),
            '/calendar/view.php' => get_string('calendar', 'calendar'),
            '/login/index.php' => get_string('logintextbutton', 'theme_wetboew'),
            '/login/logout.php' => get_string('logouttextbutton', 'theme_wetboew'),
            '/login/signup.php' => $_SITE['wb_register_text_'.$_LANG_],
            '/mod/' => get_string('activity').($_PAGE['lang1'] == 'fr' ? '&nbsp;' : '').': '.$defaulttitle,
            '/my/index.php' => get_string('mycourses'),
            '/user/edit.php' => get_string('editmyprofile'),
    );
    foreach($customtitles as $url => $title) {
        if (stripos($_SERVER['SCRIPT_NAME'], $url)!==false) {
            $defaulttitle = $title;
            break;
        }
    }
    $_PAGE['short_title_' . $_PAGE['lang1']] = $defaulttitle;
    //    $_PAGE['short_title_' . $_PAGE['lang1']] = $OUTPUT->page_title();

}
$_PAGE['title_' . $_PAGE['lang1']] = $_PAGE['short_title_' . $_PAGE['lang1']] . ' - ' . format_string($SITE->fullname, false);

// Determine what elements should be displayed in the page header.

// Language menu.
$langs = get_string_manager()->get_list_of_translations();
if (count($langs) < 2 || empty($CFG->langmenu) || ($this->page->course != SITEID and !empty($this->page->course->lang))) {
    $_PAGE['nolang'] = 1;
} else {
    $_PAGE['nolang'] = 0;
    $cnt = 1;
    $langs = array($_PAGE['lang1'] => $langs[$_PAGE['lang1']]) + $langs;
    foreach($langs as $key => $value) {
        $value = preg_replace('/\xe2\x80\x8e/', '', $value);
        $_PAGE['lang' . $cnt++] = $key;
        $_SITE['wb_meta_' . $key] = $key;
        $_SITE['wb_lang_text_' . $key] = rtrim($value, ' (' . $key . ')');
        $tmp = '';
        if (empty($PAGE->url->get_query_string())) {
            $tmp = '?'.urldecode($_SERVER['QUERY_STRING']);
        }
        $_PAGE['wb_lang_href_' . $key] = new moodle_url($PAGE->url . $tmp, array('lang' => $key));
    }
}

if ($_SITE['wb_theme'] == 'theme-gcweb') {
    // Search field.
    $_PAGE['nosearch'] = 1;
    // Moodle custom menu.
    $_PAGE['nositemenu'] =  1;
} else {
    // Search field.
    $_PAGE['nosearch'] = !empty($PAGE->layout_options['nosearch']);
    // Moodle custom menu.
    $_PAGE['nositemenu'] =  !empty($PAGE->layout_options['nocustommenu']);
}

// Breadcrumbs.
$_PAGE['nobcrumb'] = !empty($PAGE->layout_options['nonavbar']) && $PAGE->has_navbar();
// Login/Logout/Register/Settings buttons.
if (empty($PAGE->layout_options['nologininfo'])) {
    $_PAGE['signin'] = !isloggedin() || isguestuser();           // Logged out or guest user.
    $_PAGE['register'] = $_PAGE['signin'] && $CFG->registerauth; // Is Email based self-registration enabled?
    $_PAGE['signout'] = isloggedin() && !isguestuser();          // Logged in but not guest user.
    $_PAGE['settings'] = $_PAGE['signout'];                      // Logged in but not guest user.
} else {
    $_PAGE['signin'] = $_PAGE['signout'] = 0;
}

$_SITE['wb_site_title_' . $_LANG_]  = format_string($SITE->fullname, false);
$_SITE['wb_doc_version_' . $_LANG_] = $_PAGE['version'];

$_SITE['wb_search_file'] = $CFG->dirroot . '/theme/wetboew/framework/search.php';
$_SITE['wb_bcrumb_file'] = $CFG->dirroot . '/theme/wetboew/framework/breadcrumbs.php';
$_SITE['wb_sitenav_file_' . $_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/menu.php';
$_SITE['wb_buttonbar_file_'.$_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/button-bar.php';
$_SITE['wb_ft1_menu_file_' . $_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/trail1.php';
$_SITE['wb_ft2_menu_file_' . $_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/trail2.php';
$_SITE['wb_ft3_menu_file_' . $_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/trail3.php';
$_SITE['wb_ft4_menu_file_' . $_LANG_] = $CFG->dirroot . '/theme/wetboew/framework/trail4.php';

$_SITE['wb_site_href_' . $_LANG_] = $CFG->wwwroot;
$_SITE['wb_signin_href_' . $_LANG_] = get_login_url();
$_SITE['wb_register_href_' . $_LANG_] = $CFG->wwwroot . '/login/signup.php';
$_SITE['wb_settings_href_' . $_LANG_] = $CFG->wwwroot . '/user/profile.php';
$_SITE['wb_signout_href_' . $_LANG_] = $CFG->wwwroot . '/login/logout.php';
$_SITE['wb_username_text'] = '';//(!isguestuser() ? fullname($USER) : '');

$nothing = $OUTPUT->doctype();

// ------------------------------------------------------------------
// Display Page
// ------------------------------------------------------------------

// Display page header.
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'] . '/inc/head-doc.php';
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'] . '/inc/head-css.php';

echo $OUTPUT->standard_head_html(); // Insert Moodle specific meta tags, CSS and JS.

echo '<link href="//netdna.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet">';

// Add a small reminder visual indicator if user is logged in as an administrator.
if (is_siteadmin()) {
    // Make red the backgound of topmost navigation bar.
    //echo '<style>#wb-bar {background-color:#F00000;}</style>';
    // Make red the border below Moodle custom menu.
    $extracss .= '#wb-sm .nvbar {border-bottom-color:#F00000;}';
}

if(file_exists(realpath(dirname(__FILE__) . '../') . '/style/' . $_SITE['wb_theme'] . '.css')) {
    echo '<link href="' . realpath(dirname(__FILE__) . '../') . '/style/' . $_SITE['wb_theme'] . '.css" rel="stylesheet" media="screen" type="text/css" />' . PHP_EOL;
}

if (!empty($extracss)) echo '<style>'.PHP_EOL.$extracss.PHP_EOL.'</style>'.PHP_EOL;

// Add id and classes to <body> tag.
ob_start();
require $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . '/inc/head-nav.php';
$tmp = ob_get_contents();
ob_end_clean();
//echo str_replace('<body ', '<body id="' . $PAGE->bodyid . '" class="' . $PAGE->bodyclasses . ' ' . $_SITE['wb_theme'] . ' jsenabled" ', $tmp);
if ($columns == 2) {
   $tmp = str_replace('<body ', '<body ' . $OUTPUT->body_attributes('two-column') . ' ', $tmp);
} else {
   $tmp = str_replace('<body ', '<body ' . $OUTPUT->body_attributes() . ' ', $tmp);
}
echo $tmp;
$tmp = '';