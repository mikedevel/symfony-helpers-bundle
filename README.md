MikedevsHelpersBundle
================

This bundle help you to increase application version.

### Setup
Add file ```config/services.yaml```

and put 

```yaml
mikedevs_versioner:
   yml_path: "config/services.yaml" #path to file witch hold release version
   property_name: "version" #release property name
```

For example in your service.yaml you have

```yaml
parameters:
    version: "1.0.0"
```

### Usage
Run 
``` bin/console mikedevs:version:upgrade```

and your file will change into 1.0.1 and so on

```yaml
parameters:
    version: "1.0.1"
```
