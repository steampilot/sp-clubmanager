<?php
/**
 * Global default config settings
 *
 * Sets the common configuration shared by most environments.
 * Can be either overridden by environment specific default settings in
 * (/app/Config/defaults-{$env}.php)
 * or local environment settings in
 * /path/to/datastore/config/local.php
 *
 * Should set non-fatal default values, thus no production settings.
 */

// Setup fallback datastore location
$datastore = ROOT . DS . 'data' . DS;
$datastoreLogs = $datastore . 'logs' . DS;
$datastoreTmp = $datastore . 'tmp' . DS;
$datastoreCache = $datastoreTmp . 'cache' . DS;
$datastoreSessions = $datastoreTmp . 'sessions' . DS;

$appPrefix = strtolower(APP_NAME);

// Enable the debug mode
$config['debug'] = 2;

// General config
$config['Config'] = array(
	'timezone' => 'Europe/Paris',
	'language' => 'eng',
);

// Security related
$config['Security'] = array(
	'salt' => 'DY52453b73bw3t613637k59usu67FgaC9mi',
	'cipherSeed' => '763393096564684652232496749683645',
);

// Error & Exception
$config['Exception'] = array(
	'handler' => 'ErrorHandler::handleException',
	'renderer' => 'ExceptionRenderer',
	'log' => true,
);
$config['Error'] =  array(
	'handler' => 'ErrorHandler::handleError',
	'level' => E_ALL & ~E_DEPRECATED,
	'trace' => true,
);

// Caching
$config['Cache'] = array(
	'default' => array(
		'engine' => 'File',
		'path' => $datastoreCache,
		'serialize' => true,
		'duration' => '+10 seconds',
	),
	'core' => array(
		'engine' => 'File',
		'prefix' => $appPrefix . '_cake_core_',
		'path' => $datastoreCache . 'persistent' . DS,
		'serialize' => true,
		'duration' => '+10 seconds',
	),
	'model' => array(
		'engine' => 'File',
		'prefix' => $appPrefix . '_cake_model_',
		'path' => $datastoreCache . 'models' . DS,
		'serialize' => true,
		'duration' => '+10 seconds',
	),
);

// Session setup
$config['Session'] = array(
	'defaults' => 'php',
	'checkAgent' => false,
	'cookie' => APP_NAME,
	'timeout' => 40320, // 4 weeks = 4 * 7 * 24 * 60
	'ini' => array(
		'session.save_path' => $datastoreSessions,
	)
);

// General app settings
$config['App'] = array(
	'encoding' => 'UTF-8',
);

// Read the app version number
$versionFile = file(APP . 'Config' . DS . 'VERSION.txt');

// Application specific configuration
$config[APP_NAME] = array(
	// Version number
	'version' => trim(array_pop($versionFile)),

	// Database config
	'database' => array(
		// Application database, needs to bet set by the local environment config
		'default' => array(),
		// Test database, needs to bet set by the local environment config
		'test' => array(),
	),

	// Disable logging to the database
	'logging' => array(
		'debug' => array(
			'engine' => 'File',
			'types' => array('notice', 'info', 'debug'),
			'path' => $datastoreLogs,
			'file' => 'debug',
		),
		'error' => array(
			'engine' => 'File',
			'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
			'path' => $datastoreLogs,
			'file' => 'error',
		),
		'database' => null,
	),

	// App datastore
	'datastore' => $datastore,

	// Feature flags
	'Features' => array(
		'FeatureName' => false,
	),
);
