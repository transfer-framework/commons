<?php

namespace Transfer\Commons\Tests\Stream\Adapter;

class MockStream
{
    private $data = null;

    public function stream_open()
    {
        return true;
    }

    public function stream_stat()
    {
        return array();
    }

    public function stream_read()
    {
        static $called;

        if (!$called) {
            $called = true;

            return $this->data;
        }

        return;
    }

    public function stream_write($data)
    {
        $this->data = $data;

        return strlen($data);
    }

    public function stream_eof()
    {
        return true;
    }
}
