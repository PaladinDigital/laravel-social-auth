<?php

namespace PaladinDigital\LaravelSocialAuth;

use \View;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        // Routes
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

    public function register() {}
}
