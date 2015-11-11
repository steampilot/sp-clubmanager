Releasing SP-ClubManager
======================

Prerequisites
-------------

- A local copy of the application
- All changes committed to the Subversion repo trunk
- [Apache Ant](http://ant.apache.org/)
- [Subversion CLI client](https://subversion.apache.org/packages.html)
- Access to the [GitHub repo](https://github.com/steampilot/sp-clubmanager)
- [Composer](http://getcomposer.org/download)

The Release Process
-------------------

- Update the change log
- Bump the version number in the VERSION.txt
- Create a release zip file, see section below
- Optionally test the release zip file
- [Tag the revision](https://help.github.com/articles/working-with-tags/)
- [Point the tag to an environment](#)
- [Release version in Via GitHub](https://help.github.com/articles/creating-releases/)
  and move still open issues from to be released version to the next version or unset them.
- Inform the customer

Create a Release Zip File
-------------------------

- Open the system console
- Change to [application installation folder]/
- Execute the build script by by running
  ``ant -f release.xml``
- Once successfully finished, you can find the release zip named sp-clubmanager_[VERSION].zip
  in [application installation folder][/build/release/]
