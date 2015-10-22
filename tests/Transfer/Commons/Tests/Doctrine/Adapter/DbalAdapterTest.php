<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Doctrine\Adapter;

use Doctrine\DBAL\DriverManager;
use Transfer\Adapter\Transaction\Request;
use Transfer\Commons\Doctrine\Adapter\DbalAdapter;

class DbalAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testHandle()
    {
        $connection = DriverManager::getConnection(array(
            'url' => 'sqlite://:memory:',
        ));

        $adapter = new DbalAdapter($connection);

        $request = new Request(array(
            'CREATE TABLE test_table(id int, name varchar(255))',
            'INSERT INTO test_table VALUES(1, "Test row")',
            'SELECT * FROM test_table',
        ));

        $response = $adapter->handle($request);

        $results = array();
        foreach ($response as $result) {
            $results[] = $result;
        }

        $this->assertEquals(array(), $results[0]);
        $this->assertEquals(array(), $results[1]);
        $this->assertEquals(
            array(
                array(
                    'id' => 1,
                    'name' => 'Test row',
                ),
            ),
            $results[2]
        );
    }
}
