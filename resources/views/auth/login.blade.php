<x-auth-layout title="Login">
	<h4 class="mb-2">{{ __('Welcome to Sneat! 👋') }}</h4>
	<p class="mb-4">
		{{ __('Please sign-in to your account and start the adventure') }}
	</p>

	<form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
		@csrf
		<div class="mb-3">
			<x-label for="email" :value="__('Email')" />
			<x-input type="text" name="email" id="email" :value="old('email')" :placeholder="__('Enter your email')" autofocus />
			<x-invalid error="email" />
		</div>
		<div class="mb-3 form-password-toggle">
			<div class="d-flex justify-content-between">
				<x-label for="password" :value="__('Password')" />
				@if (Route::has('password.request'))
				<a href="{{ route('password.request') }}">
					<small>{{ __('Forgot password?') }}</small>
				</a>
				@endif
			</div>
			<div class="input-group input-group-merge">
				<x-input type="password" name="password" id="password" :placeholder="__('Password')" aria-describedby="password" />
				<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
				<x-invalid error="password" />
			</div>
		</div>
		<div class="mb-3">
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}} />
				<label class="form-check-label" for="remember">
					{{ __('Remember Me') }}
				</label>
			</div>
		</div>
		<div class="mb-3">
			<x-button type="submit" class="btn btn-primary d-grid w-100" :value="__('Sign in')" onClickDisabled />
		</div>
	</form>

	@if(Route::has('register'))
	<p class="text-center">
		<span>{{ __('New on our platform?') }}</span>
		<a href="{{ route('register') }}">
			<span>{{ __('Create an account') }}</span>
		</a>
	</p>
	@endif
</x-auth-layout>