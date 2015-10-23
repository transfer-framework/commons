<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Xml\Worker\Transformer;

use Transfer\Commons\Json\Worker\Transformer\ArrayToJsonStringTransformer;

class ArrayToJsonStringTransformerTest extends \PHPUnit_Framework_TestCase
{
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new ArrayToJsonStringTransformer();
    }

    public function testHandle()
    {
        $array = array('a' => 1);
        $object = $this->transformer->handle($array);

        $this->assertInternalType('string', $object);
    }

    public function testHandleWithInvalidObject()
    {
        $this->setExpectedException('\InvalidArgumentException');

        $this->transformer->handle(null);
    }
}
