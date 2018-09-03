<?php

namespace Rackbeat\UIAvatars;

use Intervention\Image\Image;

trait HasAvatar
{
	/**
	 * Get the name value to generate avatar from.
	 *
	 * @return string
	 */
	protected function getAvatarName() {
		return $this->{$this->getAvatarNameKey()};
	}

	/**
	 * Get the key on the model to grab the name from.
	 *
	 * Defaults to 'name' for App\User model.
	 *
	 * @return string
	 */
	protected function getAvatarNameKey() {
		return 'name';
	}

	/**
	 * @return AvatarGeneratorInterface
	 */
	public function getAvatarGenerator() {
		return AvatarGeneratorFactory::make( $this->getAvatarName() );
	}

	/**
	 * @return string
	 */
	public function getInitials() {
		return $this->getAvatarGenerator()->initials();
	}

	/**
	 * @param null|int $size
	 *
	 * @return Image
	 */
	public function getAvatarImage($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->image();
	}


	/**
	 * @param null|int $size
	 *
	 * @return string
	 */
	public function getAvatarBase64($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->base64();
	}

	/**
	 * Returns a string valid to use as a Gravatar fallback.
	 *
	 * @param null|int $size
	 *
	 * @return string
	 */
	public function getAvatarForGravatar($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->gravatar();
	}
}
