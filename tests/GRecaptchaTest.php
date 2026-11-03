<?php

use AbanoubNassem\FilamentGRecaptchaField\Forms\Components\GRecaptcha;

it('keeps the captcha token out of the dehydrated form state', function () {
    expect(GRecaptcha::make('captcha')->isDehydrated())->toBeFalse();
});

it('routes every widget reset through the guarded helper', function () {
    $view = file_get_contents(__DIR__.'/../resources/views/forms/components/g-recaptcha.blade.php');

    expect($view)
        ->toContain('window.filamentGRecaptchaReset = window.filamentGRecaptchaReset || function ()')
        ->toContain("! document.querySelector('.g-recaptcha')")
        ->and(substr_count($view, 'window.grecaptcha.reset()'))->toBe(1);
});
