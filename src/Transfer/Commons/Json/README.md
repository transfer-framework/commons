JSON
====

Workers
-------

### JsonStringToArrayTransformer

This worker transforms a JSON string into an array.

Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    use Transfer\Commons\Json\Worker\Transformer\JsonStringToArrayTransformer;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(function () {
            return new Response(array(
                '{"a": "1"}'
            ));
        })
        ->addWorker(new JsonStringToArrayTransformer())
    ;
    

### ArrayToJsonStringTransformer

This worker transforms an array into a JSON string.

Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    use Transfer\Commons\Json\Worker\Transformer\ArrayToJsonStringTransformer;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(function () {
            return new Response(array(
                array(
                    'a' => 1
                )
            );
        })
        ->addWorker(new ArrayToJsonStringTransformer())
    ;
