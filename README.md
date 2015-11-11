[PROJECT_NAME]
================

[PROJECT_DESCRIPTION]

Releasing
---------

See the [release guide](RELEASING.md).

Installation
------------

See the [installation guide](INSTALLATION.md).

Development
-----------

- Checkout the [the project Subversion repository](http://devsrv1/svn/customer-name_project-name/trunk/).
- Open the system console
- Change to [application installation folder]/
- Run the Composer installation (including development dependencies) by running
  ``composer install``
- Refer to the [installation guide](INSTALLATION.md) for the various installation options.

Testing
-------

The unit tests can be executed by running
```` bash
php Console\cake.php test app AllAppTests --stderr --working .
````
in the app folder.

Create the code coverage report in HTML by running
```` bash
php Console\cake.php test app AllAppTests --stderr --working . --configuration .\phpunit-html-coverage.xml
````
in the app folder.

Coding Standard
---------------

This project adheres to the
[ORCA Services Coding Standard](http://devsrv1/dokuwiki/entwicklung/standards/coding_standard)
where possible.

Check the coding standard compliance by running
```` bash
composer check-codestyle
````

Issue Tracking
--------------

Issue tracking is done in [JIRA](https://orca-services.atlassian.net/projects/PROJECT_NAME).

Continuous Integration
----------------------

The continuous integration is done by [Jenkins](http://devsrv1:8080/job/PROJECT_NAME/).
