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

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
**/
 
defined('MOODLE_INTERNAL') || die();

class theme_wetboew_core_renderer extends theme_bootstrap_core_renderer {
    /**
     * Returns empty language menu so that it doesn't get appended to the Moodle custom menu.
     *
     * @return string.
     */
    public function lang_menu() {
        return '';
    }
    
    /*
     * Render the breadcrumb (a.k.a. Moodle navbar).
     * @param array $items
     * @param string $breadcrumbs
     *
     * return string
     */
    public function navbar() {
        global $PAGE, $SITE, $CFG;

        $items = $this->page->navbar->get_items();

        if (empty($items)) {
            return '';
        }

        $breadcrumbs = '<li><a href="https://www.canada.ca/en/">Home</a></li><li><a href="https://www.ic.gc.ca/home/">Innovation, Science and Economic Development Canada</a></li>';
        $i = 0;

        // Show all of the breacrumbs if the user meets the minimum criteria.
        $lib = new wetboew;
        $showall = $lib->isminrole(2); // Minimum of a non-editing teacher.

        foreach ($items as $item) {
            if (empty($item->action) && !$showall) {
                continue;
            }
            $item->hideicon = true;
            // Text / Icon home/dashboard.
            if ($i++ == 0) {
               // $label = format_string($SITE->fullname, false) . ' - ' . $item->text;
               // $breadcrumbs = html_writer::tag('li', html_writer::tag('i', html_writer::link($item->action, $label), array('class' => 'fa fa-home')));
               $item->text = format_string($SITE->fullname, false) . ' - ' . $item->text;
            }
            $breadcrumbs .= '<li>'.$this->render($item) . '</li>';
        } // End loop.

        return '<ul class="breadcrumb">' . $breadcrumbs . '</ul>';
    }

    /**
     * Internal implementation of single_select rendering (Moodle 3.1 core code).
     * Changes: If "noautosubmit" theme setting is set, disables autosubmit and adds a "Go" button.
     * @param single_select $select
     * @return string HTML fragment
     */
    protected function render_single_select(single_select $select) {
        $select = clone($select);
        if (empty($select->formid)) {
            $select->formid = html_writer::random_id('single_select_f');
        }

        $output = '';
        $params = $select->url->params();
        if ($select->method === 'post') {
            $params['sesskey'] = sesskey();
        }
        foreach ($params as $name=>$value) {
            $output .= html_writer::empty_tag('input', array('type'=>'hidden', 'name'=>$name, 'value'=>$value));
        }

        if (empty($select->attributes['id'])) {
            $select->attributes['id'] = html_writer::random_id('single_select');
        }

        if ($select->disabled) {
            $select->attributes['disabled'] = 'disabled';
        }

        if ($select->tooltip) {
            $select->attributes['title'] = $select->tooltip;
        }

        if (!(isset($this->page->theme->settings->noautosubmit) && !empty($this->page->theme->settings->noautosubmit))) {
            $select->attributes['class'] = 'autosubmit';
            if ($select->class) {
                $select->attributes['class'] .= ' ' . $select->class;
            }
        }

        if ($select->label) {
            $output .= html_writer::label($select->label, $select->attributes['id'], false, $select->labelattributes);
        }

        if ($select->helpicon instanceof help_icon) {
            $output .= $this->render($select->helpicon);
        }
        $output .= html_writer::select($select->options, $select->name, $select->selected, $select->nothing, $select->attributes);

        $go = html_writer::empty_tag('input', array('type'=>'submit', 'value'=>get_string('go'), 'class' => 'btn-xs', 'style'=>'margin-left:3px;'));
        if (!(isset($this->page->theme->settings->noautosubmit) && !empty($this->page->theme->settings->noautosubmit))) {
           $output .= html_writer::tag('noscript', html_writer::tag('div', $go), array('class' => 'inline'));
        } else {
           $output .= $go;
        }

        $nothing = empty($select->nothing) ? false : key($select->nothing);
        $this->page->requires->yui_module('moodle-core-formautosubmit',
            'M.core.init_formautosubmit',
            array(array('selectid' => $select->attributes['id'], 'nothing' => $nothing))
        );

        // then div wrapper for xhtml strictness
        $output = html_writer::tag('div', $output);

        // now the form itself around it
        if ($select->method === 'get') {
            $url = $select->url->out_omit_querystring(true); // url without params, the anchor part allowed
        } else {
            $url = $select->url->out_omit_querystring();     // url without params, the anchor part not allowed
        }
        $formattributes = array('method' => $select->method,
                                'action' => $url,
                                'id'     => $select->formid);
        $output = html_writer::tag('form', $output, $formattributes);

        // and finally one more wrapper with class
        return html_writer::tag('div', $output, array('class' => $select->class));
    }
}
