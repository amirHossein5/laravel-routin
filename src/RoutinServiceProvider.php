<?php

namespace AmirHossein5\Routin;

use AmirHossein5\Routin\Classes\Routin;
use Illuminate\Support\ServiceProvider;

class RoutinServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('calculator', function ($app) {
            return new Calculator();
        });
        
        $this->app->bind('routin', function ($app) {
            return new Routin();
        });
    }

    public function boot()
    {
        //
    }
}
