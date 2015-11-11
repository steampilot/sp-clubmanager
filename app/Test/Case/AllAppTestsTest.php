<?php

/**
 * AllTests class
 *
 * This test group will run all app tests.
 */
class AllAppTests extends PHPUnit_Framework_TestSuite {

	/**
	 * Define the tests for this suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite() {
		$suite = new PHPUnit_Framework_TestSuite('All App Tests');

		$path = APP_TEST_CASES . DS;

		$suite->addTestFile($path . 'AllLibTest.php');
		$suite->addTestFile($path . 'AllModelTest.php');
		$suite->addTestFile($path . 'AllControllerTest.php');
		$suite->addTestFile($path . 'AllViewTest.php');

		return $suite;
	}
}
