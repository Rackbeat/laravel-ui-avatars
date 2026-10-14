<?php

namespace Rackbeat\UIAvatars;

use SVG\SVG;

class Avatar
{
    /**
     * @param  null  $provider
     * @return AvatarGeneratorInterface
     */
    public static function make($provider = null)
    {
        if ($provider !== null) {
            return AvatarGeneratorFactory::select($provider);
        }

        return AvatarGeneratorFactory::make();
    }

    /**
     * @param  string  $name
     * @return \Intervention\Image\Image|string
     */
    public static function image($name = '')
    {
        return static::make()->name($name)->image();
    }

    /**
     * @param  string  $name
     * @return SVG|string
     */
    public static function svg($name = '')
    {
        return static::make()->name($name)->svg();
    }

    /**
     * @param  string  $name
     * @return string
     */
    public static function base64($name = '')
    {
        return static::make()->name($name)->base64();
    }

    /**
     * @param  string  $name
     * @return string
     */
    public static function initials($name = '')
    {
        return static::make()->name($name)->initials();
    }
}
