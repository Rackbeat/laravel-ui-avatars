<?php

namespace Rackbeat\UIAvatars;

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

	public function getInitials() {
		return $this->getAvatarGenerator()->initials();
	}

	public function getAvatarImage($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->image();
	}

	public function getAvatarBase64($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->base64();
	}

	public function getAvatarForGravatar($size = null) {
		return $this->getAvatarGenerator()->imageSize($size)->gravatar();
	}
}
