<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Yaml\Worker\Transformer;

use Transfer\Commons\Yaml\Worker\Transformer\YamlToArrayTransformer;

class YamlToArrayTransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @var YamlToArrayTransformer */
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new YamlToArrayTransformer();
    }

    public function testHandle()
    {
        $yml = <<<'CDATA'
level1:
    level2_1: "Value2_1"
    level2_2:
        - Value3_1
        - Value3_2
    level2_3: "Value2_3"
CDATA;

        $object = $this->transformer->handle($yml);
        $this->assertInternalType('array', $object);
        $this->assertArrayHasKey('level1', $object);
        $level1 = $object['level1'];
        $this->assertInternalType('array', $level1);
        $this->assertArrayHasKey('level2_1', $level1);
        $this->assertEquals('Value2_1', $level1['level2_1']);
        $this->assertArrayHasKey('level2_2', $level1);
        $level2_2 = $level1['level2_2'];
        $this->assertInternalType('array', $level2_2);
        $this->assertArrayHasKey(0, $level2_2);
        $this->assertEquals('Value3_1', $level2_2[0]);
        $this->assertArrayHasKey(1, $level2_2);
        $this->assertEquals('Value3_2', $level2_2[1]);
        $this->assertArrayHasKey('level2_3', $level1);
        $this->assertEquals('Value2_3', $level1['level2_3']);
    }

    public function testHandleWithInvalidObject()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->transformer->handle(null);
    }
}
