<?php
/**
 * Application model for CakePHP.
 *
 * This file is application-wide model file. You can put all
 * application-wide model-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
// @codeCoverageIgnoreStart
App::uses('Model', 'Model');
App::uses('FireCake', 'DebugKit.Lib');
// @codeCoverageIgnoreEnd

/**
 * Application model for Cake.
 *
 * Add your application-wide methods in the class below, your models
 * will inherit them.
 *
 * @package       app.Model
 * @SuppressWarnings(PHPMD.NumberOfChildren)
 */
class AppModel extends Model {

	/**
	 * Set default recursiveness to -1
	 *
	 * @var int
	 */
	public $recursive = -1;

	/**
	 * Default behaviors
	 *
	 * - Containable
	 * - WhoDidIt saves created_by and/or modified_by
	 * - Search.Searchable makes the data searchable by the Search plugin
	 *
	 * @var array
	 */
	public $actsAs = array(
		'Containable',
		'WhoDidIt' => array('force_modified' => true),
	);

}
