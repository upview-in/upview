@section('custom-css')
<style>
    .login-bg {
        background-image: url('{{ asset("images/others/login-3.png") }}')
    }
</style>
@endsection

<x-guest-layout>
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex login-bg">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="Logo" src="{{ asset('images/logo/named_logo.svg') }}" style="height: 100px;">
                                    <h2 class="m-b-0">Verification</h2>
                                </div>

                                <div class="mb-4 text-sm text-dark">
                                    {{ __("Thanks for signing up! Before you get started, You will be required to verify your identity. Dont worry, we've just sent you an email that you provided during signup process with a link to verify your account. Just click on the link given there (Yea! Its that easy). If you didn't receive the email, we will gladly send you another.") }}
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-success">
                                    {{ __('A new verification link has been sent to the email address ') . Auth::user()->email }}
                                </div>
                                @else
                                <div class="mb-4 font-medium text-sm text-success">
                                    We just sent you verification email on {{ Auth::user()->email }}
                                </div>
                                @endif

                                <a href="{{ route('verification.send') }}" class="btn btn-sm btn-primary">{{ __('Resend Verification Email') }}</a>
                                <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">{{ __('Log out') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-md-flex p-h-40 justify-content-between">
                <span class="">© {{ \Carbon\Carbon::now()->year . ' ' . config('app.name') }}</span>
            </div>
        </div>
    </div>
</x-guest-layout>