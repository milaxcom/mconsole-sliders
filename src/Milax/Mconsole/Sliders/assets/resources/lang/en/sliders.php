<?php


return [
    'module' => 'Slideshow and banners',
    'menu' => 'Sliders',
    'table' => [
        'updated' => 'Updated',
        'title' => 'Name',
    ],
    'form' => [
        'main' => 'Main',
        'additional' => 'Additional',
        'gallery' => 'Gallery',
        'title' => 'Title',
        'description' => 'Description',
        'duration' => 'Slides transition (in ms.)',
        'concurrent' => 'Concurrent slides',
        'shuffle' => 'Shuffle',
        'preset' => 'Upload preset',
    ],
    'shuffle' => [
        'options' => [
            'order' => 'Ordered',
            'random' => 'Random',
        ],
    ],
    'info' => [
        'title' => 'Wisdom',
        'text' => 'Indicating the change time of the slide, remember that 1000 milliseconds (MS) equal 1 second',
    ],
    'options' => [
        'settings' => [
            'group' => 'Sliders',
        ],
        'presets' => [
            'name' => 'Show upload preset selector',
        ],
    ],
    'acl' => [
        'index' => 'Sliders: show list',
        'create' => 'Sliders: show create form',
        'store' => 'Sliders: saving',
        'edit' => 'Sliders: show edit form',
        'update' => 'Sliders: updating',
        'show' => 'Sliders: view',
        'destroy' => 'Sliders: delete',
    ],
];
