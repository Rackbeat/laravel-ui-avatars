<?php

namespace Rackbeat\UIAvatars;

use Illuminate\Support\ServiceProvider;

class UIAvatarsServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/ui-avatars.php' => config_path('ui-avatars.php'),
        ], 'config');
    }

    /**
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/ui-avatars.php', 'ui-avatars');
    }
}
