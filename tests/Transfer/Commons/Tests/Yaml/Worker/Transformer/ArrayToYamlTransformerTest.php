<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Tests\Yaml\Worker\Transformer;

use Transfer\Commons\Yaml\Worker\Transformer\ArrayToYamlTransformer;

class ArrayToYamlTransformerTest extends \PHPUnit_Framework_TestCase
{
    /** @var ArrayToYamlTransformer */
    protected $transformer;

    protected function setUp()
    {
        $this->transformer = new ArrayToYamlTransformer();
    }

    public function testHandle()
    {
        $array = array(
            'level1' => array(
                'level2_1' => 'Value2_1',
                'level2_2'    => array(
                    'level3_1',
                    'level3_2',
                ),
                'level3_3' => 'Value3_3',
            ),
        );

        $object = $this->transformer->handle($array);
        $this->assertInternalType('string', $object);
    }

    public function testHandleWithInvalidObject()
    {
        $this->setExpectedException('\InvalidArgumentException');
        $this->transformer->handle(null);
    }
}
