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

class DirectoryStreamAdapter implements SourceAdapterInterface, TargetAdapterInterface
{
    /**
     * @var string
     */
    private $path;

    /**
     * @param string $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * {@inheritdoc}
     */
    public function receive(Request $request)
    {
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($this->path));
        $files = array();
        foreach ($rii as $file) {
            if ($file->isDir()) {
                continue;
            }
            $stream = fopen($file->getPathname(), 'r');
            $files[] = stream_get_contents($stream);
            fclose($stream);
        }

        return new Response($files);
    }

    /**
     * {@inheritdoc}
     */
    public function send(Request $request)
    {
        foreach ($request as $name => $data) {
            $pathname = sprintf('%s%s%s', $this->path, DIRECTORY_SEPARATOR, $name);
            $filestream = fopen($pathname, 'w+');
            fwrite($filestream, $data);
            fclose($filestream);
        }

        return new Response();
    }
}
