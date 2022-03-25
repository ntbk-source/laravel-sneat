@error($error)
<div class="invalid-feedback">
    {{ $message }}
</div>
@else
{{ $slot }}
@enderror