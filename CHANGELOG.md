# CHANGELOG

2026-10-26, v1.0.2
------------------

* Stop ignoring composer.lock so dependency versions can be tracked and development environments can use reproducible dependency installations.
* Exclude composer.lock from Git archive exports using .gitattributes.
* Remove the manually specified version from composer.json, allowing Composer to determine the package version from the package metadata.

2026-10-20, v1.0.1
------------------

* Review Composer dependency constraints and update development dependencies as needed.
* Improve dependency update management with Dependabot.

2018-09-25, v1.0.0
-----------------

* Initial Version
