<?php
/**
 * MS SQL development environment config defaults
 */

/**
 * Application specific configuration
 */
$config[APP_NAME] = array(
	// Database config
	'database' => array(
		// Application database
		'default' => array(
			'datasource' => 'Database/Sqlserver',
			'persistent' => false,
			'host' => 'localhost',
			'login' => '',
			'password' => '',
			'database' => 'customer-name_project-name',
			'prefix' => '',
			'encoding' => PDO::SQLSRV_ENCODING_UTF8,
			'settings' => array(
				'DATEFORMAT' => 'ymd',
				'LANGUAGE' => 'us_english'
			),
		),
		// Test database
		'test' => array(
			'datasource' => 'Database/Sqlserver',
			'persistent' => false,
			'host' => 'localhost',
			'login' => '',
			'password' => '',
			'database' => 'cakephp_test',
			'prefix' => '',
			'encoding' => PDO::SQLSRV_ENCODING_UTF8,
			'settings' => array(
				'DATEFORMAT' => 'ymd',
				'LANGUAGE' => 'us_english'
			),
		),
	),
);
