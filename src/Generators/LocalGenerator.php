<?php

namespace Rackbeat\UIAvatars\Generators;

use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Rackbeat\UIAvatars\AvatarGeneratorInterface;

class LocalGenerator implements AvatarGeneratorInterface
{
    /** @var InitialAvatar */
    protected $service;

    public function __construct()
    {
        $this->service = new InitialAvatar();

        $this->length(config('ui-avatars.length'));
        $this->fontSize(config('ui-avatars.font_size'));
        $this->imageSize(config('ui-avatars.image_size'));
        $this->rounded((bool) config('ui-avatars.rounded'));
        $this->smooth((bool) config('ui-avatars.smooth_rounding'));
        $this->uppercase((bool) config('ui-avatars.uppercase'));
        $this->backgroundColor(config('ui-avatars.background_color'));
        $this->fontColor(config('ui-avatars.font_color'));
        $this->bold((bool) config('ui-avatars.font_bold'));
    }

    public function name($name)
    {
        $this->service->name($name);

        return $this;
    }

    public function length($length)
    {
        $this->service->length($length);

        return $this;
    }

    public function fontSize($fontSize)
    {
        $this->service->fontSize($fontSize);

        return $this;
    }

    public function imageSize($imageSize)
    {
        // Option to specify custom, or default to config.
        if ($imageSize === null) {
            return $this;
        }

        $this->service->size($imageSize);

        return $this;
    }

    public function rounded($rounded)
    {
        $this->service->rounded($rounded);

        return $this;
    }

    public function smooth($smooth)
    {
        $this->service->smooth($smooth);

        return $this;
    }

    public function fontColor($fontColor)
    {
        $this->service->color($fontColor);

        return $this;
    }

    public function backgroundColor($backgroundColor)
    {
        $this->service->background($backgroundColor);

        return $this;
    }

    public function uppercase($uppercase)
    {
        $this->service->keepCase(! $uppercase);

        return $this;
    }

    public function bold($bold)
    {
        if ($bold) {
            $this->service->preferBold();
        }

        return $this;
    }

    public function base64()
    {
        return $this->stream('data-url', 100);
    }

    public function stream($format = 'png', $quality = 100)
    {
        return $this->image()->stream($format, $quality);
    }

    public function urlfriendly()
    {
        return $this->base64();
    }

    public function image()
    {
        return $this->service->generate();
    }

    public function svg()
    {
        return $this->service->generateSvg()->toXMLString();
    }

    public function initials($length = null)
    {
        if ($length !== null) {
            $this->length($length);
        }

        return $this->service->getInitials();
    }
}
