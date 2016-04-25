Yaml
===

Workers
-------

### YamlToArrayTransformer

This worker transforms a yaml string into an array.

Usage example in procedure builder:

```php    
use Transfer\Procedure\ProcedureBuilder;
use Transfer\Commons\Yaml\Worker\Transformer\YamlToArrayTransformer;

$builder = new ProcedureBuilder();

$builder
    ->addSource(function () {
        return new Response(array(
            file_get_contents('/path/to/file.yml')
        ));
    })
    ->addWorker(new YamlToArrayTransformer())
;
```  

### ArrayToYamlTransformer

This worker transforms an array into a yaml string.

Usage example in procedure builder:

```php

use Transfer\Procedure\ProcedureBuilder;
use Transfer\Commons\Yaml\Worker\Transformer\ArrayToYamlTransformer;

$builder = new ProcedureBuilder();

$builder
    ->addSource(function () {
        return new Response(array(
            array(
                'toplevel' => array(
                    'secondlevel1' => 'Content',
                    'secondlevel2' => array(
                        'thirdlevel1',
                    ),
                ),
            )
        );
    })
    ->addWorker(new ArrayToYamlTransformer())
;
```
