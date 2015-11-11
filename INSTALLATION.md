HOW TO INSTALL
==============

Prerequisites
-------------

- All of the application system requirements are complied
- At least one database setup for the application, eg. [application_name]
- Optionally one database setup for the test scripts, eg. [application_name]_test
- The release zip file has already been downloaded

Fresh Installation
------------------

Install Application:

- Extract the release zip file, e.g. ``project-name_[VERSION_NAME].zip``, to the destination of your choice

Environment Setup:

- Either set the [application_name]_DATASTORE" environment variable
  to the datastore path of your choice
  or copy the ``datastore.php`` file at
  ``[application installation folder]/app/Config/templates/``
  to ``[application installation folder]/app/Config/``
  and set the path within accordingly
- If you chose the environment variable, you must
	- Restart your web server, as it needs to recognise the new environment variable
	- Reopen any system console, as it needs to recognise the new environment variable
	- If you are using IIS, you must restart the whole system
  	as IIS doesn't recognise changes to the environment!

Install the Datastore:

- Copy the datastore template folder structure from
  ``[application installation folder]/app/Config/templates/datastore``
  to the path you've set in the environment variable
  or ``datastore.php`` respectively
- Make sure the datastore folder is writable for the web server
  and the console shell

Local configuration:

- Rename the ``example-environment.php`` in
  ``[datastore path]/config/`` to ``environment.php``
  and set the name of the environment accordingly
- Rename the ``example-local.php`` in
  ``[datastore path]/config/`` to ``local.php``
  and set local environment config, e.g. the Database credentials,
  if needed

Database migration:

- Open the system console
- Change to ``[application installation folder]/app/``
- Execute the schema migrations by running
  ``php Console/cake.php Migrations.migration run all --working .``
- Verify the schema migrations by running
  ``php Console/cake.php Migrations.migration status --working .``

The application is now installed and ready to use.

Update Installation
-------------------

Backup:

- Backup the current application folder
- Backup the current database
- Backup the current datastore folder

Update the Application:

- Replace the current application folder
  by extracting the new release zip file over the old one,
  may be rename the old one first

Update the Datastore:

- If necessary, adjust the application datastore folder structure according
  to the datastore template folder structure template from
  ``[application installation folder]/app/Config/templates/datastore/``

Update the Local Config:

- If necessary, adjust the local configuration settings in
  the ``environment.php`` and ``local.php`` within
  ``[datastore path]/config/`` according to the examples in
  ``[application installation folder]/app/Config/templates/config``

Reset Cache:

- If necessary, clear all caches by running
  ``php Console/cake.php ClearCache.clear_cache --working .``
  from within ``[application installation folder]/app/``

Database migration:

- Open the system console
- Change to ``[application installation folder]/app/``
- Execute the schema migrations by running
  ``php Console/cake.php Migrations.migration run all --working .``
- Verify the schema migrations by running
  ``php Console/cake.php Migrations.migration status --working .``

The application is now updated and ready to use.

Troubleshooting
---------------

If the application doesn't work...

- Make sure the environment variable is set correctly
- Make sure the datastore folder is writable for the web server
- Make sure that your your local configuration settings don't overwrite each other,
  if you have more than one configuration file at ``[datastore path]/config/``
- Clear all caches by removing all cache files manually
  (but not folders) within ``[datastore path]/tmp/cache/``
- Check your database configuration
- If nothing helps, activate the debug mode in your local
  configuration at ``[datastore path]/config/``
  by not setting it to 0
