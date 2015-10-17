<?php

/*
 * This file is part of Transfer.
 *
 * For the full copyright and license information, please view the LICENSE file located
 * in the root directory.
 */

namespace Transfer\Commons\Stream\Adapter;

use Transfer\Adapter\SourceAdapterInterface;
use Transfer\Adapter\TargetAdapterInterface;
use Transfer\Adapter\Transaction\Request;
use Transfer\Adapter\Transaction\Response;

class StreamAdapter implements SourceAdapterInterface, TargetAdapterInterface
{
    /**
     * @var resource Stream
     */
    private $stream;

    /**
     * @var bool Auto-close stream
     */
    private $autoClose;

    /**
     * @param resource $stream    Stream
     * @param bool     $autoClose Whether to auto-close stream
     */
    public function __construct($stream, $autoClose = true)
    {
        $this->stream = $stream;
        $this->autoClose = $autoClose;
    }

    /**
     * {@inheritdoc}
     */
    public function receive(Request $request)
    {
        return new Response(array(stream_get_contents($this->stream)));
    }

    /**
     * {@inheritdoc}
     */
    public function send(Request $request)
    {
        foreach ($request->getData() as $data) {
            fwrite($this->stream, $data);
        }

        return new Response();
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        if ($this->autoClose) {
            fclose($this->stream);
        }
    }
}
