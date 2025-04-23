<?php

namespace Rackbeat\UIAvatars;

class AvatarGeneratorFactory
{
	public static function make(string $name = ''): AvatarGeneratorInterface
	{
		$providerKey = config('ui-avatars.provider');

		return static::select($providerKey)->name($name);
	}

	public static function select(string $provider = 'local'): AvatarGeneratorInterface
	{
		$providerClass = config("ui-avatars.providers.{$provider}");

		return new $providerClass();
	}
}
