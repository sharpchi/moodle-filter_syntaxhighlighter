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
 * Settings for syntax highlighter.
 *
 * @package   filter_syntaxhighlighter
 * @author    Mark Sharp <m.sharp@chi.ac.uk>
 * @copyright 2017 University of Chichester {@link www.chi.ac.uk}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {


    $options = [
        'agate' => 'agate',
        'androidstudio' => 'androidstudio',
        'arduino-light' => 'arduino-light',
        'arta' => 'arta',
        'ascetic' => 'ascetic',
        'atelier-cave-dark' => 'atelier-cave-dark',
        'atelier-cave-light' => 'atelier-cave-light',
        'atelier-dune-dark' => 'atelier-dune-dark',
        'atelier-dune-light' => 'atelier-dune-light',
        'atelier-estuary-dark' => 'atelier-estuary-dark',
        'atelier-estuary-light' => 'atelier-estuary-light',
        'atelier-forest-dark' => 'atelier-forest-dark',
        'atelier-forest-light' => 'atelier-forest-light',
        'atelier-heath-dark' => 'atelier-heath-dark',
        'atelier-heath-light' => 'atelier-heath-light',
        'atelier-lakeside-dark' => 'atelier-lakeside-dark',
        'atelier-lakeside-light' => 'atelier-lakeside-light',
        'atelier-plateau-dark' => 'atelier-plateau-dark',
        'atelier-plateau-light' => 'atelier-plateau-light',
        'atelier-savanna-dark' => 'atelier-savanna-dark',
        'atelier-savanna-light' => 'atelier-savanna-light',
        'atelier-seaside-dark' => 'atelier-seaside-dark',
        'atelier-seaside-light' => 'atelier-seaside-light',
        'atelier-sulphurpool-dark' => 'atelier-sulphurpool-dark',
        'atelier-sulphurpool-light' => 'atelier-sulphurpool-light',
        'atom-one-dark' => 'atom-one-dark',
        'atom-one-light' => 'atom-one-light',
        'brown-paper' => 'brown-paper',
        'brown-papersq.png' => 'brown-papersq.png',
        'codepen-embed' => 'codepen-embed',
        'color-brewer' => 'color-brewer',
        'darcula' => 'darcula',
        'dark' => 'dark',
        'darkula' => 'darkula',
        'default' => 'default',
        'docco' => 'docco',
        'dracula' => 'dracula',
        'far' => 'far',
        'foundation' => 'foundation',
        'github-gist' => 'github-gist',
        'github' => 'github',
        'googlecode' => 'googlecode',
        'grayscale' => 'grayscale',
        'gruvbox-dark' => 'gruvbox-dark',
        'gruvbox-light' => 'gruvbox-light',
        'hopscotch' => 'hopscotch',
        'hybrid' => 'hybrid',
        'idea' => 'idea',
        'ir-black' => 'ir-black',
        'kimbie.dark' => 'kimbie.dark',
        'kimbie.light' => 'kimbie.light',
        'magula' => 'magula',
        'mono-blue' => 'mono-blue',
        'monokai-sublime' => 'monokai-sublime',
        'monokai' => 'monokai',
        'obsidian' => 'obsidian',
        'ocean' => 'ocean',
        'paraiso-dark' => 'paraiso-dark',
        'paraiso-light' => 'paraiso-light',
        'pojoaque' => 'pojoaque',
        'pojoaque.jpg' => 'pojoaque.jpg',
        'purebasic' => 'purebasic',
        'qtcreator_dark' => 'qtcreator_dark',
        'qtcreator_light' => 'qtcreator_light',
        'railscasts' => 'railscasts',
        'rainbow' => 'rainbow',
        'routeros' => 'routeros',
        'school-book' => 'school-book',
        'school-book.png' => 'school-book.png',
        'solarized-dark' => 'solarized-dark',
        'solarized-light' => 'solarized-light',
        'sunburst' => 'sunburst',
        'tomorrow-night-blue' => 'tomorrow-night-blue',
        'tomorrow-night-bright' => 'tomorrow-night-bright',
        'tomorrow-night-eighties' => 'tomorrow-night-eighties',
        'tomorrow-night' => 'tomorrow-night',
        'tomorrow' => 'tomorrow',
        'vs' => 'vs',
        'vs2015' => 'vs2015',
        'xcode' => 'xcode',
        'xt256' => 'xt256',
        'zenburn' => 'zenburn'];

    $setting = new admin_setting_configselect('filter_syntaxhighlighter/styleurl',
                                         new lang_string('style', 'filter_syntaxhighlighter'),
                                         new lang_string('style_desc', 'filter_syntaxhighlighter'),
                                         'atom-one-light',
                                         $options);
    $settings->add($setting);

}
