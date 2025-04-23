<?php

namespace Rackbeat\UIAvatars\Generators;

use Rackbeat\UIAvatars\AvatarGeneratorInterface;
use LasseRafn\InitialAvatarGenerator\InitialAvatar;

class LocalGenerator implements AvatarGeneratorInterface
{
	protected InitialAvatar $service;

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

	public function name(string $name): self
	{
		$this->service->name($name);

		return $this;
	}

	public function length(int $length): self
	{
		$this->service->length($length);

		return $this;
	}

	public function fontSize(int $fontSize): self
	{
		$this->service->fontSize($fontSize);

		return $this;
	}

	public function imageSize(?int $imageSize): self
	{
		if ($imageSize !== null) {
			$this->service->size($imageSize);
		}

		return $this;
	}

	public function rounded(bool $rounded): self
	{
		$this->service->rounded($rounded);

		return $this;
	}

	public function smooth(bool $smooth): self
	{
		$this->service->smooth($smooth);

		return $this;
	}

	public function fontColor(string $fontColor): self
	{
		$this->service->color($fontColor);

		return $this;
	}

	public function backgroundColor(string $backgroundColor): self
	{
		$this->service->background($backgroundColor);

		return $this;
	}

	public function uppercase(bool $uppercase): self
	{
		$this->service->keepCase(!$uppercase);

		return $this;
	}

	public function bold(bool $bold): self
	{
		if ($bold) {
			$this->service->preferBold();
		}

		return $this;
	}

	public function base64(): string
	{
		return $this->stream('data-url', 100);
	}

	public function stream(string $format = 'png', int $quality = 100): string
	{
		return $this->image()->stream($format, $quality);
	}

	public function urlfriendly(): string
	{
		return $this->base64();
	}

	public function image(): \Intervention\Image\Image
	{
		return $this->service->generate();
	}

	public function svg(): string
	{
		return $this->service->generateSvg()->toXMLString();
	}

	public function initials(?int $length = null): string
	{
		if ($length !== null) {
			$this->length($length);
		}

		return $this->service->getInitials();
	}
}
