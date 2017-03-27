<?php

namespace Milax\Mconsole\Sliders;

use Milax\Mconsole\Contracts\Modules\ModuleInstaller;
use Milax\Mconsole\Models\MconsoleUploadPreset;
use Milax\Mconsole\Sliders\SlidersRepository;
use Milax\Mconsole\Sliders\Models\Slider;

class Installer implements ModuleInstaller
{
    public static $options = [
        [
            'group' => 'mconsole::sliders.options.settings.group',
            'label' => 'mconsole::sliders.options.presets.name',
            'key' => 'sliders_show_presets',
            'value' => '0',
            'type' => 'select',
            'options' => ['1' => 'mconsole::settings.options.on', '0' => 'mconsole::settings.options.off'],
            'enabled' => 1,
        ],
    ];
    
    public static $presets = [
        [
            'type' => \MconsoleUploadType::Image,
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
        app('API')->presets->uninstall(self::$presets);
        
        $repository = new SlidersRepository(Slider::class);
        foreach ($repository->get() as $instance) {
            $instance->delete();
        }
    }
}
