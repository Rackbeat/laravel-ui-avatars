<?php

namespace Rackbeat\UIAvatars;

class Avatar
{
	/**
	 * @param null $provider
	 *
	 * @return AvatarGeneratorInterface
	 */
	public static function make( $provider = null ) {
		if ( $provider !== null ) {
			return AvatarGeneratorFactory::select( $provider );
		}

		return AvatarGeneratorFactory::make();
	}

	/**
	 * @param string $name
	 *
	 * @return \Intervention\Image\Image
	 */
	public static function image( $name = '' ) {
		return static::make()->name( $name )->image();
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public static function base64( $name = '' ) {
		return static::make()->name( $name )->base64();
	}

	/**
	 * @param string $name
	 *
	 * @return string
	 */
	public static function initials( $name = '' ) {
		return static::make()->name( $name )->initials();
	}
}
