<?php

/**
 * Include the Composer autoloader
 */
require APP . '../vendor/autoload.php';

// Remove and re-prepend CakePHP's autoloader as composer thinks it is the most important.
// See https://github.com/composer/composer/commit/c80cb76b9b5082ecc3e5b53b1050f76bb27b127b
spl_autoload_unregister(array('App', 'load'));
spl_autoload_register(array('App', 'load'), true, true);

/*
 * Set application name
 */
define('APP_NAME', 'APP-NAME');

/*
 * Load/setup app specific config settings
 *
 * The application supports three levels of configuration settings:
 * 1. Global defaults in app/Config/defaults.php
 * 2. Environment specific defaults in app/Config/defaults-{$env}.php
 * 3. Optional local settings in /path/to/datastore/config/local.php
 *
 * The name of the environment ($env) must be set in
 * /path/to/datastore/config/environment.php.
 *
 * The path to the datastore can be set by either setting an environment
 * variable named [APP_NAME]_DATASTORE or by setting the path in
 * app/Config/datastore.php (needs to be created),
 * which overwrites the environment variable.
 * If the path was not set, it will fall back to application_folder/data.
 *
 * The datastore folder structure will be created automatically
 * if it does not exists in debug mode only by copying the structure
 * from app/Config/templates/datastore to the set datastore path.
 */

App::uses('Folder', 'Utility');

// Set Debugmode
Configure::write('debug', 1);

// Load the global default config settings
// Define the default/fallback datastore folder as application_folder/data
Configure::load('defaults');

// If a datastore.php exists, overwrite the datastore folder location
if (file_exists(APP . 'Config' . DS . 'datastore.php')) {
	$datastorePath = include APP . 'Config' . DS . 'datastore.php';
}

// Alternatively read the '[APP_NAME]_DATASTORE' environment variable
if (empty($datastorePath)) {
	$datastorePath = env(APP_NAME . '_DATASTORE');
}

// If the datastore path was set by datastore.php OR the environment variable
if (!empty($datastorePath)) {
	Configure::write(APP_NAME . '.datastore', Folder::slashTerm($datastorePath));
}

// Build datastore paths
$datastorePath = Folder::slashTerm(Configure::read(APP_NAME . '.datastore'));
$datastoreConfig = $datastorePath . 'config' . DS;
$datastoreFiles = $datastorePath . 'files' . DS;
$datastoreLogs = $datastorePath . 'logs' . DS;
$datastoreTmp = $datastorePath . 'tmp' . DS;
$datastoreCache = $datastoreTmp . 'cache' . DS;
$datastoreSessions = $datastoreTmp . 'sessions' . DS;

// Reset Cache, logging and Session paths accordingly
Configure::write('Cache.default.path', $datastoreCache);
Configure::write('Cache.core.path', $datastoreCache . 'persistent' . DS);
Configure::write('Cache.model.path', $datastoreCache . 'models' . DS);
Configure::write('Session.ini',
	Hash::merge(
		Configure::read('Session.ini'),
		array('session.save_path' => $datastoreSessions)
	)
);
Configure::write(APP_NAME . '.logging.debug.path', $datastoreLogs);
Configure::write(APP_NAME . '.logging.error.path', $datastoreLogs);

// Ignore datastore when using the AppSetup shell
if (
	php_sapi_name() == "cli" &&
	(
		in_array('orca_app_setup.app_setup', env('argv')) ||
		in_array('orca_app_setup.AppSetup', env('argv')) ||
		in_array('OrcaAppSetup.app_setup', env('argv')) ||
		in_array('OrcaAppSetup.AppSetup', env('argv'))
	)
) {
	return true;
}

// Check if the datastore folder exists, if not, create the full structure
if (!file_exists($datastorePath)) {
	// Only auto-create it when in debug mode
	if (!Configure::read('debug')) {
		die(__('Datastore folder does not exist at %s',
			$datastorePath
		));
	}

	try {
		// Copy datastore folder structure from template structure
		$datastoreTemplate = new Folder(APP . 'Config' . DS . 'templates' . DS . 'datastore');
		$datastoreTemplate->copy(array(
			'to' => $datastorePath,
			'mode' => 0755,
		));
	} catch (Exception $e) {
		die(__('Could not create datastore folder structure at %s',
			$datastorePath
		));
	}

	if (!file_exists($datastorePath)) {
		die(__('Could not create datastore at ' . $datastorePath));
	}

	die(__(
		'Missing datastore folder structure automatically created. ' .
		'Please setup local configuration at ' . $datastoreConfig
	));
}

// Setup datastore configuration reader
Configure::config('datastore', new PhpReader($datastoreConfig));

// Read environment name to load environment specific defaults
$envFile = $datastoreConfig . 'environment.php';
if (!file_exists($envFile)) {
	die(__('No environment config file found at %s', $envFile));
}
Configure::load('environment', 'datastore');
$env = Configure::read(APP_NAME . '.environment');
if (empty($env)) {
	die(__('No environment name set in %s', $envFile));
}

// Load the environment specific default settings
$envDefaultsFile = APP . 'Config' . DS . "defaults-{$env}.php";
if (!file_exists($envDefaultsFile)) {
	die(__('No environment specific defaults found for "%s" at %s.', $env, $envDefaultsFile));
}
Configure::load("defaults-{$env}", 'default');

// Load the optional local configuration settings, e.g. credentials
if (file_exists($datastoreConfig . 'local.php')) {
	Configure::load('local', 'datastore');
}

/*
 * Setup framework & application functionality based on loaded settings
 */

// Enable Admin Routing


// Setup cache config
Cache::config('default', Configure::read('Cache.default'));
Cache::config('_cake_model_', Configure::read('Cache.model'));
Cache::config('_cake_core_', Configure::read('Cache.core'));
