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
 * @license    WET-BOEW-Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    WET-BOEW: https://github.com/wet-boew/wet-boew/blob/master/License-eng.txt MIT License.
 * @license    Government of Canada graphics: Government of Canada http://www.tbs-sct.gc.ca/fip-pcim/index-eng.asp .
 * @license    3rd party software included with WET-BOEW: Held by the respective copyright holders as noted in those files.
**/

/***********************************************************
* 404 - Page Not Found.
************************************************************/

// Globals.
global $PAGE, $CFG;

// Include config.php
require_once('../../../config.php');

// Use server type WET page.
$_PAGE['isserv'] = 1;
$_PAGE['iserror'] = 1;

// Setup the moodle page.
$pageurl = $CFG->wwwroot . '/theme/wetboew/layout/' . __FILE__ . '.php';
$PAGE->set_url($pageurl);
$PAGE->set_context(context_system::instance());

$PAGE->set_pagelayout('base');
$lang = substr(current_language(), 0, 2);
$langs = get_string_manager()->get_list_of_translations();
$cnt = 1;
foreach ($langs as $key => $value) {
    if ($key == $lang) { // Move langauage to beginning of array.
        $langs = array($key => $value) + $langs;
    }
}
// Convert list of languages to WET requirement.
foreach ($langs as $key => $value) {
    $_PAGE['lang' . $cnt] = $key;
}

echo format_text($OUTPUT->header(), FORMAT_HTML, array('trusted' => true, 'noclean' => true, 'para' => false));
?>
<!-- Main content start -->
<?php
    // These are the required variables for this page.
    // English text.
    $_PAGE['title_en'] = "We couldn&#x27;t find that Web page (Error 404) - Government of Canada Web Usability theme";
    $_PAGE['short_title_en'] = "Error 404";
    $_PAGE['err_msg_en'] = "We're sorry you ended up here. Sometimes a page gets moved or deleted, but hopefully we can help you find what you're looking for.";
    // French text.
    $_PAGE['title_fr'] = "Nous ne pouvons trouver cette page Web (Erreur 404)";
    $_PAGE['short_title_fr'] = "Erreur 404";
    $_PAGE['err_msg_fr'] = "Nous sommes désolés que vous ayez abouti ici. Il arrive parfois qu'une page ait été déplacée ou supprimée. Heureusement, nous pouvons vous aider à trouver ce que vous cherchez.";

    if (count($lang) == 1) {
        // Always set the page language options first.
        // Set 'lang1' to 'en' for English pages, 'fr' for French pages.
        require $CFG->dirroot . '/theme/wetboew/framework/wetconfig.php';

        include_once $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . "/inc/head-doc.php";
        include_once $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . "/inc/head-css.php";
        include_once $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . "/inc/head-nav.php";
        include $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . "/inc/foot-nav.php";
        include $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . "/inc/foot-end.php";        
    }
?>
<!-- MainContentEnd -->
<?php 
echo $OUTPUT->footer();