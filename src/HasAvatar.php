<?php

namespace Rackbeat\UIAvatars;

use Intervention\Image\Image;

trait HasAvatar
{
	/**
	 * Get the name value to generate avatar from.
	 */
	protected function getAvatarName(): string
	{
		return $this->{$this->getAvatarNameKey()};
	}

	/**
	 * Get the key on the model to grab the name from.
	 *
	 * Defaults to 'name' for App\User model.
	 */
	protected function getAvatarNameKey(): string
	{
		return 'name';
	}

	public function getAvatarGenerator(): AvatarGeneratorInterface
	{
		return AvatarGeneratorFactory::make($this->getAvatarName());
	}

	public function getInitials(?int $length = null): string
	{
		return $this->getAvatarGenerator()->initials($length);
	}

	public function getAvatarImage(?int $size = null): Image
	{
		return $this->getAvatarGenerator()->imageSize($size)->image();
	}

	public function getAvatarSvg(?int $size = null): string
	{
		return $this->getAvatarGenerator()->imageSize($size)->svg();
	}

	public function getAvatarBase64(?int $size = null): string
	{
		return $this->getAvatarGenerator()->imageSize($size)->base64();
	}

	/**
	 * Returns a string valid to use as a Gravatar (or similar) fallback.
	 *
	 * ONLY USEFUL FOR 'api' provider.
	 */
	public function getUrlfriendlyAvatar(?int $size = null): string
	{
		return $this->getAvatarGenerator()->imageSize($size)->urlfriendly();
	}

	/**
	 * Returns a gravatar URL.
	 *
	 * ONLY WORKS FOR 'api' provider.
	 */
	public function getGravatar(string $email, ?int $size = null): string
	{
		return 'https://www.gravatar.com/avatar/' . md5(strtolower($email)) . '?s=' . $size . '&default=' . $this->getUrlfriendlyAvatar($size);
	}
}
