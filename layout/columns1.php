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
 * A one column layout for the Bootstrapbase theme.
 *
 * @package   theme_wetboew
 * @copyright 2016 TNG Consulting Inc, www.tngconsulting.ca
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 
 //echo '<pre>';var_dump($CFG);die;
 //echo $CFG->themedir.'/version.php';
$plugin = new StdClass();
require $CFG->dirroot . '/theme/' . $CFG->theme . '/version.php';
$_PAGE['modified'] = date('Y-m-d', getlastmod());
$_PAGE['version'] = date('Y-m-d', strtotime(substr($plugin->version, 0, 8)));
if(substr($plugin->version, -2) != '00') { // development versions don't end in 00.
    $_PAGE['version'] .= ' (dev '.substr($plugin->version, -2).')';
}
$_PAGE['isapp'] = '1';
$_PAGE['lang1'] = current_language();
require_once $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/wetconfig.php';
if ($_PAGE['issplash']) {
    $_PAGE['short_title_'.$_PAGE['lang1']] = get_string('welcome', 'theme_'.$CFG->theme);
} elseif ($_PAGE['isserv']) {
    $_PAGE['short_title_'.$_PAGE['lang1']] = get_string('error404', 'theme_'.$CFG->theme);
} else {
    $_PAGE['short_title_'.$_PAGE['lang1']] = $OUTPUT->page_title();
}
$_PAGE['title_'.$_PAGE['lang1']] = $_PAGE['short_title_'.$_PAGE['lang1']];
if (empty($PAGE->layout_options['nologininfo'])) {
    $_PAGE['signin'] = !isloggedin();
    $_PAGE['signout'] = isloggedin();
} else {
    $_PAGE['signin'] = $_PAGE['signout'] = 0;
}

$_SITE['wb_doc_version_' . $_PAGE['lang1']] = $_PAGE['version'];
$_SITE['wb_site_title_'.$_PAGE['lang1']]  = format_string($SITE->fullname, false);
$_SITE['wb_site_href_'.$_PAGE['lang1']] = $_SITE['wb_website_root'].'/?lang='.$_PAGE['lang1'];
$_SITE['wb_sitenav_file_'.$_LANG_] = $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/menu.php';
$_SITE['wb_site_href_'.$_LANG_] = $CFG->wwwroot;
//$_SITE['wb_ft1_menu_file_'.$_LANG_] = $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/footer1.php';
//$_SITE['wb_ft2_menu_file_'.$_LANG_] = $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/footer2.php';
//$_SITE['wb_ft3_menu_file_'.$_LANG_] = $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/footer3.php';
//$_SITE['wb_ft4_menu_file_'.$_LANG_] = $CFG->dirroot . '/theme/' . $CFG->theme . '/framework/footer4.php';
 
$nothing = $OUTPUT->doctype();

// ------------------------------------------------------------------
// Display Page
// ------------------------------------------------------------------

// Display page header.

require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'].'/inc/head-doc.php';
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'].'/inc/head-css.php';
echo $OUTPUT->standard_head_html(); // Insert Moodle specific meta tags, CSS and JS.
echo '<link href="//netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.css" rel="stylesheet">';
if(file_exists(realpath(dirname(__FILE__).'../').'/style/'.$_SITE['wb_theme'].'.css')) {
    echo '<link href="'.realpath(dirname(__FILE__).'../').'/style/'.$_SITE['wb_theme'].'.css" rel="stylesheet" media="screen" type="text/css" />'.PHP_EOL;
}

// Add id and classes to <body> tag.

ob_start();
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'].'/inc/head-nav.php';
$tmp = ob_get_contents();
ob_end_clean();
echo str_replace('<body ', '<body id="'.$PAGE->bodyid.'" class="'.$PAGE->bodyclasses.' '.$_SITE['wb_theme'].' jsenabled" ', $tmp);
$tmp = '';

// Display page content.

echo $OUTPUT->standard_top_of_body_html();
echo $OUTPUT->user_menu();
echo '    <div id="page-content" class="row-fluid">';
echo '        <section id="region-main" class="span12">';
echo $OUTPUT->course_content_header();
echo $OUTPUT->main_content();
echo $OUTPUT->course_content_footer();
echo '        </section>';
echo '    </div>';

// Display page footer.

echo $OUTPUT->standard_footer_html();
//echo '<div class="clear"></div>'.PHP_EOL;
echo $OUTPUT->course_footer();
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'].'/inc/foot-nav.php';
echo $OUTPUT->standard_end_of_body_html();
require $_SERVER['DOCUMENT_ROOT'].$_SITE['wb_php_dist_folder'].'/inc/foot-end.php';



/* ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html() ?>

<header role="banner" class="navbar navbar-fixed-top moodle-has-zindex">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo
                format_string($SITE->shortname, true, array('context' => context_course::instance(SITEID)));
                ?></a>
            <?php echo $OUTPUT->navbar_button(); ?>
            <?php echo $OUTPUT->user_menu(); ?>
            <?php echo $OUTPUT->search_box(); ?>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<div id="page" class="container-fluid">

    <?php echo $OUTPUT->full_header(); ?>


    <footer id="page-footer">
        <div id="course-footer"><?php echo $OUTPUT->course_footer(); ?></div>
        <p class="helplink"><?php echo $OUTPUT->page_doc_link(); ?></p>
        <?php
        echo $OUTPUT->login_info();
        echo $OUTPUT->home_link();
        echo $OUTPUT->standard_footer_html();
        ?>
    </footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>
</body>
</html>
*/ ?>