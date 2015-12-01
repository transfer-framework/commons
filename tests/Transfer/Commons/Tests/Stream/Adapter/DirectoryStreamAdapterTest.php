<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Stream\Adapter;

use Transfer\Adapter\Transaction\Request;
use Transfer\Commons\Stream\Adapter\DirectoryStreamAdapter;

class DirectoryStreamAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    public $path;

    /**
     * @var DirectoryStreamAdapter
     */
    public $adapter;

    public function setUp()
    {
        $this->path = __DIR__.'/../resources';
        $this->adapter = new DirectoryStreamAdapter($this->path);
        if (!file_exists($this->path)) {
            mkdir($this->path);
        }
    }

    public function testSendReceive()
    {
        $this->adapter->send(new Request(array(
            'file1.yml' => 'file1 data',
            'file2.txt' => 'file2 data',
        )));

        $response = $this->adapter->receive(new Request());

        $objects = iterator_to_array($response);

        $this->assertEquals('file1 data', $objects[0]);
        $this->assertEquals('file2 data', $objects[1]);

        $this->adapter = null;
    }
}
