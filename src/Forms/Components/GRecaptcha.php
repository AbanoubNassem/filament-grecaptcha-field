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

    public function callBeforeStateDehydrated(): static
    {
        parent::callBeforeStateDehydrated();

        if (method_exists($this->getLivewire(), 'dispatchFormEvent')) {
            $this->getLivewire()->dispatchFormEvent('resetCaptcha');
        } else {
            $this->getLivewire()->emit('resetCaptcha');
        }

        return $this;
    }
}
