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
 * Version details
 *
 * @package    theme_wetboew
 * @copyright  2016 TNG Consulting Inc. (www.tngconsulting.ca)
 * @copyright  2015-2016 Jeremy Hopkins (Coventry University)
 * @copyright  2015-2016 Fernando Acedo (3-bits.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 *
 */

class wetboew {
    // Property declaration.
    
    private $data = array();
    
    function __construct() {
        $this->themedir = basename(__DIR__);
        $this->themename = 'theme_'.basename(__DIR__);
    }

    // Method declarations.
    
    public function __get($property) {
        if (isset($this->data[$property])) {
        	return $this->data[$property];
        }
        return null;
    }

    public function __set($property, $value) {
        $this->data[$property] = $value;
    }
}
 
/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */

function theme_wetboew_process_css($css, $theme) {

    // Set custom CSS.
    if (!empty($theme->settings->customcss)) {
        $customcss = $theme->settings->customcss;
    } else {
        $customcss = null;
    }
    $css = theme_wetboew_set_customcss($css, $customcss);

    // Define the default settings for the theme incase they've not been set.
    $defaults = array();
    // $defaults = array(
        // '[[setting:linkcolor]]' => '#009688',
        // '[[setting:linkhover]]' => '#009688',
        // '[[setting:maincolor]]' => '#009688',
        // '[[setting:backcolor]]' => '#FFFFFF',
        // '[[setting:regionmaincolor]]' => '#FFFFFF',
        // '[[setting:rendereroverlaycolor]]' => '#009688',
        // '[[setting:rendereroverlayfontcolor]]' => '#FFFFFF',
        // '[[setting:buttoncolor]]' => '#009688',
        // '[[setting:buttontextcolor]]' => '#ffffff',
        // '[[setting:buttonhovercolor]]' => '#00695c',
        // '[[setting:buttonlogincolor]]' => '#ef5350',
        // '[[setting:buttonloginhovercolor]]' => '#e53935',
        // '[[setting:buttonlogintextcolor]]' => '#0084c2',
        // '[[setting:buttonloginpadding]]' => '0px',
        // '[[setting:buttonloginheight]]' => '24px',
        // '[[setting:buttonloginmargintop]]' => '2px',
        // '[[setting:buttonradius]]' => '5px',
        // '[[setting:dividingline]]' => '#ffffff',
        // '[[setting:dividingline2]]' => '#ffffff',
        // '[[setting:navbarborder]]' => '#B7B3EF',
        // '[[setting:navbarhover]]' => '#3C469C',
        // '[[setting:breadcrumb]]' => '#b4bbbf',
        // '[[setting:breadcrumbtextcolor]]' => '#444444',
        // '[[setting:activebreadcrumb]]' => '#f5f5f5',
        // '[[setting:breadcrumbseparator]]' => 'angle-right',
        // '[[setting:loadingcolor]]' => '#f44336',
        // '[[setting:footerbkcolor]]' => '#424242',
        // '[[setting:footertextcolor]]' => '#ffffff',
        // '[[setting:footertextcolor2]]' => '#ffffff',
        // '[[setting:footerlinkcolor]]' => '#ffffff',
        // '[[setting:headerbkcolor]]' => '#00796B',
        // '[[setting:headerbkcolor2]]' => '#009688',
        // '[[setting:headertextcolor]]' => '#ffffff',
        // '[[setting:headertextcolor2]]' => '#ffffff',
        // '[[setting:msgbadgecolor]]' => '#E53935',
        // '[[setting:blockheadercolor]]' => '#009688',
        // '[[setting:blockbackgroundcolor]]' => '#FFFFFF',
        // '[[setting:blockheaderbackgroundcolor]]' => '#FFFFFF',
        // '[[setting:blockbordercolor]]' => '#59585D',
        // '[[setting:blockregionbackgroundcolor]]' => 'transparent',
        // '[[setting:selectiontext]]' => '#000000',
        // '[[setting:selectionbackground]]' => '#eeff41',
        // '[[setting:marketblockbordercolor]]' => '#e8eaeb',
        // '[[setting:marketblocksbackgroundcolor]]' => 'transparent',
        // '[[setting:blocklinkcolor]]' => '#009688',
        // '[[setting:blocklinkhovercolor]]' => '#009688',
        // '[[setting:blockheaderbordertop]]' => '1px',
        // '[[setting:blockheaderborderleft]]' => '0px',
        // '[[setting:blockheaderborderright]]' => '0px',
        // '[[setting:blockheaderborderbottom]]' => '0px',
        // '[[setting:blockmainbordertop]]' => '0px',
        // '[[setting:blockmainborderleft]]' => '0px',
        // '[[setting:blockmainborderright]]' => '0px',
        // '[[setting:blockmainborderbottom]]' => '0px',
        // '[[setting:blockheaderbordertopstyle]]' => 'dashed',
        // '[[setting:blockmainbordertopstyle]]' => 'solid',
        // '[[setting:blockheadertopradius]]' => '0px',
        // '[[setting:blockheaderbottomradius]]' => '0px',
        // '[[setting:blockmaintopradius]]' => '0px',
        // '[[setting:blockmainbottomradius]]' => '0px',
        // '[[setting:coursesectionheaderbg]]' => '#F3F3F3',
        // '[[setting:coursesectionheaderbordercolor]]' => '#F3F3F3',
        // '[[setting:coursesectionheaderborderstyle]]' => '',
        // '[[setting:coursesectionheaderborderwidth]]' => '',
        // '[[setting:coursesectionheaderborderradiustop]]' => '',
        // '[[setting:coursesectionheaderborderradiusbottom]]' => '',
        // '[[setting:coursesectionborderstyle]]' => '1px',
        // '[[setting:coursesectionborderwidth]]' => '',
        // '[[setting:coursesectionbordercolor]]' => '#e8eaeb',
        // '[[setting:coursesectionborderradius]]' => '',
        // '[[setting:tilesbordercolor]]' => '#009688',
        // '[[setting:slidermargintop]]' => '20px',
        // '[[setting:slidermarginbottom]]' => '20px',
        // '[[setting:currentcolor]]' => '#d9edf7',
        // '[[setting:sectionheadingcolor]]' => '#5f588a',
        // '[[setting:menufontsize]]' => '14px',
        // '[[setting:menufontpadding]]' => '20px',
        // '[[setting:topmenufontsize]]' => '14px',
        // '[[setting:menubkcolor]]' => '#ffffff',
        // '[[setting:menufontcolor]]' => '#444444',
        // '[[setting:menuhovercolor]]' => '#b2dfdb',
        // '[[setting:menubordercolor]]' => '#80cbc4',
        // '[[setting:mobilemenubkcolor]]' => '#F9F9F9',
        // '[[setting:mobilemenufontcolor]]' => '#000000',
        // '[[setting:covbkcolor]]' => '#009688',
        // '[[setting:covfontcolor]]' => '#ffffff',
        // '[[setting:editonbk]]' => '#4caf50',
        // '[[setting:editoffbk]]' => '#f44336',
        // '[[setting:editverticalpadding]]' => '',
        // '[[setting:edithorizontalpadding]]' => '',
        // '[[setting:edittopmargin]]' => '',
        // '[[setting:editfont]]' => '#ffffff',
        // '[[setting:sliderh3color]]' => '#ffffff',
        // '[[setting:sliderh4color]]' => '#ffffff',
        // '[[setting:slidersubmitbgcolor]]' => '#009688',
        // '[[setting:slidersubmitcolor]]' => '#ffffff',
        // '[[setting:slider2h3color]]' => '#000000',
        // '[[setting:slider2h4color]]' => '#000000',
        // '[[setting:slider2h3bgcolor]]' => '#000000',
        // '[[setting:slider2h4bgcolor]]' => '#ffffff',
        // '[[setting:slideroption2color]]' => '#0066cc',
        // '[[setting:slideroption2submitcolor]]' => '#ffffff',
        // '[[setting:slideroption2a]]' => '#0066cc',
        // '[[setting:socialsize]]' => '32px',
        // '[[setting:socialsizemobile]]' => '22px',
        // '[[setting:mobile]]' => '22',
        // '[[setting:socialpaddingtop]]' => '1.8%',
        // '[[setting:fontname]]' => 'Open Sans',
        // '[[setting:fontheadername]]' => 'Roboto Slab',
        // '[[setting:fontcolor]]' => '#333333',
        // '[[setting:fontheadercolor]]' => '#333333',
        // '[[setting:fontweight]]' => '400',
        // '[[setting:fontheaderweight]]' => '400',
        // '[[setting:fonttitlename]]' => 'Audiowide',
        // '[[setting:fonttitleweight]]' => '400',
        // '[[setting:fonttitlesize]]' => '48px',
        // '[[setting:fonttitlecolor]]' => '#FFFFFF',
        // '[[setting:fonttitlenamecourse]]' => 'Audiowide',
        // '[[setting:fonttitleweightcourse]]' => '48px',
        // '[[setting:fonttitlesizecourse]]' => '48px',
        // '[[setting:fonttitlecolorcourse]]' => '#FFFFFF',
        // '[[setting:sitetitlepaddingtop]]' => '0px',
        // '[[setting:sitetitlepaddingleft]]' => '0px',
        // '[[setting:coursetitlepaddingtop]]' => '0px',
        // '[[setting:coursetitlepaddingleft]]' => '0px',
        // '[[setting:searchboxpaddingtop]]' => '16px',
        // '[[setting:pageheaderheight]]' => '72px',
        // '[[setting:emoticonsize]]' => '16px',
        // '[[setting:fullscreenwidth]]' => '98%',
        // '[[setting:coursetitlemaxwidth]]' => '50%',
        // '[[setting:sitetitlemaxwidth]]' => '50%',
        // '[[setting:coursetitlepaddingtop]]' => '0px',
        // '[[setting:hidebreadcrumbmobile]]' => '',
        // '[[setting:hidepagefootermobile]]' => '',
        // '[[setting:hidealertsmobile]]' => '',
        // '[[setting:hidesocialmobile]]' => '',
        // '[[setting:socialboxpaddingtopmobile]]' => '',
        // '[[setting:socialboxpaddingbottommobile]]' => '',
        // '[[setting:hidecoursetitlemobile]]' => '',
        // '[[setting:hidelogomobile]]' => '',
        // '[[setting:hideheadermobile]]' => '',
        // '[[setting:enableheading]]' => 'fullname',
        // '[[setting:breadcrumbtitle]]' => 'shortname',
        // '[[setting:enableavailablecourses]]' => 'display',
        // '[[setting:enableticker]]' => true,
        // '[[setting:enabletickermy]]' => true,
        // '[[setting:tickerwidth]]' => '',
        // '[[setting:socialwallbackgroundcolor]]' => '#FFFFFF',
        // '[[setting:socialwallsectionradius]]' => '6px',
        // '[[setting:socialwallbordertopstyle]]' => 'solid',
        // '[[setting:socialwallborderwidth]]' => '2px',
        // '[[setting:socialwallbordercolor]]' => '#009688',
        // '[[setting:socialwallactionlinkcolor]]' => '#009688',
        // '[[setting:socialwallactionlinkhovercolor]]' => '#009688',
    // );

    // Get all the defined settings for the theme and replace defaults.
    foreach ($theme->settings as $key => $val) {
        if (array_key_exists('[[setting:'.$key.']]', $defaults) && !empty($val)) {
            $defaults['[[setting:'.$key.']]'] = $val;
        }
    }

    $homebkg = '';
    if (!empty($theme->settings->homebk)) {
        $homebkg = $theme->setting_file_url('homebk', 'homebk');
        $homebkg = 'background-image: url("' . $homebkg . '");';
    }
    $defaults['[[setting:homebkg]]'] = $homebkg;

    // Replace the CSS with values from the $defaults array.
    $css = strtr($css, $defaults);
    if (empty($theme->settings->tilesshowallcontacts) || $theme->settings->tilesshowallcontacts == false) {
        $css = theme_wetboew_set_tilesshowallcontacts($css, false);
    } else {
        $css = theme_wetboew_set_tilesshowallcontacts($css, true);
    }
    return $css;
}


/**
 * Adds any custom CSS to the CSS before it is cached.
 *
 * @param string $css The original CSS.
 * @param string $customcss The custom CSS to add.
 * @return string The CSS which now contains our custom CSS.
 */
function theme_wetboew_set_customcss($css, $customcss) {
    $tag = '[[setting:customcss]]';
    $replacement = $customcss;
    if (is_null($replacement)) {
        $replacement = '';
    }

    $css = str_replace($tag, $replacement, $css);

    return $css;
}

/**
 * Get theme setting
 * @param string $setting
 * @param string $format = false
 */
function theme_wetboew_get_setting($setting, $format = false) {
    static $theme;
    if (empty($theme)) {
        $theme = theme_config::load('wetboew');
    }

    if (empty($theme->settings->$setting)) {
        return false;
    } else if (!$format) {
        return $theme->settings->$setting;
    } else if ($format === 'format_text') {
        return format_text($theme->settings->$setting, FORMAT_PLAIN);
    } else if ($format === 'format_html') {
        return format_text($theme->settings->$setting, FORMAT_HTML, array('trusted' => true));
    } else {
        return format_string($theme->settings->$setting);
    }
}

/**
 * Get course activities for this course menu
 */
function theme_wetboew_get_course_activities() {
    GLOBAL $CFG, $PAGE, $OUTPUT;
    // A copy of block_activity_modules.
    $course = $PAGE->course;
    $content = new stdClass();
    $modinfo = get_fast_modinfo($course);
    $modfullnames = array();

    $archetypes = array();

    foreach ($modinfo->cms as $cm) {
        // Exclude activities which are not visible or have no link (=label).
        if (!$cm->uservisible or !$cm->has_view()) {
            continue;
        }
        if (array_key_exists($cm->modname, $modfullnames)) {
            continue;
        }
        if (!array_key_exists($cm->modname, $archetypes)) {
            $archetypes[$cm->modname] = plugin_supports('mod', $cm->modname, FEATURE_MOD_ARCHETYPE, MOD_ARCHETYPE_OTHER);
        }
        if ($archetypes[$cm->modname] == MOD_ARCHETYPE_RESOURCE) {
            if (!array_key_exists('resources', $modfullnames)) {
                $modfullnames['resources'] = get_string('resources');
            }
        } else {
            $modfullnames[$cm->modname] = $cm->modplural;
        }
    }
    core_collator::asort($modfullnames);

    return $modfullnames;
}

/**
 * Get formatted performance info showing only page load time
 * @param string $param
 */
function theme_wetboew_performance_output($param) {
    $html = html_writer::tag('span', get_string('loadtime', 'theme_wetboew').' '. round($param['realtime'], 2) . ' ' .
            get_string('seconds'), array('id' => 'load'));
    return $html;
}

/**
 * Initialize page
 * @param moodle_page $page
 */
function theme_wetboew_page_init(moodle_page $page) {
    global $CFG;
    $page->requires->jquery();
    // $page->requires->jquery_plugin('pace', 'theme_wetboew');
    // $page->requires->jquery_plugin('flexslider', 'theme_wetboew');
    // $page->requires->jquery_plugin('ticker', 'theme_wetboew');
    // $page->requires->jquery_plugin('easing', 'theme_wetboew');
    // $page->requires->jquery_plugin('wetboew', 'theme_wetboew');
}

/**
 * Strip full site title from header
 * @param string $heading
 */
function theme_wetboew_remove_site_fullname($heading) {
    global $SITE, $PAGE;
    if (strpos($PAGE->pagetype, 'course-view-') === 0) {
        return $heading;
    }

    $header = preg_replace("/^".$SITE->fullname."/", "", $heading);

    return $header;
}
