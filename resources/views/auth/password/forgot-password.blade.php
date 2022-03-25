<x-auth-layout title="Forgot password">
	<h4 class="mb-2">
		{{ __('Forgot Password? 🔒') }}
	</h4>
	<p class="mb-4">
		{{ __("Enter your email and we'll send you instructions to reset your password") }}
	</p>

	<form id="formAuthentication" class="mb-3" action="{{ route('password.email') }}" method="POST">
		@csrf
		<div class="mb-3">
			<x-label for="email" :value="__('Email')" />
			<x-input type="email" name="email" id="email" :placeholder="__('Enter your email')" :value="old('email')" autofocus />
			<x-invalid error="email" />
		</div>
		<x-button type="submit" class="btn btn-primary d-grid w-100" :value="__('Send Reset Link')" onClickDisabled />
	</form>

	<div class="text-center">
		<a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
			<i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
			{{ __('Back to login') }}
		</a>
	</div>
</x-auth-layout>