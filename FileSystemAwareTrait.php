<?php

/*
 * This file is part of the Jirro package.
 *
 * (c) Rendy Eko Prastiyo <rendyekoprastiyo@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jirro\Component\FileSystem;

use League\Flysystem\FilesystemInterface as FileSystemInterface;

trait FileSystemAwareTrait
{
    protected $fileSystem;

    public function setFileSystem(FileSystemInterface $fileSystem)
    {
        $this->fileSystem = $fileSystem;
    }

    public function getFileSystem()
    {
        return $this->fileSystem;
    }
}
