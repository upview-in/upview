@section('custom-css')
<style>
    .login-bg {
        background-image: url('{{ asset("images/others/login-3.png") }}')
    }
</style>
@endsection

@section('custom-scripts')
    <script>
        $(document).ready(function () {
            function sendOTP() {
                $.ajax({
                    url: '{{ route("verification.sendOTP") }}',
                    type: 'GET',
                    success: function (data) {
                        $('#otp_error strong').html(data.message);
                        $('#otp_error').removeClass('d-none');
                    }
                });
            }

            $("#resend_otp").click(function() {
                sendOTP();
            });

            sendOTP();
        });
    </script>
@endsection

<x-app.guest-layout>
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
                                    {{ __("Thanks for signing up! Before you get started, You will be required to verify your identity. Don't worry, we've just sent you an email/SMS that you provided during signup process with a link to verify your account. If you didn't receive the email/SMS, we will gladly send you another.") }}
                                </div>

                                @if (session('status') == 'verification-sent')
                                    <div class="mb-4 font-medium text-sm text-success">
                                        {{ __('An OTP has been sent to the mobile number and email address.') }}
                                    </div>
                                @else
                                    <div class="mb-4 font-medium text-sm text-success">
                                        We just sent you OTP on email address and mobile number
                                    </div>
                                @endif

                                <form method="post" action="{{ route('verification.check') }}">
                                    @csrf
                                    <input type="text" class="form-control" name="otp" placeholder="Enter OTP">
                                    @error('otp')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="text-warning d-none" id="otp_error" role="alert">
                                        <strong></strong>
                                    </span>

                                    <div class="form-group mt-3">
                                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                                        <a href="#" class="btn btn-sm btn-primary" id="resend_otp">{{ __('Resend') }}</a>
                                        <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">{{ __('Logout') }}</a>
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