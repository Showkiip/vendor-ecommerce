<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CityClassProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       $this->app->bind('CityClass', function(){
            return new \App\Classes\CityClass;
        });
    }
}
