<?php
/**
 * Set (optional) local configuration settings
 *
 * Rename to local.php within /path/to/datastore/config/.
 *
 * Normally only sensitive, non versioned settings, such as credentials, should be found here.
 */

// Initialize empty $config variable to prevent InvalidConfigurationException
$config = array();

// Default database connection
$config[APP_NAME]['database']['default']['database'] = 'steampilot_sp-manager';
$config[APP_NAME]['database']['default']['login'] = '';
$config[APP_NAME]['database']['default']['password'] = '';

// Test database connection
$config[APP_NAME]['database']['test']['login'] = 'steampilot_sp-manater_test';
$config[APP_NAME]['database']['test']['password'] = '';
$config[APP_NAME]['database']['test']['password'] = '';
