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

if (!empty($_PAGE['signin']) || !empty($_PAGE['signout'])) {
    echo '<section id="wb-so">';
    echo '<h2 class="wb-inv">'.$_SITE['wb_signininfo_text_'.$_LANG_].'</h2>';
    echo '<div class="container"><div class="row"><div class="col-md-12">';
    if (!empty($_PAGE['signin'])) {
        if (!empty($_PAGE['register'])) {
            echo '<a href="' . $_SITE['wb_register_href_'.$_LANG_] . '" class="btn btn-default wb-register">' . $_SITE['wb_register_text_'.$_LANG_] . '</a> ';
        }
        echo '<a href="' . $_SITE['wb_signin_href_'.$_LANG_] . '" class="btn btn-primary wb-signin">' . $_SITE['wb_signin_text_'.$_LANG_] . '</a>';
    } elseif (!empty($_PAGE['signout'])) {
        if ($_SITE['wb_theme'] == 'theme-gcweb' || empty($_SITE['wb_username_text'])) {
            if (empty($usermenu = $OUTPUT->user_menu())) {
                if (get_home_page() == HOMEPAGE_SITE) {
                    $url = new moodle_url('/');
                } else {
                    $url = new moodle_url('/my/');
                }
                echo '<a href="' . $url . '" class="btn btn-default wb-dashboard">' . get_string('myhome') . '</a> ';
            } else {
                echo $usermenu;
            }
            echo $PAGE->button;
        } elseif (!empty($_SITE['wb_username_text'])) {
            echo '<p style="display:inline-block;margin-right:10px;">' . $_SITE['wb_signedinas_text_'.$_LANG_] . ' ' . $_SITE['wb_username_text'] . '</span></p>';
        }
        if (!empty($_PAGE['settings'])) {
            echo '<a href="' . $_SITE['wb_settings_href_'.$_LANG_] . '" class="btn btn-default wb-settings">' . $_SITE['wb_settings_text_'.$_LANG_] . '</a> ';
        }
        echo '<a href="' . $_SITE['wb_signout_href_'.$_LANG_] . '" class="btn btn-primary wb-signout">' . $_SITE['wb_signout_text_'.$_LANG_] . '</a>';
    }
    echo '</div></div></div>';
    echo '</section>';
}