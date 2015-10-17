<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Xml\Worker\Transformer;

use Transfer\Worker\WorkerInterface;

class StringToSimpleXmlTransformer implements WorkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle($object)
    {
        return simplexml_load_string($object);
    }
}
