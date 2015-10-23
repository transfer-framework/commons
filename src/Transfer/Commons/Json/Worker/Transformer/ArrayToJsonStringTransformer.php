<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Json\Worker\Transformer;

use Transfer\Worker\WorkerInterface;

class ArrayToJsonStringTransformer implements WorkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle($object)
    {
        if (!is_array($object)) {
            throw new \InvalidArgumentException(
                sprintf('Expected argument #1 to be of type array, got %s', gettype($object))
            );
        }

        return json_encode($object);
    }
}
