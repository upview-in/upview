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
                                    <h2 class="m-b-0">Signup</h2>
                                </div>

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="name">{{ __('Name') }}:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon anticon anticon-user"></i>
                                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'is-valid' }}" id="name" name="name" :value="old('name')" required autofocus placeholder="{{ __('Name') }}">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
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
                                        <label class="font-weight-semibold" for="mobile_number">{{ __('Contact Number') }}:</label>
                                        <div class="input-affix">
                                            <i class="prefix-icon fas fa-phone-alt"></i>
                                            <input type="number" class="form-control {{ $errors->has('mobile_number')?'is-invalid':'is-valid' }}" id="mobile_number" name="mobile_number" :value="old('mobile_number')" required autofocus placeholder="{{ __('Contact Number') }}">
                                        </div>
                                        @error('mobile_number')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">{{ __('Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'is-valid' }}" id="password" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group"> 
                                        <label class="font-weight-semibold" for="password_confirmation">{{ __('Confirm Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <i class="prefix-icon anticon anticon-lock"></i>
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation')?'is-invalid':'is-valid' }}" id="password_confirmation" type="password" name="password_confirmation" required placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="font-size-13 text-muted">
                                                <a class="small" href="{{ route('login') }}"> {{ __('Already Registered?') }}</a>
                                            </span>
                                            <button class="btn btn-primary">{{ __('Register') }}</button>
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