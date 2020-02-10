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
 * Main filter class
 *
 * @package   filter_syntaxhighlighter
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2017 University of Chichester {@link www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Filter class for highlighting code syntax.
 *
 * @package filter_syntaxhighlighter
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2017 University of Chichester {@link www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class filter_syntaxhighlighter extends moodle_text_filter {

    /**
     * The filter function is required, but the text just passes through.
     *
     * @param string $text HTML to be processed.
     * @param array $options Options for filter.
     * @return string String containing processed HTML.
     */
    public function filter($text, array $options = array()) {
        if (!is_string($text) || empty($text)) {
            return $text;
        }

        // regExp detects optional language example input:
        //    "<h3>header<h3><p>paragraph</p><pre>```lang:anything;;\r\n...code...```</pre>"
        $re = "~(<pre>)```(lang:(\w+);;[\r\n]{0,}|)(.*?)```(<\/pre>|)~isu";
        
        // preg_replace_callback should be faster then loop regex matches replace it in full string input
        return preg_replace_callback($re, array($this, 'code_replace'), $text);
    }

    private function code_replace($mGrp) {
        // mGrp ...matchGroup of regExp match
        // mGrp[0] = "<pre>```lang:anything;;...code...```</pre>"  // prevents "<pre><pre><code>..." if <pre> in Atto used
        // mGrp[1] = "<pre>"                 // recommended to place inside <pre> in Atto editor (preserves \s+, \t, \r, \n,... chars)
        // mGrp[2] = "lang:anything;;\r\n"   // with trailing line break (\r|\n|\r\n) for dirrefent line break styles (preserve of empty rows in code block)
        // mGrp[3] = "anything"              // specified lang class from https://github.com/highlightjs/highlight.js#supported-languages 
        // mGrp[4] = "...code..."
        // mGrp[5] = "</pre>"
        return
            '<pre><code' . ($mGrp[2] ? ' class="lang-' . $mGrp[3] .'"' : '') . '>' .  // lang specified > add class for hjls
                str_replace(['<p>', '</p>'], ['', "\n"], $mGrp[4]) .
            '</code></pre>';
    }

    /**
     * Loads the javascript and style sheets.
     *
     * @param moodle_page $page The page we are going to add requirements to.
     * @param context $context The context which contents are going to be filtered.
     */
    public function setup($page, $context) {
        global $CFG;
        static $jsinitialised = false;

        if (empty($jsinitialised)) {
            $css = get_config('filter_syntaxhighlighter', 'styleurl');
            $cdn = get_config('filter_syntaxhighlighter', 'cdn');
            if ($cdn) {
                $css = 'https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/' . $css . '.min.css';
            } else {
                $css = $CFG->wwwroot . '/filter/syntaxhighlighter/styles/' . $css . '.min.css';
            }
            $styleurl = new moodle_url($css);

            $page->requires->js_call_amd('filter_syntaxhighlighter/hljs', 'initHighlighting');
            $page->requires->css($styleurl);

            $jsinitialised = true;
        }
    }
}
