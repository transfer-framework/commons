<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Yaml\Worker\Transformer;

use Symfony\Component\Yaml\Parser;
use Transfer\Data\ValueObject;
use Transfer\Worker\WorkerInterface;

class YamlToArrayTransformer implements WorkerInterface
{
    /**
     * {@inheritdoc}
     */
    public function handle($yaml)
    {
        if ($yaml instanceof ValueObject) {
            $yaml = $yaml->data;
        }
        if (!is_string($yaml)) {
            throw new \InvalidArgumentException(
                sprintf('Expected argument #1 to be of type string, got %s', gettype($yaml))
            );
        }

        $parser = new Parser();

        return $parser->parse($yaml);
    }
}
