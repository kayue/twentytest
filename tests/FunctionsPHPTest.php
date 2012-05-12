<?php

/**
 * functions.php Tests
 */

class FunctionsPHPTest extends WP_UnitTestCase {
	public function setUp() {
		parent::setUp();
	}

	public function testTwentytestTrim() {
		$actual = twentytest_trim("Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.");
		$expected = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat&hellip;";
		
		$this->assertEquals($expected, $actual);
	}

	public function testTwentytestAbsint() {
		$this->assertEquals(1, twentytest_absint(-1));
		$this->assertEquals(1, twentytest_absint(-1.0));
		$this->assertEquals(1, twentytest_absint("-1"));
		$this->assertEquals(1, twentytest_absint("-1.0"));
	}

	public function testSayShortcode() {
		$this->assertEquals("Someone say: \"This and that.\"", do_shortcode("[say]This and that.[/say]"));
		$this->assertEquals("I say: \"This and that.\"", do_shortcode("[say who='I']This and that.[/say]"));
	}

	public function testTwentytestDoSomthingAction() {
		global $twentytest_do_somthing;

		do_action('twentytest_do_somthing');

		$this->assertTrue($twentytest_do_somthing);
	}

	public function testSaySomthingFilter() {
		$actual = apply_filters('twentytest_say_somthing', 'This and that.', 'I');
		$this->assertEquals("I say: \"This and that.\"", $actual);

		$actual = apply_filters('twentytest_say_somthing', 'This and that.');
		$this->assertEquals("Someone say: \"This and that.\"", $actual);
	}
}