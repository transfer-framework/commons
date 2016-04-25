Doctrine
========

Adapters
--------

### DbalAdapter

This adapters handles SQL statements by passing these to Doctrine DBAL.

Usage example in procedure builder as target:

```php
use Transfer\Procedure\ProcedureBuilder;
use Transfer\Commons\Doctrine\Adapter\DbalAdapter;

$builder = new ProcedureBuilder();

$builder
    ->addSource(function () {
        return new Response(array(
            'CREATE TABLE test_table(id int, name varchar(255))',
            'INSERT INTO test_table VALUES(1, "Test row")',
        ));
    })
    ->addTarget(new DbalAdapter(
        DriverManager::getConnection(array('url' => 'sqlite://:memory:'))
    ))
;
```  

As source:

```php
use Transfer\Procedure\ProcedureBuilder;
use Transfer\Commons\Doctrine\Adapter\DbalAdapter;

$builder
    ->addSource(
        new DbalAdapter(
            DriverManager::getConnection(array('url' => 'sqlite://:memory:'))
        ),
        new Request(array(
            'SELECT * FROM test_table',
        ))
    )
;
```
