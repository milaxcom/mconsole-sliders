<?php

use Milax\Mconsole\Sliders\Installer;

/**
 * Sliders module bootstrap file
 */
return [
    'name' => 'Sliders',
    'identifier' => 'mconsole-sliders',
    'description' => '',
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
        app('API')->menu->push('content', 'sliders_all', [
            'name' => 'All sliders',
            'translation' => 'sliders.menu.list.name',
            'url' => 'sliders',
            'description' => 'sliders.menu.list.description',
            'route' => 'mconsole.sliders.index',
            'visible' => true,
            'enabled' => true,
        ]);
        app('API')->menu->push('content', 'sliders_create', [
            'name' => 'Create slider',
            'translation' => 'sliders.menu.create.name',
            'url' => 'sliders',
            'description' => 'sliders.menu.create.description',
            'route' => 'mconsole.sliders.create',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('content', 'sliders_update', [
            'name' => 'Update slider',
            'translation' => 'sliders.menu.update.name',
            'url' => 'sliders',
            'description' => 'sliders.menu.update.description',
            'route' => 'mconsole.sliders.edit',
            'visible' => false,
            'enabled' => true,
        ]);
        app('API')->menu->push('content', 'sliders_delete', [
            'name' => 'Delete slider',
            'translation' => 'sliders.menu.delete.name',
            'url' => 'sliders',
            'description' => 'sliders.menu.delete.description',
            'route' => 'mconsole.sliders.destroy',
            'visible' => false,
            'enabled' => true,
        ]);
    },
];
