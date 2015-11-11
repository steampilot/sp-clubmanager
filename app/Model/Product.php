<?php
App::uses('AppModel', 'Model');

/**
 * Product Model
 *
 */
class Product extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'name';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'id' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				'message' => 'The ID shall not be tempered with',
				//'allowEmpty' => false,
				//'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'The ID can not be blank',
			),
		),
		'name' => array(
			'lengthBetween' => array(
				'rule' => array('lengthBetween', 3, 45),
				'message' => 'Name must be between 3 and 45 characters long',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'The name can not be blank',
			),
		),
		'available' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				'message' => 'Incorrect value for is available checkbox',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
