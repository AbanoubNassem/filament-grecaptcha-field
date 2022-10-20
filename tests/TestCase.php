<?php

namespace AbanoubNassem\FilamentGRecaptchaField\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use AbanoubNassem\FilamentGRecaptchaField\FilamentGRecaptchaFieldServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'AbanoubNassem\\FilamentGRecaptchaField\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            FilamentGRecaptchaFieldServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-grecaptcha-field_table.php.stub';
        $migration->up();
        */
    }
}
