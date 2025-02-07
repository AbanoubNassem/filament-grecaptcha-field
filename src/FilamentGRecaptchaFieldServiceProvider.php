<?php

namespace AbanoubNassem\FilamentGRecaptchaField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentGRecaptchaFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-grecaptcha-field')
            ->hasViews();
    }
}
