@once
    @push('scripts')
{!! NoCaptcha::renderJs(app()->getLocale()) !!}
    @endpush
@endonce

<script>
    document.addEventListener('livewire:load', function () {
        @this.
        on('resetCaptcha', () => window.grecaptcha.reset())
    });

    var {{$getStatePath()}}Callback = () => window.Livewire.find('{{$this->id}}')
        .set('{{$getStatePath()}}', window.grecaptcha.getResponse(), true);

</script>

<x-dynamic-component
    :component="$getFieldWrapperView()"
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-action="$getHintAction()"
    :hint-color="$getHintColor()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $getStatePath() }}').defer }"
         x-on:next-wizard-step.window="window.grecaptcha.reset()"
         x-on:expand-concealing-component.window="
                    error = $el.parentElement.querySelector('[data-validation-error]')
                    if(! error) return;
                    setTimeout(() => { $el.scrollIntoView({ behavior: 'smooth', block: 'start', inline: 'start' }); window.grecaptcha.reset(); }, 200)
               ">
        {!! NoCaptcha::display(['data-callback' => "{$getStatePath()}Callback"]) !!}
    </div>
</x-dynamic-component>

