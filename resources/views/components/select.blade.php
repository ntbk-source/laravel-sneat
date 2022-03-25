<select {!! $attributes->merge(['class' => $errors->has($attributes['name']) ? 'form-select is-invalid' : 'form-select']) !!}>
	{{ $slot }}
</select>