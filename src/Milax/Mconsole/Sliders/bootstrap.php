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
            'name' => 'mconsole::sliders.menu',
            'url' => 'sliders',
            'visible' => true,
            'enabled' => true,
        ], 'sliders', 'content');
        
        app('API')->acl->register([
            ['GET', 'sliders', 'mconsole::sliders.acl.index'],
            ['GET', 'sliders/create', 'mconsole::sliders.acl.create'],
            ['POST', 'sliders', 'mconsole::sliders.acl.store'],
            ['GET', 'sliders/{slider}/edit', 'mconsole::sliders.acl.edit'],
            ['PUT', 'sliders/{slider}', 'mconsole::sliders.acl.update'],
            ['GET', 'sliders/{slider}', 'mconsole::sliders.acl.show'],
            ['DELETE', 'sliders/{slider}', 'mconsole::sliders.acl.destroy'],
        ], 'sliders');
    },
];
