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
        //Define necessary regex
        $regexOnlyGitlabAndGithub = '/(https:\/\/gitlab.com|https:\/\/raw.githubusercontent.com)/';
        $regexExternalSources = '/(https?|ftp):\/\/(-\.)?([^\s\/?\.#-]+\.?)+(\/[^\s]*)?/';
        $useExternalSources = get_config('filter_syntaxhighlighter', 'allowexternalsource');

        if (!is_string($text) || empty($text)) {
            return $text;
        }

        $re = "~```(.*?)```~isu";
        $urlFormat = (($useExternalSources > 0) ? $regexExternalSources : $regexOnlyGitlabAndGithub);

        $result = preg_match_all($re, $text, $matches);
        if ($result > 0) {
            foreach ($matches[1] as $idx => $code) {
            // Check if the code has url format
              if (preg_match($urlFormat , $code,$matchUrlFormat)){
                // Check using strncmp to validate $code doesn´t have nothing else than the url
                if(strncmp($matchUrlFormat[0], $code,strlen($matchUrlFormat[0])) !== 0 ){
                   $code = $this->fetchCodeFromUrl($code);
                 }
                 else{
                   return $text;
                 }
              }
                $newcode = '<pre><code>' .
                    str_replace(['<p>', '</p>'], ['', "\n"], $code) .
                    '</code></pre>';
                $text = str_replace($matches[0][$idx], $newcode, $text);
            }
        }

        return $text;
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

    /**
     * Fetch code  from repository
     *
     * @param url url to fetch code from.
     * @return codeResult  String contains fetched code.
     */

    protected function fetchCodeFromUrl($url) {
      $cleanedUrl = (string) trim(strip_tags($url));
      $ch = curl_init($cleanedUrl);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $codeResult = curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      if($httpCode != 200) {
             $codeResult=$url;
            }
      curl_close ($ch);
      $codeResult=htmlentities($codeResult);
      return $codeResult;
    }

}
