[<img src="https://cloud.githubusercontent.com/assets/1529454/5291635/1c426412-7b88-11e4-8d16-46161a081ece.gif" />](https://github.com/AbanoubNassem/filament-grecaptcha-field)

# Provides a Google reCaptcha V2 field for the Filament Forms, works in `Admin-Panel` and `Forntend-Forms`.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/abanoubnassem/filament-grecaptcha-field.svg?style=flat-square)](https://packagist.org/packages/abanoubnassem/filament-grecaptcha-field)
[![Total Downloads](https://img.shields.io/packagist/dt/abanoubnassem/filament-grecaptcha-field.svg?style=flat-square)](https://packagist.org/packages/abanoubnassem/filament-grecaptcha-field)

This plugin is built on top of [anhskohbo/no-captcha](https://github.com/anhskohbo/no-captcha) package.

## Installation

You can install the package via composer:

```bash
composer require abanoubnassem/filament-grecaptcha-field
```

Since the package depends on [anhskohbo/no-captcha](https://github.com/anhskohbo/no-captcha) package. You may publish the configuration by running:
```bash
php artisan vendor:publish --provider="Anhskohbo\NoCaptcha\NoCaptchaServiceProvider"
```


### Configuration

Add `NOCAPTCHA_SECRET` and `NOCAPTCHA_SITEKEY` in **.env** file :

```
NOCAPTCHA_SECRET=secret-key
NOCAPTCHA_SITEKEY=site-key
```
(You can obtain them from [here](https://www.google.com/recaptcha/admin))

## Usage

```php
use AbanoubNassem\FilamentGRecaptchaField\Forms\Components\GRecaptcha;

// admin panel
    public static function form(Form $form): Form
    {
        return $form->schema([
                    ...
                    GRecaptcha::make('captcha')
                ]);
     }

//forntend-forms 
    public $captcha = ''; // must be initialized 
    protected function getFormSchema(): array
    {
        return [
            ....
             GRecaptcha::make('captcha')
        ];
    }
```


## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities

If you discover any security related issues, please create an issue.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
