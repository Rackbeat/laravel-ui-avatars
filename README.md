# Official Laravel wrapper for https://ui-avatars.com


<p align="center"> 
<a href="https://travis-ci.org/Rackbeat/laravel-ui-avatars"><img src="https://img.shields.io/travis/Rackbeat/laravel-ui-avatars.svg?style=flat-square" alt="Build Status"></a>
<a href="https://coveralls.io/github/Rackbeat/laravel-ui-avatars"><img src="https://img.shields.io/coveralls/Rackbeat/laravel-ui-avatars.svg?style=flat-square" alt="Coverage"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-ui-avatars"><img src="https://img.shields.io/packagist/dt/rackbeat/laravel-ui-avatars.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-ui-avatars"><img src="https://img.shields.io/packagist/v/rackbeat/laravel-ui-avatars.svg?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-ui-avatars"><img src="https://img.shields.io/packagist/l/rackbeat/laravel-ui-avatars.svg?style=flat-square" alt="License"></a>
</p>

## Installation

You just require using composer and you're good to go!

```bash
composer require rackbeat/laravel-ui-avatars
```

The Service Provider is automatically registered.

## Setup

To setup the config file, you publish it like so:

```bash
php artisan vendor:publish --provider="Rackbeat\UIAvatars\UIAvatarsServiceProvider"
```

You can edit the file in `config/ui-avatars.php`.

## Usage

### 1. Add the `Rackbeat\UIAvatars\HasAvatar` trait to your Model (e.g. `App\Users`)

```php
// ...
class User extends Authenticatable {
  use HasAvatar;
  // ...
}
```

### 2. Create a new method on your Model.

This method is practically a proxy to call the `HasAvatar` methods. It will return a gravatar from the e-mail, with a fallback to the avatar using `ui-avatars.com` API.

```php
public function getAvatar( $size = 64 ) {
  return $this->getGravatar( $this->email, $size );
}
```

NOTICE: Gravatar is only available using the API, not locally generated avatars.

### 3. (Optional) Re-define the name field

Assuming you're not using the default `User` Model in Laravel, you can override which field is being used for the name.

```php
public function getAvatarNameKey( ) {
  return 'full_name';
}
```

## Available methods

### `getInitials($length=null)`

Returns the generated initials, from the name, used in the avatar.

Default `$length` can be defined in `config/ui-avatars.php` (`length` key)

### `getUrlfriendlyAvatar($size=null)`

Return a urlfriendly formatted avatar (URL or base64).

Example usage:
```html
<img src="{{ $user->getUrlfriendlyAvatar() }}" />
```

Default `$size` can be defined in `config/ui-avatars.php` (`image_size` key)

### `getAvatarBase64($size=null)`

Return a base64 representation of the avatar.

Default `$size` can be defined in `config/ui-avatars.php` (`image_size` key)

### `getAvatarImage($size=null)`

Return a Image object of the avatar.

Default `$size` can be defined in `config/ui-avatars.php` (`image_size` key)

### `getGravatar($email, $size=null)`

Return a link to a Gravatar image using the specified email, and a fallback to using our own generator (assuming provider = `api`)

Default `$size` can be defined in `config/ui-avatars.php` (`image_size` key)

## Available options

In the config file you can specify different options.

| Key  | Description | Default | Available Options / Type |
| ------------- | ------------- | ------------- | ------------- |
| provider  | Which provider to use for generating avatars.  | `api`  | `local` or `api` |
| length  | Max initials length (amount of letters)  | `2`  | Number, min: 1, max: unlimited |
| image_size  | Default width & height for the generated avatar.  | `48`  | Number, min: 1, max: unlimited (512 using `api` provider) |
| font_size  | Font size in percentage of `image_size`.  | `0.5`  | Number, min: 0, max: 1 |
| rounded  | Should the generated avatar be a rounded circle? (its recommended to disable and round using CSS)  | `false`  | Boolean |
| smooth_rounding  | If `rounded` is enabled, and provider is `local`, you can enable smoother rounding with the cost of performance.  | `true`  | Boolean |
| uppercase  | Should the initials be forced uppercase or not.  | `true`  | Boolean |
| background_color  | Default HEX background color for avatars.  | `#a0a0a0`  | Hex |
| font_color  | Default HEX font color for avatars.  | `#222`  | Hex |
| providers  | List of available providers. For you to add your own provider.  |   | Array of providers |

## Requirements
* PHP >= 7.1
