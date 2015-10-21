<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Yaml\Worker\Transformer;

use Symfony\Component\Yaml\Dumper;
use Transfer\Worker\WorkerInterface;

class ArrayToYamlTransformer implements WorkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle($array)
    {
        if (!is_array($array)) {
            throw new \InvalidArgumentException(
                sprintf('Expected argument #1 to be of type string, got %s', gettype($array))
            );
        }
        $dumper = new Dumper();
        return $dumper->dump($array, 4, 4);
    }
}
