<?php

/**
 * AllControllerTest class
 *
 * This test group will run all Controller tests.
 */
class AllControllerTest extends PHPUnit_Framework_TestSuite {

	/**
	 * Defines tests for this suite
	 *
	 * @return PHPUnit_Framework_TestSuite
	 */
	public static function suite() {
		$suite = new CakeTestSuite('All Controller tests');

		$path = APP_TEST_CASES . DS . 'Controller' . DS;

		//$suite->addTestFile($path . 'FooControllerTest.php');

		return $suite;
	}
}
