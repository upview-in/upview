<x-guest-layout>
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('images/others/login-3.png') }}')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="Logo" src="{{ asset('images/logo/named_logo.svg') }}" style="height: 100px;">
                                    <h2 class="m-b-0">Recovery</h2>
                                </div>

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-success">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <div class="m-b-10">
                                    <label>{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}</label>
                                </div>

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-mail"></i>
                                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" :value="old('email')" required autofocus placeholder="{{ __('E-mail address') }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                <a href="{{ route('login') }}"> {{ __('Sign In') }}</a>
                                            </span>
                                            <button class="btn btn-primary">{{ __('Email Password Reset Link') }}</button>
                                        </div>
                                    </div>
                                </form>
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