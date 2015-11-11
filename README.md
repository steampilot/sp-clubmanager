SP-ClubManager
================

Simple small CakePHP application to manage a small sports club.

Releasing
---------

See the [release guide](RELEASING.md).

Installation
------------

See the [installation guide](INSTALLATION.md).

Development
-----------

- Checkout the [the GitHub project repository](https://github.com/steampilot/sp-clubmanager).
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
[ORCA Services Coding Standard](http://www.orca-services.ch)
where possible.

Check the coding standard compliance by running
```` bash
composer check-codestyle
````

Issue Tracking
--------------

Issue tracking is done in [GitHub](https://github.com/steampilot/sp-clubmanager/issues).

Continuous Integration
----------------------

The continuous integration is done by [TravisCI](https://travis-ci.org/steampilot/sp-clubmanager).
