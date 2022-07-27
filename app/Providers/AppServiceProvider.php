<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('shout', function ($string) {
            return trim($string, '(\'\')');
        });

        Blade::directive('custom', function ($expression) {
            eval("\$params = [$expression];");
            list($param1, $param2, $param3) = $params;
        
            // Great coding stuff here
        });
    }
}