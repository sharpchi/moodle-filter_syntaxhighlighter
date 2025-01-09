@filter @filter_syntaxhighlighter @uoc
Feature: Render Code using SyntaxHiglighter filters
  To highlight code with a SyntaxHiglighter

  Background:
    Given the following "courses" exist:
      | shortname | fullname |
      | C1        | Course 1 |
    And the following "users" exist:
      | username | firstname | lastname | email                |
      | teacher1 | Teacher   | 1        | teacher1@example.com |
      | student1 | Student   | 1        | student1@example.com |
    And the following "course enrolments" exist:
      | user     | course | role           |
      | teacher1 | C1     | editingteacher |
      | student1 | C1     | student        |
    And the following "activities" exist:
      | activity | name       | intro      | introformat | course | content   | contentformat | idnumber |
      | page     | PageName1  | PageDesc1  | 1           | C1     | HLJStest  | 1             | 1        |
    And the "syntaxhighlighter" filter is "on"

  @javascript @external
  Scenario: Render autodetect language.
    Given I log in as "teacher1"
    And I am on the "PageName1" "page activity editing" page
    And I set the field "Page content" to "<p>```</p><p>echo \"Hello\";</p><p>```<br></p>"
    When I click on "Save and display" "button"
    And I wait until the page is ready
    Then ".hljs" "css_element" should exist
    And ".hljs-attribute" "css_element" should exist
    And I log out
    And I log in as "student1"
    And I am on "Course 1" course homepage
    And I follow "PageName1"
    Then ".hljs" "css_element" should exist
    And ".hljs-attribute" "css_element" should exist

  Scenario: Do not render if user sets nohighlight.
    Given I log in as "teacher1"
    And I am on the "PageName1" "page activity editing" page
    And I set the field "Page content" to "<pre><code class=\"nohighlight\">echo \"Hello\";</code></pre>"
    When I click on "Save and display" "button"
    And I wait until the page is ready
    Then ".hljs" "css_element" should not exist
    And ".hljs-attribute" "css_element" should not exist
    And I log out
    And I log in as "student1"
    And I am on "Course 1" course homepage
    And I follow "PageName1"
    Then ".hljs" "css_element" should not exist
    And ".hljs-attribute" "css_element" should not exist
