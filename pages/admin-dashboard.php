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
* Administrator Dashboard
************************************************************/

// Include config.php
$wwwdir = '../../..';
require_once $wwwdir."/config.php";

// Globals
global $PAGE;

// Setup the moodle page.
$pageurl = $CFG->wwwroot . '/theme/wetboew/pages/' . __FILE__;
$PAGE->set_url($pageurl);
$PAGE->set_context(context_system::instance());

$PAGE->set_pagelayout('base');

echo format_text($OUTPUT->header(), FORMAT_HTML, array('trusted' => true, 'noclean' => true, 'para' => false));
$tab = 0;
function makebutton($url, $description, $icontopic = '', $iconaction = '') {
    $out = '';
    $out .= '<a href="' . new moodle_url($url) . '" class="btn">' . PHP_EOL;
    $out .= '    <div class="wetlink">' . PHP_EOL;
    $out .= '        <div class="weticon">' . PHP_EOL;
    $out .= '            <div class="fa fa-topic ' . $icontopic . '"> </div>' . PHP_EOL;
    if (!empty($iconaction)) {
        $out .= '            <div class="fa fa-action ' . $icontopic . '"> </div>' . PHP_EOL;
    }
    $out .= '        </div>' . PHP_EOL;
    $out .= '        <div class="actiondescription">' . $description . '</div>' . PHP_EOL;
    $out .= '    </div>' . PHP_EOL;
    $out .= '</a>' . PHP_EOL;
    return $out;
}
?>
<!-- Main content start -->
<h1 id="wb-cont">Admin Dashboard</h1>
<div class="wb-tabs">
	<div class="tabpanels">
		<details id="details-panel<?echo $tab++; ?>">
			<summary><?php echo get_string('users','admin'); ?></summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/user/editadvanced.php?id=-1', get_string('addnewuser'), 'fa-user', 'fa-plus-square');
                echo makebutton('/admin/user.php', get_string('userlist', 'admin'), 'fa-user', 'fa-cog');
                echo makebutton('/cohort/index.php', get_string('cohorts', 'cohort'), 'fa-user-plus', 'fa-cog');
                echo makebutton('/uploaduser/index.php', get_string('uploadusers', 'tool_uploaduser'), 'fa-file', 'fa-upload');
                echo makebutton('/user/user_bulk.php', get_string('userbulk', 'admin'), 'fa-group', 'fa-caret-right');
            ?>
            </div>
		</details>
		<details id="details-panel<?echo $tab++; ?>">
			<summary>Course Management</summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/course/edit.php?category=1&returnto=catmanage', get_string('createnewcourse'), 'fa-file-text', 'fa-plus-square');
                echo makebutton('course/management.php', get_string('coursemgmt', 'admin'), 'fa-file-text', 'fa-plus-square');
                echo makebutton('/backup/restorefile.php?contextid=1', get_string('restore'), 'fa-file-text', 'fa-upload');
                echo makebutton('/admin/settings.php?section=coursesettings', get_string('coursesettings'), 'fa-file-text', 'fa-cog');
            ?>
            </div>
		</details>
		<details id="details-panel<?echo $tab++; ?>">
			<summary><?php echo get_string('administrationsite'); ?></summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/admin/', get_string('notifications'), 'fa-building', 'fa-chevron-circle-left');
                echo makebutton('/admin/plugins.php', get_string('pluginsoverview', 'core_admin'), 'fa-file-text', 'fa-user');
                echo makebutton('/admin/settings.php?section=supportcontact', get_string('supportcontact', 'admin'), 'fa-map-marker', 'fa-cog');
                echo makebutton('/admin/settings.php?section=messagesettingemail', get_string('pluginname', 'message_email'), 'fa-envelope', 'fa-cog');
                echo makebutton('/admin/settings.php?section=frontpagesettings', get_string('frontpagesettings', 'admin'), 'fa-newspaper-o', 'fa-cog');
                echo makebutton('/user/profile/', get_string('profilefields', 'admin'), 'fa-list-alt', 'fa-cog');
                echo makebutton('/admin/settings.php?section=optionalsubsystems', get_string('advancedfeatures', 'admin'), 'fa-plus-square', 'fa-cog');
            ?>
            </div>
 		</details>
		<details id="details-panel<?echo $tab++; ?>">
			<summary><?php echo get_string('appearance', 'admin'); ?></summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/admin/settings.php?section=themesettings', get_string('themesettings', 'admin'), 'fa-map-marker', 'fa-cog');
                echo makebutton('/admin/settings.php?section=documentation', get_string('moodledocs'), 'fa-map-marker', 'fa-cog');
                echo makebutton('/my/indexsys.php', get_string('mypage', 'admin'), 'fa-map-marker', 'fa-cog');
                echo makebutton('/user/profilesys.php', get_string('myprofile', 'admin'), 'fa-map-marker', 'fa-cog');
                echo makebutton('/admin/settings.php?section=navigation', get_string('navigation'),  'fa-map-marker', 'fa-cog');
                echo makebutton('/admin/settings.php?section=additionalhtml', get_string('additionalhtml', 'admin'), 'fa-html5', 'fa-cog');
            ?>
            </div>
 		</details>
		<details id="details-panel<?echo $tab++; ?>">
			<summary><?php echo get_string('language'); ?></summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/admin/settings.php?section=langsettings', get_string('languagesettings', 'admin'), 'fa-user', 'fa-cog');
                echo makebutton('/admin/tool/customlang/index.php', get_string('pluginname', 'tool_customlang'), 'fa-user', 'fa-cog');
                echo makebutton('/admin/tool/langimport/index.php', get_string('pluginname', 'tool_langimport'), 'fa-user', 'fa-cog');
            ?>
            </div>
         </details>
		<details id="details-panel<?echo $tab++; ?>">
			<summary>My Zone</summary>
            <div class="wetlink_container">
            <?php
                echo makebutton('/my/', get_string('mycourses'), 'fa-user', 'fa-file-text');
                echo makebutton('/course/', get_string('allcourses', 'search'), 'fa-user', 'fa-asterisk');
                echo makebutton('/calendar/view.php?view=month', get_string('calendar', 'calendar'), 'fa-calendar', 'fa-asterisk');
            ?>
            </div>
         </details>
	</div>
</div>
<h2>Moodle Reports</h2>
<div class="wetlink_container panel panel-default">
    <div class="panel-body">
        <?php
            echo makebutton('/comment/', get_string('comments'), 'fa-bar-chart-o', '');
            echo makebutton('/report/backups/', get_string('backups', 'admin'), 'fa-bar-chart-o', '');
            echo makebutton('/report/configlog/', get_string('configlog', 'report_configlog'), 'fa-bar-chart-o', '');
            echo makebutton('/report/eventlist/', get_string('pluginname', 'report_eventlist'), 'fa-bar-chart-o', '');
            echo makebutton('/report/log/?id=0', get_string('log', 'admin'), 'fa-bar-chart-o', '');
            echo makebutton('/report/loglive/', get_string('pluginname', 'report_loglive'), 'fa-bar-chart-o', '');
            echo makebutton('/report/performance/', get_string('pluginname', 'report_performance'), 'fa-bar-chart-o', '');
            echo makebutton('/report/questioninstances/', get_string('pluginname', 'report_questioninstances'), 'fa-bar-chart-o', '');
            echo makebutton('/report/search/', get_string('pluginname', 'report_search'), 'fa-bar-chart-o', '');
            echo makebutton('/report/security/', get_string('pluginname', 'report_security'), 'fa-bar-chart-o', '');
            echo makebutton('/admin/tool/monitor/managerules.php?courseid=0', get_string('managerules', 'tool_monitor'), 'fa-bar-chart-o', '');
            echo makebutton('/admin/tool/spamcleaner/', get_string('pluginname', 'tool_spamcleaner'), 'fa-bar-chart-o', '');
        ?>
    </div>
</div>
<!-- MainContentEnd -->
<?php
echo $OUTPUT->footer();