<?php

/*
 * This file is part of the Jirro package.
 *
 * (c) Rendy Eko Prastiyo <rendyekoprastiyo@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Jirro\Component\FileSystem\Container\ServiceProvider;

use League\Container\ServiceProvider;
use League\Flysystem\Filesystem as FileSystem;
use League\Flysystem\Adapter\Local;

class FileSystemServiceProvider extends ServiceProvider
{
    protected $provides = [
        'file_system',
    ];

    public function register()
    {
        $this->container['file_system'] = function () {
            $assetBaseDir = $this->container->get('config')['asset_base_dir'];

            $adapter    = new Local($assetBaseDir);
            $fileSystem = new FileSystem($adapter);

            return $fileSystem;
        };

        $this
            ->container
            ->inflector('Jirro\Component\FileSystem\FileSystemAwareInterface')
            ->invokeMethod('setFileSystem', ['file_system'])
        ;
    }
}
