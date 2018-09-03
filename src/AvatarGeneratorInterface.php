<?php namespace Rackbeat\UIAvatars;

use Intervention\Image\Image;

interface AvatarGeneratorInterface
{
	/**
	 * @param $name
	 *
	 * @return self
	 */
	public function name( $name );

	/**
	 * @param $length
	 *
	 * @return self
	 */
	public function length( $length );

	/**
	 * @param $fontSize
	 *
	 * @return self
	 */
	public function fontSize( $fontSize );

	/**
	 * @param $imagseSize
	 *
	 * @return self
	 */
	public function imageSize( $imagseSize );

	/**
	 * @param $rounded
	 *
	 * @return self
	 */
	public function rounded( $rounded );

	/**
	 * @param $fontColor
	 *
	 * @return self
	 */
	public function fontColor( $fontColor );

	/**
	 * @param $backgroundColor
	 *
	 * @return self
	 */
	public function backgroundColor( $backgroundColor );

	/**
	 * @param $uppercase
	 *
	 * @return self
	 */
	public function uppercase( $uppercase );

	/**
	 * @return string
	 */
	public function base64();

	/**
	 * @return string
	 */
	public function gravatar();

	/**
	 * @return Image
	 */
	public function image();

	/**
	 * @return string
	 */
	public function initials();
}