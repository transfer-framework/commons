<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Doctrine\Adapter;

use Doctrine\DBAL\Connection;
use Transfer\Adapter\NonDirectionalAdapter;
use Transfer\Adapter\Transaction\Request;
use Transfer\Adapter\Transaction\Response;
use Transfer\Commons\Doctrine\Adapter\Transaction\Iterator\StatementIterator;

class DbalAdapter extends NonDirectionalAdapter
{
    /**
     * @var Connection Doctrine DBAL connection
     */
    private $connection;

    /**
     * @param Connection $connection Connection
     */
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(Request $request)
    {
        $statements = array();

        foreach ($request as $queries) {
            $queries = (array) $queries;

            foreach ($queries as $query) {
                $statements[] = $this->connection->executeQuery($query);
            }
        }

        return new Response(new StatementIterator($statements));
    }
}
