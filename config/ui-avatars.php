<?php
return [
	/*
	|--------------------------------------------------------------------------
	| Avatar provider
	|--------------------------------------------------------------------------
	|
	| Determine how to generate the avatars.
	| Options: 'api', 'local'
	|
	| 'api' is using the external service at https://ui-avatars.com to remove load
	| from your server.
	|
	| 'local' will use your server to generate the avatars.
	*/
	'provider'         => 'local',

	/*
	|--------------------------------------------------------------------------
	| Default region
	|--------------------------------------------------------------------------
	|
	| Select which region to use when using the  "api" provider.
	|
	| Options:
	|     - na   = North America
	|     - eu   = Europe
	|     - null = Server default (can vary)
	*/
	'default_region'         => 'na',

	/*
	|--------------------------------------------------------------------------
	| Initials length
	|--------------------------------------------------------------------------
	|
	| Set the amount of characters the initials can consist of.
	*/
	'length'           => 2,

	/*
	|--------------------------------------------------------------------------
	| Image size
	|--------------------------------------------------------------------------
	|
	| Set the width and height of the image, in pixels.
	*/
	'image_size'       => 48,

	/*
	|--------------------------------------------------------------------------
	| Font size
	|--------------------------------------------------------------------------
	|
	| Set the font size for the initials. Percentage, based on the image size.
	*/
	'font_size'        => 0.5,

	/*
	|--------------------------------------------------------------------------
	| Rounded image
	|--------------------------------------------------------------------------
	|
	| Set if the returned image should be rounded or square.
	| It's recommended to use CSS to round the image for performance.
	*/
	'rounded'          => false,

	/*
	|--------------------------------------------------------------------------
	| Smooth rounding
	|--------------------------------------------------------------------------
	|
	| This is only possible if 'rounded' is true and with 'local' provider.
	|
	| Will use a hack to make the rounded circle appear much sharper. Can be a
	| performance hit as the image will be generated at a larger size and
	| scaled down to fit.
	*/
	'smooth_rounding'  => true,

	/*
	|--------------------------------------------------------------------------
	| Uppercase letters
	|--------------------------------------------------------------------------
	|
	| Set if the initials should be uppercased.
	*/
	'uppercase'        => true,

	/*
	|--------------------------------------------------------------------------
	| Background Color
	|--------------------------------------------------------------------------
	|
	| Set the HEX for the background color.
	*/
	'background_color' => '#a0a0a0',

	/*
	|--------------------------------------------------------------------------
	| Font Color
	|--------------------------------------------------------------------------
	|
	| Set the HEX for the font color.
	*/
	'font_color'       => '#222',

	/*
	|--------------------------------------------------------------------------
	| Font Weight
	|--------------------------------------------------------------------------
	|
	| Prefer bold fonts
	*/
	'font_bold'       => false,

	/*
	|--------------------------------------------------------------------------
	| Providers
	|--------------------------------------------------------------------------
	|
	| List of available providers
	*/
	'providers'        => [
		'api'   => Rackbeat\UIAvatars\Generators\ApiGenerator::class,
		'local' => Rackbeat\UIAvatars\Generators\LocalGenerator::class,
	],
];