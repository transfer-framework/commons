<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Stream\Adapter;

use Transfer\Adapter\Transaction\Request;
use Transfer\Commons\Stream\Adapter\StreamAdapter;

class StreamAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var resource
     */
    public $stream;

    /**
     * @var StreamAdapter
     */
    public $adapter;

    public static function setUpBeforeClass()
    {
        stream_wrapper_register('mock', 'Transfer\Commons\Tests\Stream\Adapter\MockStream');
    }

    public static function tearDownAfterClass()
    {
        stream_wrapper_unregister('mock');
    }

    public function setUp()
    {
        $this->stream = fopen('mock://test', null, false, stream_context_create(array(
            'mock' => array(),
        )));

        $this->adapter = new StreamAdapter($this->stream);
    }

    public function testSendReceive()
    {
        $this->adapter->send(new Request(array(
            'test',
        )));

        $response = $this->adapter->receive(new Request());

        $objects = iterator_to_array($response);

        $this->assertEquals('test', $objects[0]);

        $this->adapter = null;
    }
}
