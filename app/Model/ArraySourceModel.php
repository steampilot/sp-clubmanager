<?php

// @codeCoverageIgnoreStart
App::uses('AppModel', 'Model');
// @codeCoverageIgnoreEnd

/**
 * ArraySource Model
 *
 * A common class for ArraySource based models.
 *
 * @codeCoverageIgnore
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class ArraySourceModel extends AppModel {

	/**
	 * This is a array based memory data table
	 *
	 * @var string
	 */
	public $useDbConfig = 'array';

	/**
	 * This is a memory only data table
	 *
	 * @var bool
	 */
	public $useTable = false;

	/**
	 * Cache queries within a single request
	 *
	 * Since the data is a static memory table it can be easily cached.
	 *
	 * @var bool
	 */
	public $cacheQueries = true;

}
