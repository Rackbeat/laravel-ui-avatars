<?php

namespace Rackbeat\UIAvatars;

use SVG\SVG;

class Avatar
{
	public static function make(?string $provider = null): AvatarGeneratorInterface
	{
		if ($provider !== null) {
			return AvatarGeneratorFactory::select($provider);
		}

		return AvatarGeneratorFactory::make();
	}

	public static function image(string $name = ''): \Intervention\Image\Image|string
	{
		return static::make()->name($name)->image();
	}

	public static function svg(string $name = ''): SVG|string
	{
		return static::make()->name($name)->svg();
	}

	public static function base64(string $name = ''): string
	{
		return static::make()->name($name)->base64();
	}

	public static function initials(string $name = ''): string
	{
		return static::make()->name($name)->initials();
	}
}
