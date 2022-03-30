@section('path-navigation')
{{-- <a class="breadcrumb-item" href="#">Breadcrumb 1</a> --}}
<span class="breadcrumb-item active">Edit Profile</span>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {

        $("#avatarImg").click(function(e) {
            e.preventDefault();
            $("#avatar").click();
        });

        $("#country").change(function() {
            var country_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('get_states_list') }}",
                data: {
                    "_id": country_id
                },
                dataType: "json",
                success: function(response) {
                    $("#state").select2("val", "");
                    $("#state").empty();
                    $("#city").select2("val", "");
                    $("#city").empty();
                    $.each(response, function(indexInArray, valueOfElement) {
                        $("#state").append(new Option(valueOfElement.name.replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        }), valueOfElement._id));
                    });
                }
            });
        });

        $("#state").change(function() {
            var country_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('get_city_list') }}",
                data: {
                    "_id": country_id
                },
                dataType: "json",
                success: function(response) {
                    $("#city").select2("val", "");
                    $("#city").empty();
                    $.each(response, function(indexInArray, valueOfElement) {
                        $("#city").append(new Option(valueOfElement.name.replace(/\b[a-z]/g, function(letter) {
                            return letter.toUpperCase();
                        }), valueOfElement._id));
                    });
                }
            });
        });
    });
</script>
@endsection

@section('custom-css')
<style>
    .select2-choice>label,
    .select2-choice>span {
        line-height: 2.5375rem;
    }

    .select2-container .select2-choice {
        height: 2.5375rem !important;
    }
</style>
@endsection

<x-app.app-layout title="Edit Profile">

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Basic Infomation') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('panel.user.profile.change_avatar') }}">

                    @if(session()->get('message2'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message2') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @csrf
                    <div class="media align-items-center">
                        <div class="avatar avatar-image  m-h-10 m-r-15" style="height: 80px; width: 80px">
                            <img src="{{Auth::user()->getFirstMediaUrl('avatars', 'thumb') }}" alt="{{ Auth::user()->name }}" id="avatarImg" class="pointer">
                            <input id="avatar" name="avatar" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg">
                        </div>
                        <div class="m-l-20 m-r-20">
                            <h5 class="m-b-5 font-size-18">{{ __('Change Avatar') }}</h5>
                            <p class="opacity-07 font-size-13 m-b-0">
                                {{ __('Recommended Aspect Ratio') }}: 1:1<br>
                                Max file size: 6MB
                            </p>
                        </div>
                        <div>
                            <button id="btnUpdateAvatar" class="btn btn-tone btn-primary">{{ __('Upload') }}</button>
                        </div>
                    </div>
                    @error('avatar')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </form>
                <hr class="m-v-25">
                <form method="POST" action="{{ route('panel.user.profile.change_basic_profile') }}">

                    @if(session()->get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="userName">{{ __('User Name') }}</label>
                            <input type="text" class="form-control" id="userName" name="name" placeholder="User Name" value="{{ old('name') ?? $user->name }}">
                            @error('name')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-semibold" for="email">{{ __('Email') }}</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') ?? $user->email }}">
                            @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="phoneNumber">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control" id="phoneNumber" name="mobile_number" value="{{ old('mobile_number') ?? $user->mobile_number }}">
                            @error('mobile_number')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="dob">{{ __('Date of Birth') }}</label>
                            <div class="input-affix m-b-10">
                                <em class="prefix-icon anticon anticon-calendar"></em>
                                <input type="text" class="form-control datepicker-input" id="dob" name="birth_date" placeholder="Date of Birth" value="{{ old('birth_date') ?? $user->birth_date }}">
                            </div>
                            @error('birth_date')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label class="font-weight-semibold" for="language">{{ __('Language') }}</label>
                            <select id="language" name="local_lang" class="select2">
                                @foreach (\Functions::getAvailableLanguages() as $lang)
                                @php
                                $lang = \App\Models\Language::where('code', $lang)->first();
                                if (is_null($lang)) { continue; }
                                @endphp
                                <option {{ Auth::user()->local_lang !== $lang->code ?: "selected" }} value="{{ $lang->code }}">{{ $lang->name . ' (' . $lang->native_name . ')' }}</option>
                                @endforeach
                            </select>
                            @error('local_lang')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <button id="btnProfileFormSubmit" class="btn btn-success">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Change Password') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('panel.user.profile.change_password') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="oldPassword">{{ __('Old Password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('current_password')?'is-invalid':'is-valid' }}"" id=" oldPassword" name="current_password" placeholder="Old Password">
                            @error('current_password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="newPassword">{{ ('New Password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('new_password')?'is-invalid':'is-valid' }}"" id=" newPassword" name="new_password" placeholder="New Password">
                            @error('new_password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label class="font-weight-semibold" for="confirmPassword">{{ __('Confirm Password') }}</label>
                            <input type="password" class="form-control {{ $errors->has('new_password')?'is-invalid':'is-valid' }}" id="confirmPassword" name="confirm_new_password" placeholder="Confirm Password">
                        </div>
                        <div class="form-group col-md-3 align-self-end">
                            <button class="btn btn-primary">{{ __('Change') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Address Details') }}</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('panel.user.profile.change_address') }}">

                    @if(session()->get('message1'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message1') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label class="font-weight-semibold" for="country">{{ __('Country') }}</label>
                            @php
                            $selected_country = \Functions::getUserCountry();
                            @endphp
                            <select class="select2" id="country" name="country" placeholder="Select Country">
                                @foreach (\App\Models\Country::all() as $country)
                                <option value="{{ $country->_id }}" {{ is_null($selected_country)?:$country->_id != $selected_country->_id?:'selected' }}>{{ ucfirst($country->name) }}</option>
                                @endforeach
                            </select>
                            @error('country')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label class="font-weight-semibold" for="state">{{ __('State') }}</label>
                            <select class="select2" id="state" name="state" placeholder="Select State">
                                @php
                                $selected_state = \Functions::getUserState();
                                @endphp
                                @if (!is_null($selected_state))
                                <option value="{{ $selected_state->_id }}" selected>{{ ucfirst($selected_state->name) }}</option>
                                @endif
                            </select>
                            @error('state')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4 col-md-4 col-sm-6 col-12">
                            <label class="font-weight-semibold" for="city">{{ __('City') }}</label>
                            <select class="select2" id="city" name="city" placeholder="Select city">
                                @php
                                $selected_city = \Functions::getUserCity();
                                @endphp
                                @if (!is_null($selected_city))
                                <option value="{{ $selected_city->_id }}" selected>{{ ucfirst($selected_city->name) }}</option>
                                @endif
                            </select>
                            @error('city')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label class="font-weight-semibold" for="fullAddress">{{ __('Address') }}</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ?? $user->address }}" placeholder="Address">
                            @error('address')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <button class="btn btn-info">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app.app-layout>