@section('custom-scripts')
    <script>
        $(document).ready(function () {
            var form_data = $(this).serialize();

            function sendOTP() {
                $.ajax({
                    url: '{{ route("password.sendOTP") }}',
                    type: 'GET',
                    data: form_data,
                    success: function (data) {
                        $('#otp_error strong').html(data.message);
                        $('#otp_error').removeClass('d-none');
                    }
                });
            }

            $("#resend_otp").click(function() {
                sendOTP();
            });

            $(document).on('submit', '#form_email_phone', function (e) {
                e.preventDefault();
                form_data = $(this).serialize();

                $.ajax({
                    url: '{{ route("password.sendOTP") }}',
                    type: 'GET',
                    data: form_data,
                    success: function (data) {
                        if (!data.code) {
                            $('#form_email_phone').addClass('d-none');
                            $('#form_otp').removeClass('d-none');

                            $('#otp_error strong').html(data.message);
                            $('#otp_error').removeClass('d-none');
                        } else {
                            $('#user_error strong').html(data.message);
                            $('#user_error').removeClass('d-none');
                        }
                    }
                });
            });

            $(document).on('submit', '#form_otp', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route("password.check") }}',
                    type: 'POST',
                    data: form_data + '&' + $(this).serialize(),
                    success: function (data) {
                        if (data.redirect) {
                            window.location = data.redirect_to;
                            return;
                        }

                        $('#otp_input_error strong').html(data.message);
                        $('#otp_input_error').removeClass('d-none');
                    }
                });
            });
        });
    </script>
@endsection

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
                                    <h2 class="m-b-0">Recovery</h2>
                                </div>

                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-success">
                                    {{ session('status') }}
                                </div>
                                @endif

                                <div class="m-b-10">
                                    <label>{{ __('Forgot your password? No problem. Just let us know your email address or mobile number and we will email/SMS you an OTP.') }}</label>
                                </div>

                                <form method="get" action="{{ route('password.sendOTP') }}" id="form_email_phone">
                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="email">{{ __('Email') }}:</label>
                                        <div class="input-affix">
                                            <em class="prefix-icon anticon anticon-mail"></em>
                                            <input type="email" class="form-control {{ $errors->has('email')?'is-invalid':'is-valid' }}" id="email" name="email" value="{{ old('email') }}" placeholder="{{ __('E-mail address') }}">
                                        </div>
                                        @error('email')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <span>
                                            <strong>OR</strong>
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <label class="font-weight-semibold" for="phoneNumber">{{ __('Phone') }}:</label>
                                        <input type="text" id="phoneNumber" class="form-control {{ $errors->has('mobile_number')?'is-invalid':'is-valid' }}" name="mobile_number" autofocus>
                                        @error('mobile_number')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <span class="text-warning d-none" id="user_error" role="alert">
                                        <strong></strong>
                                    </span>

                                    <div class="form-group">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">{{ __('Back') }}</a>
                                            <button class="btn btn-sm btn-info">{{ __('Send OTP') }}</button>
                                        </div>
                                    </div>
                                </form>

                                <form method="post" action="{{ route('password.check') }}" id="form_otp" class="d-none">
                                    <hr>
                                    @csrf
                                    <label class="font-weight-semibold" for="otp">{{ __('Enter OTP') }}:</label>
                                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP">
                                    <span class="invalid-feedback d-block" id="otp_input_error" role="alert">
                                        <strong></strong>
                                    </span>

                                    <span class="text-warning d-none" id="otp_error" role="alert">
                                        <strong></strong>
                                    </span>

                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                        <a href="#" class="btn btn-sm btn-primary" id="resend_otp">{{ __('Resend') }}</a>
                                        <a href="{{ route('login') }}" class="btn btn-sm btn-secondary">{{ __('Sign In') }}</a>
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