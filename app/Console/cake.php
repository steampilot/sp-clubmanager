#!/usr/bin/php -q
<?php
/**
 * Command-line code generation utility to automate programmer chores.
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
 * @package       app.Console
 * @since         CakePHP(tm) v 2.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

$dispatcher = 'Cake' . DS . 'Console' . DS . 'ShellDispatcher.php';

if (function_exists('ini_set')) {
	$root = dirname(dirname(dirname(__FILE__))) . DS . 'vendor' . DS . 'cakephp';

	// the following line differs from its sibling
	// /lib/Cake/Console/Templates/skel/Console/cake.php
	ini_set('include_path', $root . DS . 'cakephp' . DS . 'lib' . PATH_SEPARATOR . ini_get('include_path'));
}

define('TMP', dirname(dirname(dirname(__FILE__))) . DS . 'data' . DS . 'tmp' . DS);
define('WWW_ROOT', dirname(dirname(dirname(__FILE__))) . DS . 'webroot' . DS);

if (!include $dispatcher) {
	trigger_error('Could not locate CakePHP core files.', E_USER_ERROR);
}
unset($dispatcher, $root);

return ShellDispatcher::run($argv);
