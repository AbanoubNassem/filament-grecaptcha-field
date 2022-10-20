<?php

namespace AbanoubNassem\FilamentGRecaptchaField;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use AbanoubNassem\FilamentGRecaptchaField\Commands\FilamentGRecaptchaFieldCommand;

class FilamentGRecaptchaFieldServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-grecaptcha-field')
            ->hasViews();
    }
}
