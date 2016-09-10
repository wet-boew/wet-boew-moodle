<?php
/**
 * This file is part of the wet-boew-moodle theme.
 *
 * Copyright © 2016 onwards by TNG Consulting Inc. Inc. 
 *
 * WET-BOEW-MOODLE is provided freely as open source software, can be redistributed and/or 
 * modified it under the terms of the GNU General Public License version 3.0 or later.
 *
 * This software is distributed in the hope that it will be useful. However, there is no warranty,
 * implied or otherwise, of merchantability or fitness for any purpose.
 *
 * If for any reason a copy of the GNU General Public License was not included with this project,
 * you can view it online by going to: https://www.gnu.org/licenses/gpl-3.0.en.html</p>
*/

/**
 * Moodle Theme configuration file for the wet-boew-moodle theme.
 *
 * @package      theme_wet-boew-moodle
 * @copyright    2016 TNG Consulting Inc. unless otherwise noted.
 * @author       Michael Milette <www.tngconsulting.ca>
 */
 
defined('MOODLE_INTERNAL') || die();

$THEME->doctype = 'html5';
$THEME->yuicssmodules = array();
$THEME->name = 'wet4';

global $PAGE;

// Parent theme.
$THEME->parents = array('bootstrapbase');

// Theme overrides.
$THEME->enable_dock = false;
$THEME->rendererfactory = 'theme_overridden_renderer_factory';

// CSS Stylesheets.
$THEME->sheets = array('moodle', 'styles', $THEME->name);
$THEME->supportscssoptimisation = false;
$THEME->editor_sheets = array('editor');

// JavaScripts.
$THEME->javascripts = array();
$THEME->javascripts_footer = array();
