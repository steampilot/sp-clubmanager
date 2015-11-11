<?php

/**
 * ArraySourceFixture
 *
 * An abstract class for all array source based fixtures
 */
abstract class ArraySourceFixture extends CakeTestFixture {

	/**
	 * Use the array test datasource instead of the RDBMS bases one.
	 *
	 * @var string
	 * @todo Switch to 'testArray' once the problems with the Fixture handling are resolved
	 */
	public $useDbConfig = 'test';

}
