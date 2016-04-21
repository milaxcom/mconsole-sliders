<?php 

return [
    'module' => [
        'description' => 'Управление слайдерами',
    ],
    'menu' => [
        'list' => [
            'name' => 'Слайдеры'
        ],
        'create' => [
            'name' => 'Добавить слайдер',
            'description' => 'Добавление новых слайдеров с изображениями',
        ],
        'update' => [
            'name' => 'Редактировать слайдер',
            'description' => 'Редактировать существующие слайдер',
        ],
        'delete' => [
            'name' => 'Удалить слайдер',
            'description' => 'Удаление слайдера со всеми вложенными изображениями',
        ],
    ],
    'table' => [
        'updated' => 'Обновлено',
        'title' => 'Название',
    ],
    'form' => [
        'main' => 'Основные данные',
        'additional' => 'Настройки',
        'gallery' => 'Изображения',
        'title' => 'Название',
        'description' => 'Описание (HTML)',
        'duration' => 'Смена слайда (в мс.)',
        'concurrent' => 'Показывать слайдов',
        'shuffle' => [
            'name' => 'Сортировать слайды',
            'options' => [
                'order' => 'По порядку',
                'random' => 'Случайно',
            ],
        ],
        'preset' => [
            'name' => 'Шаблон загрузки',
        ],
        'info' => [
            'title' => 'Справка',
            'text' => 'Указывая время смены слайда помните, что 1000 миллисекунд (мс) равно 1 секунде',
        ],
    ],
    'options' => [
        'settings' => [
            'group' => 'Слайдеры',
        ],
        'presets' => [
            'name' => 'Показать выбор шаблона загрузки',
        ],
    ],
];