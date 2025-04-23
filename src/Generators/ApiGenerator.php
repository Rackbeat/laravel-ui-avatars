<?php

namespace Rackbeat\UIAvatars\Generators;

use Rackbeat\UIAvatars\AvatarGeneratorInterface;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;

class ApiGenerator implements AvatarGeneratorInterface
{
    protected array $options = [];

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

    public function region(string $region): self
    {
        $this->options['region'] = $region;

        return $this;
    }

    public function name(string $name): self
    {
        $this->options['name'] = $name;

        return $this;
    }

    public function length(int $length): self
    {
        $this->options['length'] = $length;

        return $this;
    }

    public function fontSize(int $fontSize): self
    {
        $this->options['font-size'] = $fontSize;

        return $this;
    }

    public function imageSize(?int $imageSize): self
    {
        if ($imageSize !== null) {
            $this->options['size'] = $imageSize;
        }

        return $this;
    }

    public function rounded(bool $rounded): self
    {
        $this->options['rounded'] = $rounded;

        return $this;
    }

    public function fontColor(string $fontColor): self
    {
        $this->options['color'] = str_replace('#', '', $fontColor);

        return $this;
    }

    public function backgroundColor(string $backgroundColor): self
    {
        $this->options['background'] = str_replace('#', '', $backgroundColor);

        return $this;
    }

    public function uppercase(bool $uppercase): self
    {
        $this->options['uppercase'] = $uppercase;

        return $this;
    }

    public function bold(bool $bold): self
    {
        $this->options['bold'] = $bold;

        return $this;
    }

    public function base64(): string
    {
        return $this->image();
    }

    public function image(): string
    {
        return $this->getHost() . '/api/?' . http_build_query($this->options);
    }

    public function svg(): string
    {
        return $this->getHost() . '/svg/?' . http_build_query($this->options);
    }

    public function urlfriendly(): string
    {
        return urlencode(
            $this->getHost() . '/api'
            . '/' . urlencode($this->options['name'])
            . '/' . $this->options['size']
            . '/' . $this->options['background']
            . '/' . $this->options['color']
            . '/' . $this->options['length']
            . '/' . $this->options['font-size']
            . '/' . $this->options['rounded']
            . '/' . $this->options['uppercase']
            . '/' . ($this->options['bold'] ?? false)
        );
    }

    public function initials(?int $length = null): string
    {
        return (new InitialAvatar())
            ->name($this->options['name'])
            ->length($length ?: $this->options['length'])
            ->getInitials();
    }

    protected function getHost(): string
    {
        return empty($this->options['region'])
            ? 'https://ui-avatars.com'
            : sprintf('https://%s.ui-avatars.com', $this->options['region']);
    }
}
