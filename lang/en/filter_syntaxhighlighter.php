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
 * English language strings.
 *
 * @package   filter_syntaxhighlighter
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2017 University of Chichester {@link https://www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['pluginname'] = 'Syntax Highlighter';
$string['filtername'] = 'Syntax Highlighter';
$string['privacy:metadata'] = 'The filter_syntaxhighlighter plugin does not store any personal data.';
$string['style'] = 'Highlighting style';
$string['style_desc'] = 'The name of the stylesheet to use for highlighting.<p>Example style (Save changes to update)</p>
<pre><code>function multiply($a, $b) {
    return $a * $b;
}
echo multiply(10, 15);</code></pre>';
$string['cdn'] = 'Use CDN';
$string['cdn_desc'] = 'Use CDN library for stylesheets. This may be faster than loading the files locally,
                        but you may prefer loading the files locally for GDPR reasons.';
