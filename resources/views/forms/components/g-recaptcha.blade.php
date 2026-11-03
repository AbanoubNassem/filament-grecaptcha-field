@once
    {!! NoCaptcha::renderJs(app()->getLocale()) !!}

    <script>
        // grecaptcha.reset() throws "No reCAPTCHA clients exist" when no widget is
        // left in the DOM, e.g. when the same Livewire response that dispatches
        // `resetCaptcha` also morphs the form (and its widget) away.
        window.filamentGRecaptchaReset = window.filamentGRecaptchaReset || function () {
            if (typeof window.grecaptcha?.reset !== 'function' || ! document.querySelector('.g-recaptcha')) {
                return;
            }

            window.grecaptcha.reset();
        };
    </script>
@endonce

<script>
    document.addEventListener('livewire:load', function () {
        @this.
        on('resetCaptcha', () => window.filamentGRecaptchaReset())
    });

    document.addEventListener('livewire:initialized', () => {
        @this.
        on('resetCaptcha', () => window.filamentGRecaptchaReset())
    })

    var recaptchaCallback = () => window.Livewire.find('{{ method_exists($this, 'id') ? $this->id(): $this->id }}')
        .set('{{$getStatePath()}}', window.grecaptcha.getResponse(), true);

</script>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="method_exists($this, 'id')  ? $field : null"
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"

    :hint="$getHint()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }"
         x-on:reset-recaptcha="window.filamentGRecaptchaReset()"
         wire:ignore
         x-on:next-wizard-step.window="window.filamentGRecaptchaReset()"
         x-on:expand-concealing-component.window="
                         if (document.body.querySelector('[data-validation-error]') !== null) {
                                    window.filamentGRecaptchaReset()
                        }
                        error = $el.parentElement.querySelector('[data-validation-error]')
                        if(! error) return;
                        setTimeout(() => $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }), 200)
               ">
        {!! NoCaptcha::display(['data-callback' => 'recaptchaCallback']) !!}
    </div>
</x-dynamic-component>
