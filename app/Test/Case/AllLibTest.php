<?php

/**
 * AllLibTest class
 *
 * This test group will run all Lib tests.
 */
class AllLibTest extends PHPUnit_Framework_TestSuite {

	/**
	 * Defines tests for this suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All Lib tests');

		$suite->addTestDirectory(APP_TEST_CASES . DS . 'Lib');

		//$suite->addTestFile($path . 'FooLibTest.php');

		return $suite;
	}
}
