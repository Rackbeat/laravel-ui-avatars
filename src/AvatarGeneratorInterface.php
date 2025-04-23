<?php

namespace Rackbeat\UIAvatars;

use Intervention\Image\Image;

interface AvatarGeneratorInterface
{
	public function name(string $name): self;

	public function length(int $length): self;

	public function fontSize(int $fontSize): self;

	public function imageSize(?int $imageSize): self;

	public function rounded(bool $rounded): self;

	public function fontColor(string $fontColor): self;

	public function backgroundColor(string $backgroundColor): self;

	public function uppercase(bool $uppercase): self;

	public function base64(): string;

	public function urlfriendly(): string;

	public function image(): Image|string;

	public function svg(): string;

	public function initials(?int $length = null): string;
}
