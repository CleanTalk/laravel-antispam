<?php

namespace CleanTalkLaravel;

use Illuminate\Support\ServiceProvider;

class CleantalkServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->mergeConfigFrom(
            __DIR__.'/config/cleantalk.php','cleantalk'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require_once __DIR__.'/lib/cleantalk.php';
        $this->publishes([
            __DIR__.'/config/cleantalk.php' => config_path('cleantalk.php'),
        ]);
        $this->loadViewsFrom(__DIR__.'/views/widgets', 'cleantalk');
    }
}
