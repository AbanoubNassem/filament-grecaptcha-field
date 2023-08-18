<?php

namespace AbanoubNassem\FilamentGRecaptchaField\Forms\Components;

use Filament\Forms\Components\Field;


class GRecaptcha extends Field
{
    protected string $view = 'filament-grecaptcha-field::forms.components.g-recaptcha';


    public function setUp(): void
    {
        parent::setUp();
        $this->rules('required|captcha');
        $this->dehydrated(false);
        $this->label('');
    }

    public function callAfterStateUpdated(): static
    {
        parent::callAfterStateUpdated();

        $this->getLivewire()->dispatchFormEvent('resetCaptcha');

        return $this;
    }
}
