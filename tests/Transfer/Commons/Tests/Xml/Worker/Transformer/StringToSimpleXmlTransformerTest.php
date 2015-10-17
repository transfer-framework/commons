<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Xml\Worker\Transformer;

use Transfer\Commons\Xml\Worker\Transformer\StringToSimpleXmlTransformer;

class StringToSimpleXmlTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testHandle()
    {
        $transformer = new StringToSimpleXmlTransformer();

        $object = $transformer->handle('<root><test></test></root>');

        $this->assertInstanceOf('\SimpleXMLElement', $object);
    }
}
