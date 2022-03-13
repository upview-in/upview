@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.users.index') }}">Users</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $user->email }}</li>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function() {

        $("#avatarImg").click(function(e) {
            e.preventDefault();
            $("#avatar").click();
        });

        $("#avatar").change(function(e) {
            showImagePreview(this, "#avatarImg");
        });

        $("#country").change(function() {
            var country_id = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('admin.get_states_list') }}",
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
                url: "{{ route('admin.get_city_list') }}",
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

@if(session()->get('message'))
<script>
    notify('success', "{{ session()->get('message') }}", 'check');
</script>
@endif

@endsection

@section('custom-styles')
<style>
    .avatar {
        font-size: .875rem;
        text-align: center;
        background: #f1f2f3;
        color: #fff;
        white-space: nowrap;
        position: relative;
        overflow: hidden;
        vertical-align: middle;
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 50%;
        display: inline-block;
    }

    .avatar>img {
        display: block;
        width: 100%;
        height: 100%;
    }
</style>
@endsection

<x-admin.app-layout title="Users" back=true>
    <div class="row g-3 m-0 p-0">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-success">
                <form class="ajax-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-image me-2 font-22 text-success"></em>
                                <h5 class="mb-0 text-success">{{ __('Profile Picture') }}</h5>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                                <em class="bi bi-save me-2 font-22 text-success"></em>
                                <strong>Upload</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-image ms-2 me-3" style="height: 80px; width: 80px">
                                <img src="{{ $user->getFirstMediaUrl('avatars', 'thumb') }}" alt="" id="avatarImg" class="pointer">
                                <input id="avatar" name="avatar" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            <div class="ms-2 me-2">
                                <h5 class="mb-2 font-size-18">{{ __('Change Avatar') }}</h5>
                                <p class="opacity-07 font-size-13 mb-0">
                                    {{ __('Recommended Aspect Ratio') }}: 1:1<br>
                                    Max file size: 6MB
                                </p>
                            </div>
                        </div>
                        @error('avatar')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-primary">
                <form class="ajax-form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-person me-2 font-22 text-primary"></em>
                                <h5 class="mb-0 text-primary">{{ __('Basic') }}</h5>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                                <em class="bi bi-save me-2 font-22 text-primary"></em>
                                <strong>Save</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="userName">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="userName" name="name" placeholder="User Name" value="{{ old('name') ?? $user->name }}" required>
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="email" value="{{ old('email') ?? $user->email }}" required>
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-weight-semibold" for="phoneNumber">{{ __('Phone Number') }}</label>
                                <input type="text" class="form-control" id="phoneNumber" name="mobile_number" placeholder="Ex. +xx xxxxxxxxxx" value="{{ old('mobile_number') ?? $user->mobile_number }}">
                                @error('mobile_number')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-weight-semibold" for="dob">{{ __('Date of Birth') }}</label>
                                <div class="input-affix m-b-10">
                                    <em class="prefix-icon anticon anticon-calendar"></em>
                                    <input type="text" class="form-control bs-date" id="dob" name="birth_date" placeholder="Date of Birth" value="{{ old('birth_date') ?? $user->birth_date }}">
                                </div>
                                @error('birth_date')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label font-weight-semibold" for="language">{{ __('Language') }}</label>
                                <select id="language" name="local_lang" class="select2">
                                    @foreach (\Functions::getAvailableLanguages() as $lang)
                                    @php
                                    $lang = \App\Models\Language::where('code', $lang)->first();
                                    if (is_null($lang)) { continue; }
                                    @endphp
                                    <option {{ $user->local_lang !== $lang->code ?: "selected" }} value="{{ $lang->code }}">{{ $lang->name . ' (' . $lang->native_name . ')' }}</option>
                                    @endforeach
                                </select>
                                @error('local_lang')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <label class="form-label font-weight-semibold" for="plans">{{ __('Plans') }}</label>
                                <select id="plans" class="select2 w-100" name="roles[]" data-placeholder="Choose plans" data-allow-clear="true" multiple="multiple">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ !in_array($role->id, $assignedRoles)?:'selected' }}>{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-danger">
                <form class="ajax-form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-key me-2 font-22 text-danger"></em>
                                <h5 class="mb-0 text-danger">{{ __('Password') }}</h5>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                                <em class="bi bi-save me-2 font-22 text-danger"></em>
                                <strong>Save</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="newPassword">{{ ('New Password') }}</label>
                                <input type="password" class="form-control {{ $errors->has('new_password')?'is-invalid':'' }}" id="newPassword" name="new_password" placeholder="New Password" required>
                                @error('new_password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="confirmPassword">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control {{ $errors->has('new_password')?'is-invalid':'' }}" id="confirmPassword" name="confirm_new_password" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-warning">
                <form class="ajax-form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @method('patch')
                    @csrf
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-geo-alt me-2 font-22 text-warning"></em>
                                <h5 class="mb-0 text-warning">{{ __('Address') }}</h5>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                                <em class="bi bi-save me-2 font-22 text-warning"></em>
                                <strong>Save</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold" for="country">{{ __('Country') }}</label>
                                @php
                                $selected_country = \Functions::getUserCountry($user);
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
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold" for="state">{{ __('State') }}</label>
                                <select class="select2" id="state" name="state" placeholder="Select State">
                                    @php
                                    $selected_state = \Functions::getUserState($user);
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
                            <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold" for="city">{{ __('City') }}</label>
                                <select class="select2" id="city" name="city" placeholder="Select city">
                                    @php
                                    $selected_city = \Functions::getUserCity($user);
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
                            <div class="col-md-12">
                                <label class="form-label font-weight-semibold" for="fullAddress">{{ __('Address') }}</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') ?? $user->address }}" placeholder="Address">
                                @error('address')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin.app-layout>