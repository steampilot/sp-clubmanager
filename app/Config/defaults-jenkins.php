<?php
/**
 * Jenkins CI environment config defaults
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
			'login' => 'jenkins',
			'password' => 'jenkins',
			'database' => 'jenkins_customer-name_project-name',
			'prefix' => '',
			'encoding' => 'utf8',
		),
		// Test database
		'test' => array(
			'datasource' => 'Database/Mysql',
			'persistent' => false,
			'host' => 'localhost',
			'login' => 'jenkins',
			'password' => 'jenkins',
			'database' => 'jenkins_customer-name_project-name-test',
			'prefix' => '',
			'encoding' => 'utf8',
		),
	),
);
