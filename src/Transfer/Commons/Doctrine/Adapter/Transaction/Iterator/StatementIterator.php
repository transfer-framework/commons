<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Doctrine\Adapter\Transaction\Iterator;

use Doctrine\DBAL\Driver\Statement;

class StatementIterator extends \ArrayIterator
{
    /**
     * @return array
     */
    public function current()
    {
        /** @var Statement $statement */
        $statement = parent::current();

        return $statement->fetchAll();
    }
}
