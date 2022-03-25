<x-auth-layout title="Verification email">
	<h4 class="mb-2">
		{{ __('Verify your email') }}
	</h4>
	<p class="mb-4">
		{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
	</p>

	<form id="formAuthentication" class="mb-3" action="{{ route('verification.send') }}" method="POST">
		@csrf
		<x-button type="submit" class="btn btn-primary d-grid w-100" :value="__('Resend Verification Email')" onClickDisabled />
	</form>

	<form action="{{ route('logout') }}" method="POST" class="d-none" id="logout-form">
		@csrf
	</form>

	<div class="text-center">
		<a href="{{ route('logout') }}" class="d-flex align-items-center justify-content-center" onclick="logout()">
			<i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
			{{ __('Logout') }}
		</a>
	</div>

	@push('js')
	<script>
		function logout() {
			event.preventDefault()
			swalConfirm('Are you sure?', "This will stop your login session!", 'Yes, logout now!', () => {
				document.getElementById('logout-form').submit();
			});
		}
	</script>
	@endpush
</x-auth-layout>