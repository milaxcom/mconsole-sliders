<?php

namespace Milax\Mconsole\Sliders;

use Milax\Mconsole\Contracts\ModuleInstaller;
use Milax\Mconsole\Models\MconsoleUploadPreset;

class Installer implements ModuleInstaller
{
    public static $options = [
        [
            'group' => 'sliders.options.settings.group',
            'label' => 'sliders.options.presets.name',
            'key' => 'sliders_show_presets',
            'value' => '0',
            'type' => 'select',
            'options' => ['1' => 'sliders.options.on', '0' => 'sliders.options.off'],
        ],
    ];
    
    public static $presets = [
        [
            'key' => 'sliders',
            'name' => 'Sliders',
            'path' => 'sliders',
            'extensions' => ['jpg', 'jpeg', 'png'],
            'min_width' => 800,
            'min_height' => 600,
            'operations' => [
                [
                    'operation' => 'resize',
                    'type' => 'ratio',
                    'width' => '800',
                    'height' => '600',
                ],
                [
                    'operation' => 'save',
                    'path' => 'sliders',
                    'quality' => '',
                ],
                [
                    'operation' => 'resize',
                    'type' => 'center',
                    'width' => '90',
                    'height' => '90',
                ],
                [
                    'operation' => 'save',
                    'path' => 'preview',
                    'quality' => '',
                ],
            ],
        ],
    ];
    
    public static function install()
    {
        app('API')->options->install(self::$options);
        app('API')->presets->install(self::$presets);
    }
    
    public static function uninstall()
    {
        app('API')->options->uninstall(self::$options);
        app('API')->presets->unisntall(self::$presets);
    }
}
