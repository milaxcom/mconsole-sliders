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
        // ..
    },
];
