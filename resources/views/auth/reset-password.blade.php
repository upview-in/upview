<x-app.guest-layout>
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('images/others/login-3.png') }}')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="row align-items-center w-100">
                    <div class="col-md-7 col-lg-5 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="Logo" src="{{ asset('images/logo/named_logo.svg') }}" style="height: 100px;">
                                    <h2 class="m-b-0">Confirm</h2>
                                </div>

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    @if (!empty(session('password_reset_email')))
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="password_reset_email">{{ __('Email') }}:</label>
                                            <div class="input-affix">
                                                <em class="prefix-icon anticon anticon-mail"></em>
                                                <input type="password_reset_email" class="form-control {{ $errors->has('password_reset_email')?'is-invalid':'is-valid' }}" id="password_reset_email" name="password_reset_email" value="{{ session('password_reset_email') }}" required autofocus placeholder="{{ __('E-mail address') }}">
                                            </div>
                                            @error('password_reset_email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endif

                                    @if (!empty(session('password_reset_mobile_number')))
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="phoneNumber">{{ __('Phone') }}:</label>
                                            <input type="text" id="phoneNumber" class="form-control {{ $errors->has('password_reset_mobile_number')?'is-invalid':'is-valid' }}" name="password_reset_mobile_number" value="{{ session('password_reset_mobile_number') }}" required  autofocus>
                                            @error('password_reset_mobile_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="password">{{ __('Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <em class="prefix-icon anticon anticon-lock"></em>
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
                                            <em class="prefix-icon anticon anticon-lock"></em>
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
                                            <button class="btn btn-primary">{{ __('Reset Password') }}</button>
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