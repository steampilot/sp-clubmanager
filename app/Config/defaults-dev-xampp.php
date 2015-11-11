<?php
/**
 * XAMPP development environment config defaults
 */

/**
 * Application specific configuration
 */
$config[APP_NAME] = array(
	// Database config
	'database' => array(
		// Application database
		'default' => array(
			'datasource' => 'Database/Mysql',
			'persistent' => false,
			'host' => 'localhost',
			'login' => 'root',
			'password' => '',
			'database' => 'customer-name_project-name',
			'prefix' => '',
			'encoding' => 'utf8',
		),
		// Test database
		'test' => array(
			'datasource' => 'Database/Mysql',
			'persistent' => false,
			'host' => 'localhost',
			'login' => 'root',
			'password' => '',
			'database' => 'cakephp_test',
			'prefix' => '',
			'encoding' => 'utf8',
		),
	),
);
