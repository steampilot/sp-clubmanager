<?php

/**
 * A test case to build on for controllers
 *
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
abstract class AppControllerTestCase extends ControllerTestCase {

	/**
	 * The name of the controller under test
	 *
	 * @var null|string
	 */
	protected $_controllerName = null;

	/**
	 * Test AJAX controller actions
	 *
	 * @param string $url The URL to test.
	 * @param array $options See options.
	 * @return mixed The specified return type.
	 * @see ControllerTestCase::_testAction
	 * @link http://stackoverflow.com/questions/8182278/testing-ajax-request-in-cakephp-2-0
	 * @SuppressWarnings(PHPMD.Superglobals)
	 */
	protected function _testAjaxAction($url, $options = array()) {
		$_SERVER['HTTP_X_REQUESTED_WITH'] = 'XMLHttpRequest';
		return $this->testAction($url, $options);
	}

	/**
	 * Assert that a slice of a given array equals a given array
	 *
	 * @param array $expected The expected array slice.
	 * @param array $array The full array.
	 * @param int $offset The offset, starting with zero.
	 * @param int $length The amount of array slices. Defaults to one.
	 * @param bool $preserveKeys Whether to preserve the keys of the array slice. Defaults to true.
	 * @return void
	 * @see http://php.net/manual/en/function.array-slice.php array_slice
	 */
	public function assertArraySliceEquals(array $expected, array $array, $offset, $length = 1, $preserveKeys = true) {
		$arraySlice = array_slice($array, $offset, $length, $preserveKeys);
		$this->assertEquals($expected, $arraySlice);
	}

	/**
	 * Assert that one record exists for a given model with given conditions
	 *
	 * @param string $modelName The name of the model.
	 * @param array $conditions The conditions array.
	 * @return void
	 */
	public function assertRecordExistsByConditions($modelName, $conditions) {
		$this->assertCountByConditions(1, $modelName, $conditions);
	}

	/**
	 * Assert the record count for a given model with given conditions
	 *
	 * @param int $expectedCount The expected record count.
	 * @param string $modelName The name of the model.
	 * @param array $conditions The conditions array.
	 * @return void
	 */
	public function assertCountByConditions($expectedCount, $modelName, $conditions) {
		$model = ClassRegistry::init($modelName);
		$this->assertEquals($expectedCount, $model->find('count', array(
			'conditions' => $conditions
		)));
	}
}
