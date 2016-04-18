<?php

namespace Milax\Mconsole\Sliders;

use Milax\Mconsole\Contracts\ModuleInstaller;

class Installer implements ModuleInstaller
{
    public static $options = [
        [
            'group' => 'sliders.options.settings.group',
            'label' => 'sliders.options.max.name',
            'key' => 'slider_max_limit',
            'value' => 5,
            'rules' => ['required', 'integer'],
            'type' => 'text',
            'enabled' => 1,
        ],
        [
            'group' => 'sliders.options.settings.group',
            'label' => 'sliders.options.fix.name',
            'key' => 'slider_fix_count',
            'value' => 1,
            'rules' => ['required', 'integer'],
            'type' => 'text',
            'enabled' => 1,
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
        
        foreach (self::$presets as $preset) {
            if (MconsoleUploadPreset::where('key', $preset['key'])->count() == 0) {
                MconsoleUploadPreset::create($preset);
            }
        }
    }
    
    public static function uninstall()
    {
        app('API')->options->uninstall(self::$options);
        
        foreach (self::$presets as $preset) {
            MconsoleUploadPreset::where('key', $preset['key'])->delete();
        }
    }
}
