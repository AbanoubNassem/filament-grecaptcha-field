{!! NoCaptcha::renderJs(app()->getLocale()) !!}

<script>
    document.addEventListener('livewire:load', function () {
    @this.on('resetCaptcha', () => window.grecaptcha.reset())
    });

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
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }"
         wire:ignore
         x-on:next-wizard-step.window="window.grecaptcha.reset()"
         x-on:expand-concealing-component.window="
                         if (document.body.querySelector('[data-validation-error]') !== null) {
                                    window.grecaptcha.reset()
                        }
                        error = $el.parentElement.querySelector('[data-validation-error]')
                        if(! error) return;
                        setTimeout(() => $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }), 200)
               ">
        {!! NoCaptcha::display(['data-callback' => 'recaptchaCallback']) !!}
    </div>
</x-dynamic-component>
