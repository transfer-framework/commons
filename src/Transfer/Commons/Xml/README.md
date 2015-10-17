XML
===

Workers
-------

### StringToSimpleXmlTransformer

This worker transforms a string into a `SimpleXMLElement` object.

Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(function () {
            return new Response(array(
                '<root><element>Element value</element></root>'
            ));
        })
        ->addWorker(new StringToSimpleXmlTransformer())
    ;
    
### SimpleXmlToStringTransformer

This worker transforms a `SimpleXMLElement` object into a string.

Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(function () {
            return new Response(array(
                simplexml_load_string('<root><element>Element value</element></root>')
            ));
        })
        ->addWorker(new SimpleXmlToStringTransformer())
    ;
    
