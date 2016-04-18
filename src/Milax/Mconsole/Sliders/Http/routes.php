<?php

/**
 * Sliders module routes file
 */
Route::group([
    'prefix' => 'mconsole',
    'middleware' => ['web', 'mconsole'],
    'namespace' => 'Milax\Mconsole\Sliders\Http\Controllers',
], function () {
    
    Route::resource('/sliders', 'SlidersController');

});
