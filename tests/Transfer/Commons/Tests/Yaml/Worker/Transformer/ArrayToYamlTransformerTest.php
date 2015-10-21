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
            'frontpage' => array(
                'main_group_identifier' => 'Content',
                'contenttype_groups' => array(
                    'Content',
                ),
                'main_language_code' => 'eng-GB',
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
