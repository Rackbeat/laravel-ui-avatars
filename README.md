# Validation Rule to ensure a value is within valid Mysql Integer ranges.

Works for signed and unsigned integers of type: TinyInt, SmallInt, Int, BigInt.


<p align="center"> 
<a href="https://travis-ci.org/Rackbeat/laravel-validate-mysql-integers"><img src="https://img.shields.io/travis/Rackbeat/laravel-validate-mysql-integers.svg?style=flat-square" alt="Build Status"></a>
<a href="https://coveralls.io/github/Rackbeat/laravel-validate-mysql-integers"><img src="https://img.shields.io/coveralls/Rackbeat/laravel-validate-mysql-integers.svg?style=flat-square" alt="Coverage"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-validate-mysql-integers"><img src="https://img.shields.io/packagist/dt/rackbeat/laravel-validate-mysql-integers.svg?style=flat-square" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-validate-mysql-integers"><img src="https://img.shields.io/packagist/v/rackbeat/laravel-validate-mysql-integers.svg?style=flat-square" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/rackbeat/laravel-validate-mysql-integers"><img src="https://img.shields.io/packagist/l/rackbeat/laravel-validate-mysql-integers.svg?style=flat-square" alt="License"></a>
</p>

## Installation

You just require using composer and you're good to go!

```bash
composer require rackbeat/laravel-validate-mysql-integers
```

The Service Provider is automatically registered.

## Usage

### Class

* `Rackbeat\Rules\TinyInteger`
* `Rackbeat\Rules\SmallInteger`
* `Rackbeat\Rules\Integer`
* `Rackbeat\Rules\BigInteger`

```php
'number' => [
    new Rackbeat\Rules\BigInteger($unsigned = true),
],
```

### Helper

The helpers are prefixed with "real_" to prevent overlapping. 
It can take an optional parameter to determine if its unsigned. Defaults to `false`.

* `real_tiny_int`
* `real_small_int`
* `real_int`
* `real_big_int`

```php
'id'        => ['real_tiny_int:1'], // unsigned
'number'    => ['real_tiny_int:0'], // signed
```

## Requirements
* PHP >= 7.1
