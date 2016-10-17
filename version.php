<?php
/**
 * This file is part of the wet-boew-moodle project.
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
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_wetboew
 * @copyright  2016 TNG Consulting Inc. unless otherwise noted.
 * @author     Michael Milette <www.tngconsulting.ca>
 * @license    Moodle: http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later.
 * @license    WET-BOEW: https://github.com/wet-boew/wet-boew/blob/master/License-eng.txt MIT License.
 * @license    Government of Canada graphics: Government of Canada http://www.tbs-sct.gc.ca/fip-pcim/index-eng.asp .
 * @license    3rd party software included with WET-BOEW: Held by the respective copyright holders as noted in those files.
 */
 
defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2016090101;           // The current module version (Date: YYYYMMDDXX).
$plugin->requires  = 2016052300;           // Requires Moodle version 3.1+. See http://docs.moodle.org/dev/version.php.
$plugin->component = 'theme_wetboew';     // Full name of the plugin (used for diagnostics).
$plugin->maturity  = MATURITY_ALPHA;
$plugin->release   = '4.0.23';             // Based on WET-BOEW of the same version number.

$plugin->dependencies = array(
//    'filter_multilangsecond'  => ANY_VERSION,
    'theme_bootstrapbase'     => 2014111000
);
