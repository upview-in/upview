@section('custom-styles')
    <style>
        html, body {
            height: 100%;
            background: #007bff;
            background: linear-gradient(to right, #91FFBC, #0062E6);
        }
    </style>
@endsection

@section('custom-scripts')
    {!! NoCaptcha::renderJs() !!}
@endsection

<x-support.guest-layout>
    <div class="row d-flex h-100">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto my-auto">
            <div class="card border-0 shadow rounded-3 my-5">
                <div class="card-body p-4 p-sm-5">
                    <h5 class="card-title text-center mb-5 fw-light fs-5"><strong>{{ config('app.name') }}</strong> - Support Panel</h5>
                    <form method="POST" action="{{ route('support.login') }}">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
                            <label for="floatingInput">{{ __('Username') }}</label>
                            @error('username')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
                            <label for="floatingPassword">{{ __('Password') }}</label>
                            @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck">
                            <label class="form-check-label" for="rememberPasswordCheck">
                                {{ __('Remember password') }}
                            </label>
                        </div>

                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="d-grid mt-2">
                            <button class="btn btn-primary btn-login text-uppercase fw-bold" type="submit">Sign in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-support.guest-layout>