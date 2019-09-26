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
 * @copyright  2016-2017 TNG Consulting Inc. unless otherwise noted.
 * @author     Michael Milette <www.tngconsulting.ca>
 * @license    WET-BOEW-Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    WET-BOEW: https://github.com/wet-boew/wet-boew/blob/master/License-eng.txt MIT License.
 * @license    Government of Canada graphics: Government of Canada http://www.tbs-sct.gc.ca/fip-pcim/index-eng.asp .
 * @license    3rd party software included with WET-BOEW: Held by the respective copyright holders as noted in those files.
**/

defined('MOODLE_INTERNAL') || die();

$columns = 1;
$extracontent = '
<div class="container-fluid">
    <div class="hero-unit">
        <div class="row-fluid">
            <div class="span4">
                <img src="' . $CFG->wwwroot . '/theme/wetboew/pix/screenshot.png" style="width:100%;padding-top:20px;"></a>
            </div>
            <div class="span8">
                <h2>WET-BOEW-Moodle Working Example</h2>
                <p>The theme is currently under early development so you might notice a few things that are not quite finish yet. Check back in upcoming months or contribute financially or through development efforts to this project in order to accelerate the process. For more information and source code, visit the <a href="https://github.com/wet-boew/wet-boew-moodle">WET-BOEW-Moodle project</a> page.</p>
                <p>This page is a configurable front page example for your Moodle LMS. It is displayed when users are signed out of the website.</p>
                <p>As you explore this demo site, you will quickly notice that we aren\'t just hiding Moodle behind a few themed pages. The whole site is suitable for public facing training.</p>
                <p><a class="btn btn-primary btn-large" href="#frontpage-course-list">Try a course! &raquo;</a></p>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="span4">
            <h2>GC Web Usability</h2>
            <p>The Government of Canada Web Usability subtheme implements the requirements of the Standard on Web Usability and is recommended for use on all Government of Canada websites (except for Canada.ca).</p>
            <p><a class="btn" href="./?wettheme=theme-gcwu-fegc">Try it! &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>GC Intranet</h2>
            <p>The Government of Canada Intranet subtheme adapts the Government of Canada Web Usability theme for intranet sites.</p>
            <p><a class="btn" href="./?wettheme=theme-gc-intranet">Try it! &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>WET-BOEW</h2>
            <p>The Web Experience Toolkit (WET) subtheme provides an example implementation of the Base Theme.</p>
            <p><a class="btn" href="./?wettheme=theme-wet-boew">Try it! &raquo;</a></p>
        </div><!--/span-->
    </div><!--/row-->

    <div class="row-fluid">
        <div class="span4">
            <h2>Canada.ca</h2>
            <p>This subtheme implements the layout and design requirements for Canada.ca.</p>
            <p><a class="btn" href="./?wettheme=theme-gcweb">Try it! &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>Canada.ca Redesign (2019)</h2>
            <p>This subtheme implements the layout and design requirements for Canada.ca Redesign (2019) Under development.</p>
            <p><a class="btn" href="./?wettheme=theme-gcweb2">Try it! &raquo;</a></p>
        </div><!--/span-->
        <div class="span4">
            <h2>OGPL</h2>
            <p>The Open Government Platform (OGPL) subtheme was developed to support the Open Government Platform (OGPL).</p>
            <p><a class="btn" href="./?wettheme=theme-ogpl">Try it! &raquo;</a></p>
        </div><!--/span-->
    </div><!--/row-->
    <hr>
</div> <!-- /container -->
';
/*
        <div class="span4">
            <h2>Base</h2>
            <p>A subtheme template to aid in the creation of new custom themes.</p>
            <p><strong>Coming in the future</strong></p>
        </div><!--/span-->
*/
require 'columns.php';