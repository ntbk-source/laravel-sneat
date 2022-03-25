@props(['value', 'onClickDisabled'])
<button {!! $attributes !!} @isset($onClickDisabled) onclick="this.disabled=true;this.form.submit();" @endisset>
    {{ $value ?? $slot }}
</button>