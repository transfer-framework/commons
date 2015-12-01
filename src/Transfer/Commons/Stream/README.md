Stream
======

Adapters
--------

### StreamAdapter

This adapter reads from and writes to streams.
 
#### Initialization

The adapter has to be initialized with an already open stream:
    
    <?php
    
    use Transfer\Commons\Stream\Adapter\StreamAdapter;

    $adapter = new StreamAdapter(fopen('filename.txt'));
    
Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    use Transfer\Commons\Stream\Adapter\StreamAdapter;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(new StreamAdapter(fopen('filename.txt')))
    ;

### DirectoryStreamAdapter

This adapter read files from directory and writes files to a directory.
 
#### Initialization

The adapter has to be initialized with an already open stream:
    
    <?php
    
    use Transfer\Commons\Stream\Adapter\DirectoryStreamAdapter;

    $adapter = new DirectoryStreamAdapter('path/to/directory');
    
Usage example in procedure builder:

    <?php
    
    use Transfer\Procedure\ProcedureBuilder;
    use Transfer\Commons\Stream\Adapter\DirectoryStreamAdapter;
    
    $builder = new ProcedureBuilder();
    
    $builder
        ->addSource(new DirectoryStreamAdapter('path/to/directory'))
    ;
