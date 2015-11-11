<?php

/**
 * AllControllersTest class
 *
 * This test group will run all View tests.
 */
class AllViewTest extends PHPUnit_Framework_TestSuite {

	/**
	 * Defines tests for this suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All View tests');

		$path = APP_TEST_CASES . DS . 'View' . DS;

		//$suite->addTestFile($path . 'Helper' . DS . 'FooHelperTest.php');

		return $suite;
	}
}
