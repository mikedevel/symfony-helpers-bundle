MikedevsHelpersBundle
================

This bundle help you to increase application version.

### Setup

Install with
```composer require --dev mikedevelper/symfony-helpers-bundle```
and add configuration file

```
# config/dev/mikedevs_helpers.yaml
mikedevs_helpers:
   versioner:
       yml_path: "config/services.yaml"
       property_name: "version" 
```

```
yml_path > is path to file witch hold release version
property_name > release property name
```

Example of your config/services.yaml. Double quotes are required
```
parameters:
    version: "1.0.0"
```

### Available commands

```
#update patch version: es 1.0.0 => 1.0.1 (patch is default)
bin/console mikedevs:version:upgrade
bin/console mikedevs:version:upgrade patch

#minor #update minor version: es 1.2.16 => 1.3.0
bin/console mikedevs:version:upgrade minor

#major #update major version: es 1.2.16 => 2.0.0
bin/console mikedevs:version:upgrade mayor
```