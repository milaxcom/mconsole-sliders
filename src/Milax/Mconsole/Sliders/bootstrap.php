<?php

use Milax\Mconsole\Sliders\Installer;

/**
 * Sliders module bootstrap file
 */
return [
    'name' => 'Sliders',
    'identifier' => 'mconsole-sliders',
    'description' => 'mconsole::sliders.module',
    'menu' => [],
    'register' => [
        'middleware' => [],
        'providers' => [
            \Milax\Mconsole\Sliders\Provider::class,
        ],
        'aliases' => [],
        'bindings' => [],
        'dependencies' => [],
    ],
    'install' => function () {
        Installer::install();
    },
    'uninstall' => function () {
        Installer::uninstall();
    },
    'init' => function () {
        app('API')->menu->push([
            'name' => 'Sliders',
            'translation' => 'sliders.menu',
            'url' => 'sliders',
            'visible' => true,
            'enabled' => true,
        ], 'sliders', 'content');
        
        app('API')->acl->register([
            ['GET', 'sliders', 'sliders.acl.index', 'sliders'],
            ['GET', 'sliders/create', 'sliders.acl.create'],
            ['POST', 'sliders', 'sliders.acl.store'],
            ['GET', 'sliders/{sliders}/edit', 'sliders.acl.edit'],
            ['PUT', 'sliders/{sliders}', 'sliders.acl.update'],
            ['GET', 'sliders/{sliders}', 'sliders.acl.show'],
            ['DELETE', 'sliders/{sliders}', 'sliders.acl.destroy'],
        ]);
    },
];
