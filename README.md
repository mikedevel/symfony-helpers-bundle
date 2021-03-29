MikedevsHelpersBundle
================

This bundle help you to increase application version.

### Setup
Add to composer.json

```
"repositories": [
        {
            "type": "vcs",
            "url": "git@github.com:mikedevel/symfony-helpers-bundle.git"
        },
        ...
    ],
```
Then
```composer require --dev mikedevelper/symfony-helpers-bundle```

Add file ```config/dev/mikedevs_helpers.yaml```

and put 
```yaml
mikedevs_helpers:
   yml_path: "config/services.yaml" #path to file witch hold release version
   property_name: "version" #release property name
```


### Usage

For example in your service.yaml you have
```yaml
parameters:
    version: "1.0.0"
```

Run 
``` bin/console mikedevs:version:upgrade```

and your file will change into 1.0.1 and so on

```yaml
parameters:
    version: "1.0.1"
```
