<?php

namespace Rackbeat\UIAvatars;

use Intervention\Image\Image;

interface AvatarGeneratorInterface
{
    /**
     * @return self
     */
    public function name($name);

    /**
     * @return self
     */
    public function length($length);

    /**
     * @return self
     */
    public function fontSize($fontSize);

    /**
     * @return self
     */
    public function imageSize($imagseSize);

    /**
     * @return self
     */
    public function rounded($rounded);

    /**
     * @return self
     */
    public function fontColor($fontColor);

    /**
     * @return self
     */
    public function backgroundColor($backgroundColor);

    /**
     * @return self
     */
    public function uppercase($uppercase);

    /**
     * @return string
     */
    public function base64();

    /**
     * @return string
     */
    public function urlfriendly();

    /**
     * @return Image|string
     */
    public function image();

    /**
     * @return string
     */
    public function svg();

    /**
     * @param  int|null  $length
     * @return string
     */
    public function initials($length);
}
