<?php

namespace Rackbeat\UIAvatars\Generators;

use LasseRafn\InitialAvatarGenerator\InitialAvatar;
use Rackbeat\UIAvatars\AvatarGeneratorInterface;

class ApiGenerator implements AvatarGeneratorInterface
{
    protected $options = [];

    public function __construct()
    {
        $this->length(config('ui-avatars.length'));
        $this->fontSize(config('ui-avatars.font_size'));
        $this->imageSize(config('ui-avatars.image_size'));
        $this->rounded((bool) config('ui-avatars.rounded'));
        $this->uppercase((bool) config('ui-avatars.uppercase'));
        $this->backgroundColor(config('ui-avatars.background_color'));
        $this->fontColor(config('ui-avatars.font_color'));
        $this->bold((bool) config('ui-avatars.font_bold'));
        $this->options['region'] = config('ui-avatars.default_region');
    }

    public function region($region)
    {
        $this->options['region'] = $region;

        return $this;
    }

    public function name($name)
    {
        $this->options['name'] = $name;

        return $this;
    }

    public function length($length)
    {
        $this->options['length'] = $length;

        return $this;
    }

    public function fontSize($fontSize)
    {
        $this->options['font-size'] = $fontSize;

        return $this;
    }

    public function imageSize($imageSize)
    {
        // Option to specify custom, or default to config.
        if ($imageSize === null) {
            return $this;
        }

        $this->options['size'] = $imageSize;

        return $this;
    }

    public function rounded($rounded)
    {
        $this->options['rounded'] = $rounded;

        return $this;
    }

    public function fontColor($fontColor)
    {
        $this->options['color'] = str_replace('#', '', $fontColor);

        return $this;
    }

    public function backgroundColor($backgroundColor)
    {
        $this->options['background'] = str_replace('#', '', $backgroundColor);

        return $this;
    }

    public function uppercase($uppercase)
    {
        $this->options['uppercase'] = $uppercase;

        return $this;
    }

    public function bold($bold)
    {
        $this->options['bold'] = $bold;

        return $this;
    }

    public function base64()
    {
        return $this->image();
    }

    public function image()
    {
        return $this->getHost().'/api/?'.http_build_query($this->options);
    }

    public function svg()
    {
        return $this->getHost().'/svg/?'.http_build_query($this->options);
    }

    public function urlfriendly()
    {
        return urlencode($this->getHost().'/api'
                          .'/'.urlencode($this->options['name'])
                          .'/'.$this->options['size']
                          .'/'.$this->options['background']
                          .'/'.$this->options['color']
                          .'/'.$this->options['length']
                          .'/'.$this->options['font-size']
                          .'/'.$this->options['rounded']
                          .'/'.$this->options['uppercase']
                          .'/'.($this->options['bold'] ?? false));
    }

    public function initials($length = null)
    {
        return (new InitialAvatar())->name($this->options['name'])->length($length ?: $this->options['length'])->getInitials();
    }

    protected function getHost()
    {
        if (empty($this->options['region'])) {
            return 'https://ui-avatars.com';
        }

        return sprintf('https://%s.ui-avatars.com', $this->options['region']);
    }
}
