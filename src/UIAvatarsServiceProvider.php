<?php

namespace Rackbeat\UIAvatars;

use Illuminate\Support\ServiceProvider;

class UIAvatarsServiceProvider extends ServiceProvider
{
	public function boot(): void
	{
		$this->publishes([
			__DIR__ . '/../config/ui-avatars.php' => config_path('ui-avatars.php'),
		], 'config');
	}

	public function register(): void
	{
		$this->mergeConfigFrom(__DIR__ . '/../config/ui-avatars.php', 'ui-avatars');
	}
}
