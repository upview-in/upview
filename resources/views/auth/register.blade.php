@section('custom-scripts')
{!! NoCaptcha::renderJs() !!}
@endsection

<x-app.guest-layout>
    <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('{{ asset('images/others/login-3.png') }}')">
        <div class="d-flex flex-column justify-content-between w-100">
            <div class="container d-flex h-100">
                <div class="d-flex align-items-center w-100">
                    <div class="col-md-9 col-lg-7 m-h-auto">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between m-b-30">
                                    <img class="img-fluid" alt="Logo" src="{{ asset('images/logo/named_logo.svg') }}" style="height: 100px;">
                                    <h2 class="m-b-0">Signup</h2>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="row">
                                    @csrf
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="name">{{ __('Name') }}:</label>
                                        <div class="input-affix">
                                            <em class="prefix-icon fas fa-user"></em>
                                            <input type="text" class="form-control {{ $errors->has('name')?'is-invalid':'is-valid' }}" id="name" name="name" value="{{ old('name') }}" required autofocus placeholder="{{ __('Name') }}">
                                        </div>
                                        @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="companyName">{{ __('Company Name') }}:</label>
                                        <div class="input-affix">
                                            <em class="prefix-icon fas fa-building"></em>
                                            <input type="text" class="form-control {{ $errors->has('companyName')?'is-invalid':'is-valid' }}" id="companyName" name="companyName" value="{{ old('companyName') }}" required autofocus placeholder="{{ __('companyName') }}">
                                        </div>
                                        @error('companyName')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                                        <div class="input-affix">
                                            <em class="prefix-icon fas fa-envelope"></em>
                                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" value="{{ old('email') }}" required autofocus placeholder="{{ __('E-mail address') }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="phoneNumber">{{ __('Phone') }}:</label>
                                        <input type="text" id="phoneNumber" class="form-control {{ $errors->has('mobile_number')?'is-invalid':'is-valid' }}" name="mobile_number" value="{{ old('mobile_number') }}" required autofocus>
                                        @error('mobile_number')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="password">{{ __('Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <em class="prefix-icon fas fa-lock"></em>
                                            <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'is-valid' }}" id="password" type="password" name="password" required autocomplete="off" placeholder="{{ __('Password') }}">
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12 col-md-6">
                                        <label class="font-weight-semibold" for="password_confirmation">{{ __('Confirm Password') }}:</label>
                                        <div class="input-affix m-b-10">
                                            <em class="prefix-icon fas fa-lock"></em>
                                            <input type="password" class="form-control {{ $errors->has('password_confirmation')?'is-invalid':'is-valid' }}" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="off" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-12">
                                        <label class="font-weight-semibold" for="country">{{ __('Country') }}</label>
                                        <select class="select2 {{ $errors->has('country')?'is-invalid':'is-valid' }}" id="country" name="country" placeholder="Select Country">
                                            @foreach (\App\Models\Country::all() as $country)
                                            <option value="{{ $country->_id }}" {{ Str::lower($country->name) != 'india'?: 'selected' }}>{{ ucfirst($country->name) }}</option>
                                            @endforeach
                                        </select>
                                        @error('country')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
                                        <style>
                                            @-webkit-keyframes blinker {
                                                from {
                                                    opacity: 1.0;
                                                }

                                                to {
                                                    opacity: 0.0;
                                                }
                                            }

                                            .blink {
                                                text-decoration: blink;
                                                -webkit-animation-name: blinker;
                                                -webkit-animation-duration: 0.6s;
                                                -webkit-animation-iteration-count: infinite;
                                                -webkit-animation-timing-function: ease-in-out;
                                                -webkit-animation-direction: alternate;
                                            }
                                        </style>
                                        <label class="font-weight-semibold" for="country">For Any Assistance Related to Login/Registration,Checkout Our <a class="blink" href="{{ route('main.videos') }}" target="_blank">Video Section.</a></label>
                                    </div>

                                    <div class="form-group col-12">
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-12">
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
</x-app.guest-layout>