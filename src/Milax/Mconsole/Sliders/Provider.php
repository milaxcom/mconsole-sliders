<?php

namespace Milax\Mconsole\Sliders;

use Illuminate\Support\ServiceProvider;

class Provider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        // ..
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when('\Milax\Mconsole\Sliders\Http\Controllers\SlidersController')
            ->needs('\Milax\Mconsole\Contracts\Repository')
            ->give(function () {
                return new \Milax\Mconsole\Sliders\SlidersRepository(\Milax\Mconsole\Sliders\Models\Slider::class);
            });
    }
}
