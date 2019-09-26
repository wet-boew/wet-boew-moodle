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

defined('MOODLE_INTERNAL') || die();
?>
<nav role="navigation" id="wb-sm" data-trgt="mb-pnl" class="wb-menu visible-md visible-lg" typeof="SiteNavigationElement">
<div class="container nvbar">
<h2><?php echo $_SITE['wb_sitenav_'.$_LANG_]; ?></h2>
<div class="row">
<?php 
$custommenuitems = $CFG->custommenuitems;
if (file_exists($CFG->dirroot . '/local/dynamenu/locallib.php')) {
    include $CFG->dirroot . '/local/dynamenu/locallib.php';
}
$tmp = $OUTPUT->custom_menu($custommenuitems);
$tmp = str_replace('<ul class="nav"><li>','<ul class="list-inline menu" role="menubar"><li>', $tmp);
$tmp = str_replace('[site-url]', $CFG->wwwroot, $tmp);
//$tmp = str_replace('class="dropdown-toggle" data-toggle="dropdown" ','',$tmp);
$tmp = str_replace('<b class="caret"></b>','',$tmp);

//$tmp = str_lreplace('</ul>','<li class="dropdown"><a href="#">My</a><ul class="dropdown-menu" id="user-menu" role="menu" >' . wetboew_user_menu() . '</ul></li></ul>', $tmp);
echo $tmp;
$tmp = '';

function str_lreplace($search, $replace, $subject) {
    $pos = strrpos($subject, $search);
    if($pos !== false){
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}
/*
?>
		<ul class="list-inline menu" role="menubar">
			<li><a href="#lore" class="item">Section 1</a>
				<ul class="sm list-unstyled" id="lore" role="menu">
					<li><a href="#">Item 1.1</a></li>
					...
				</ul>
			</li>
			<li><a href="#lor" class="item">Section 2</a>
				<ul class="sm list-unstyled" id="lor" role="menu" >
					<li><a href="#">Item 2.1</a></li>
					...
					<li class="slflnk"><a href="#">Section 2 - More</a></li>
				</ul>
			</li>
			<li><a href="#lorm" class="item">Section 3</a>
				<ul class="sm list-unstyled" id="lorm" role="menu" >
					<li>
						<details>
							<summary>Section 3.1</summary>
							<ul role="menu">
								<li><a href="#">Item 3.1.1</a></li>
								...
							</ul>
						</details>
					</li>
					...
				</ul>
			</li>
		</ul>
*/ ?>
	</div>
</div>
</nav>        