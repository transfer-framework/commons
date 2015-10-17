<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Xml\Worker\Transformer;

use Transfer\Worker\WorkerInterface;

class SimpleXmlToStringTransformer implements WorkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle($object)
    {
        if (!$object instanceof \SimpleXMLElement) {
            throw new \InvalidArgumentException(
                sprintf('Expected argument #1 to be of type SimpleXMLElement, got %s', gettype($object))
            );
        }

        return $object->asXml();
    }
}
