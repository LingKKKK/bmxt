<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['validator']->extend('verificationcode', function($attribute, $value, $parameters){
            return verificationcode_check($value);
        });

        $this->app['validator']->extend('mobile', function($attribute, $value, $parameters){
            return is_mobile($value);
        });

        $this->app['validator']->extend('invitecode', function($attribute, $value, $parameters){
            return invitecode_check($value);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
