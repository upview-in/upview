@section('custom-scripts')
    {!! NoCaptcha::renderJs() !!}
@endsection

<x-app.guest-layout>
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('images/others/login-3.png') }}')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="d-flex align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="Logo" src="{{ asset('images/logo/named_logo.svg') }}" style="height: 100px;">
                                    <h2 class="m-b-0">Sign In</h2>
                                </div>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    @if (session()->has('message'))
                                        <div class="alert alert-success">
                                            <strong>{{ session()->get('message') }}</strong>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                                        <div class="input-affix">
                                            <em class="prefix-icon anticon anticon-mail"></em>
                                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-mail address') }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">{{ __('Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <em class="prefix-icon anticon anticon-lock"></em>
                                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'is-valid' }}" id="password" type="password" name="password" required autocomplete="off" placeholder="{{ __('Password') }}">
                                        </div>
                                        @if (Route::has('password.request'))
                                        <a class="float-right font-size-13 text-muted" href="{{ route('password.request') }}">{{ __('Forgot password?') }}</a>
                                        @endif
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="checkbox">
                                        <input id="remember" type="checkbox" name="remember">
                                        <label class="font-weight-semibold" for="remember">{{ __('Remember me') }}</label>
                                    </div>

                                    {!! NoCaptcha::display() !!}
                                    @error('g-recaptcha-response')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="form-group mt-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            @if (Route::has('register'))
                                            <span class="font-size-13 text-muted">
                                                {{ __('Don\'t have an account?') }}
                                                <a class="small" href="{{ route('register') }}"> {{ __('Signup') }}</a>
                                            </span>
                                            @endif
                                            <button class="btn btn-primary">{{ __('Sign In') }}</button>
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
</x-app.guest-layout>