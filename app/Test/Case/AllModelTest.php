<?php

/**
 * AllModelTest class
 *
 * This test group will run all Controller tests.
 */
class AllModelTest extends PHPUnit_Framework_TestSuite {

	/**
	 * Defines tests for this suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All Model tests');

		$path = APP_TEST_CASES . DS . 'Model' . DS;

		//$suite->addTestFile($path . 'FooModelTest.php');

		return $suite;
	}
}
