<?php

// @codeCoverageIgnoreStart
App::uses('SeederShell', 'FakeSeeder.Console/Command');
// @codeCoverageIgnoreEnd

/**
 * Database Seeder Suite
 */
class DatabaseSeederShell extends SeederShell {

	/**
	 * Seeders to call in this suite, names without 'SeederShell' suffix
	 *
	 * @var array
	 */
	protected $_seeders = array(
	);
}
