<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Xml\Worker\Transformer;

use Transfer\Commons\Xml\Worker\Transformer\SimpleXmlToStringTransformer;

class SimpleXmlToStringTransformerTest extends \PHPUnit_Framework_TestCase
{
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new SimpleXmlToStringTransformer();
    }

    public function testHandle()
    {
        $xml = <<<'XML'
<?xml version="1.0"?>
<root><element/></root>

XML;

        $object = $this->transformer->handle(simplexml_load_string($xml));

        $this->assertInternalType('string', $object);
        $this->assertEquals($xml, $object);
    }

    public function testHandleWithInvalidObject()
    {
        $this->setExpectedException('\InvalidArgumentException');

        $this->transformer->handle(null);
    }
}
