Releasing PROJECT-NAME
======================

Prerequisites
-------------

- A local copy of the application
- All changes committed to the Subversion repo trunk
- [Apache Ant](http://ant.apache.org/)
- [Subversion CLI client](https://subversion.apache.org/packages.html)
- Access to the [Subversion repo trunk](http://devsrv1/svn/customer-name_project-name/trunk/)
- [Composer](http://getcomposer.org/download)

The Release Process
-------------------

- Update the change log
- Bump the version number in the VERSION.txt
- Create a release zip file, see section below
- Optionally test the release zip file
- [Tag the revision](http://devsrv1/dokuwiki/entwicklung/anleitungen/svn_release_tag_erstellen)
- [Point the tag to an environment](http://devsrv1/dokuwiki/entwicklung/anleitungen/svn_release_tag_auf_environment_tag_kopieren?s%5B%5D=release)
- [Release version in JIRA](https://orca-services.atlassian.net/plugins/servlet/project-config/PROJECT-NAME/versions)
  and move still open issues from to be released version to the next version or unset them.
- Inform the customer

Create a Release Zip File
-------------------------

- Open the system console
- Change to [application installation folder]/
- Execute the build script by by running
  ``ant -f release.xml``
- Once successfully finished, you can find the release zip named project-name_[VERSION].zip
  in [application installation folder][/build/release/]
