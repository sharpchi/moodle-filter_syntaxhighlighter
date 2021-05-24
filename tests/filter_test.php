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
 * Unit Tests for syntaxhighligher
 *
 * @package   filter_syntaxhighlighter
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2021 University of Chichester {@link https://www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->dirroot . '/filter/syntaxhighlighter/filter.php'); // Include the code to test.

/**
 * Filter unit test
 */
class filter_test extends advanced_testcase {

    /**
     * General test filter
     *
     * @return void
     */
    public function test_autodetect() {
        $this->resetAfterTest(true);

        $filterplugin = new filter_syntaxhighlighter(null, []);
        // phpcs:disable moodle.Strings.ForbiddenStrings.Found
        $tests = [
            [
                'in' => '<p>```</p><p>echo "Hello";</p><p>```<br></p>',
                'out' => "<p><pre><code>\necho \"Hello\";\n</code></pre><br></p>"
            ],
            [
                'in' => '<pre>```echo "Hello";```</pre>',
                'out' => '<pre><code>echo "Hello";</code></pre>'
            ],
            [
                'in' => '<pre><code>echo "Hello";</code></pre>',
                'out' => '<pre><code>echo "Hello";</code></pre>'
            ],
        ];
        // phpcs:enable moodle.Strings.ForbiddenStrings.Found
        foreach ($tests as $test) {
            $filtered = $filterplugin->filter($test['in']);
            $this->assertEquals($test['out'], $filtered);
        }
    }

    /**
     * Test specified language.
     *
     * @return void
     */
    public function test_lang() {
        $this->resetAfterTest(true);

        $filterplugin = new filter_syntaxhighlighter(null, []);
        // phpcs:disable moodle.Strings.ForbiddenStrings.Found
        $tests = [
            [
                'in' => '<p>```lang:php;;</p><p>echo "Hello";</p><p>```<br></p>',
                'out' => "<p><pre><code class=\"lang-php\">\necho \"Hello\";\n</code></pre><br></p>"
            ],
            [
                'in' => '<pre>```lang:php;;echo "Hello";```</pre>',
                'out' => '<pre><code class="lang-php">echo "Hello";</code></pre>'
            ],
            [
                'in' => '<pre><code class="lang-php">echo "Hello";</code></pre>',
                'out' => '<pre><code class="lang-php">echo "Hello";</code></pre>'
            ]
        ];
        // phpcs:enable moodle.Strings.ForbiddenStrings.Found
        foreach ($tests as $test) {
            $filtered = $filterplugin->filter($test['in']);
            $this->assertEquals($test['out'], $filtered);
        }
    }
}