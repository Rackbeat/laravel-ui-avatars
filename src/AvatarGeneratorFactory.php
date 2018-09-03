<?php

namespace Rackbeat\UIAvatars;

class AvatarGeneratorFactory
{
	/**
	 * @param string $name
	 *
	 * @return AvatarGeneratorInterface
	 */
	public static function make( $name = '' ) {
		$providerKey = config( 'ui-avatars.provider' );

		return static::select( $providerKey )->name( $name );
	}

	/**
	 * @param string $provider
	 *
	 * @return AvatarGeneratorInterface
	 */
	public static function select( $provider = 'local' ) {
		return new ( config( "ui-avatars.providers.{$provider}" ) );
	}
}
