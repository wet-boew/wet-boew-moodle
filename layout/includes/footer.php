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

// Display page footer.

// MOODLE

echo '<div id="course-footer">' . $OUTPUT->course_footer() . '</div>';
// TODO: echo $OUTPUT->get_footer_blocks();
echo '<div class="text-center">';
// TODO: if ($PAGE->theme->settings->moodledocs) {
    echo '<p class="helplink">' . $OUTPUT->page_doc_link() . '</p>';
// TODO: }
// TODO: echo $OUTPUT->login_info();
// TODO: echo $OUTPUT->home_link();
echo $OUTPUT->standard_footer_html();
echo '</div>';

// WETBOEW

require $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . '/inc/foot-nav.php';
echo $OUTPUT->standard_end_of_body_html();
// TODO: echo $OUTPUT->get_all_tracking_methods();
require $_SERVER['DOCUMENT_ROOT'] . $_SITE['wb_php_dist_folder'] . '/inc/foot-end.php';
