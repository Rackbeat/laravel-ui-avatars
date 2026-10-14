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
    protected function getAvatarName()
    {
        return $this->{$this->getAvatarNameKey()};
    }

    /**
     * Get the key on the model to grab the name from.
     *
     * Defaults to 'name' for App\User model.
     *
     * @return string
     */
    protected function getAvatarNameKey()
    {
        return 'name';
    }

    /**
     * @return AvatarGeneratorInterface
     */
    public function getAvatarGenerator()
    {
        return AvatarGeneratorFactory::make($this->getAvatarName());
    }

    /**
     * @param  int|null  $length
     * @return string
     */
    public function getInitials($length = null)
    {
        return $this->getAvatarGenerator()->initials($length);
    }

    /**
     * @param  int|null  $size
     * @return Image
     */
    public function getAvatarImage($size = null)
    {
        return $this->getAvatarGenerator()->imageSize($size)->image();
    }

    /**
     * @param  int|null  $size
     * @return string
     */
    public function getAvatarSvg($size = null)
    {
        return $this->getAvatarGenerator()->imageSize($size)->svg();
    }

    /**
     * @param  int|null  $size
     * @return string
     */
    public function getAvatarBase64($size = null)
    {
        return $this->getAvatarGenerator()->imageSize($size)->base64();
    }

    /**
     * Returns a string valid to use as a Gravatar (or similar) fallback.
     *
     * ONLY USEFUL FOR 'api' provider.
     *
     * @param  int|null  $size
     * @return string
     */
    public function getUrlfriendlyAvatar($size = null)
    {
        return $this->getAvatarGenerator()->imageSize($size)->urlfriendly();
    }

    /**
     * Returns a gravatar url.
     *
     * ONLY WORKS FOR 'api' provider.
     *
     * @param string email
     * @param  int|null  $size
     * @return string
     */
    public function getGravatar($email, $size = null)
    {
        return 'https://www.gravatar.com/avatar/'.md5(strtolower($email)).'?s='.$size.'&default='.$this->getUrlfriendlyAvatar($size);
    }
}
