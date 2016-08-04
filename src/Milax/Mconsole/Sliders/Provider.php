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
        $this->app->bind('Milax\Mconsole\Sliders\Contracts\Repositories\SlidersRepository', 'Milax\Mconsole\Sliders\Repositories\SlidersRepository');
    }
}
