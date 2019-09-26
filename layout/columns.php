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

require_once $CFG->dirroot . '/theme/wetboew/layout/includes/header.php';

// Display page content.

if (!($_SITE['wb_theme'] == 'theme-gcweb' || empty($_SITE['wb_username_text']))) {
    echo $PAGE->button;
}
echo $OUTPUT->standard_top_of_body_html();

echo '    <div id="page-content" class="row-fluid">';
if ($columns == 2) {
    echo '        <section id="region-main" class="'. $regionmain.'>';
} elseif ($columns == 3) {
    echo '        <div id="region-main-box" class="' . $regionmainbox . '">';
    echo '            <div class="row-fluid">';
}
echo '                <section id="region-main" class="'. $regionmain.'>';
echo $OUTPUT->course_content_header();
echo $extracontent;
echo $OUTPUT->main_content();
echo $OUTPUT->course_content_footer();
echo '               </section>';
if ($columns == 2) {
    echo $OUTPUT->blocks('side-pre', $sidepre);
} elseif ($columns == 3) {
    echo '            </div>';
    echo $OUTPUT->blocks('side-pre', $sidepre);
    echo '       </div>';
    echo $OUTPUT->blocks('side-post', $sidepost);
}
echo '    </div>';

require_once(dirname(__FILE__) . '/includes/footer.php');