@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.admins.index') }}">Admins</a></li>
<li class="breadcrumb-item active" aria-current="page">Create admin</li>
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

<x-admin.app-layout title="Admins">
    <form class="ajax-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.admins.store') }}">
    @csrf
        <div class="row g-3 m-0 p-0">
            <div class="col-md-12">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-image me-2 font-22 text-success"></em>
                                <h5 class="mb-0 text-success">{{ __('Profile Picture') }}</h5>
                            </div>
                            <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                                <em class="bi bi-save me-2 font-22 text-success"></em>
                                <strong>Save</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-image ms-2 me-3" style="height: 80px; width: 80px">
                                <img src="" alt="" id="avatarImg" class="pointer">
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
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-person me-2 font-22 text-primary"></em>
                                <h5 class="mb-0 text-primary">{{ __('Basic') }}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold required" for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold required" for="username">{{ __('Username') }}</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                                @error('username')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-12 col-12">
                                <label class="form-label font-weight-semibold" for="language">{{ __('Language') }}</label>
                                <select id="language" name="local_lang" class="select2">
                                    @foreach (\Functions::getAvailableLanguages() as $lang)
                                        @php
                                            $lang = \App\Models\Language::where('code', $lang)->first();
                                            if (is_null($lang)) { continue; }
                                        @endphp
                                        <option value="{{ $lang->code }}">{{ $lang->name . ' (' . $lang->native_name . ')' }}</option>
                                    @endforeach
                                </select>
                                @error('local_lang')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-12 col-sm-12 col-12">
                                <label class="form-label font-weight-semibold required" for="plans">{{ __('Roles') }}</label>
                                <select id="plans" class="select2 w-100" name="roles[]" data-placeholder="Select Roles" data-allow-clear="true" multiple="multiple">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card border-top border-0 border-4 border-danger">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div class="d-flex align-items-center w-100">
                                <em class="bi bi-key me-2 font-22 text-danger"></em>
                                <h5 class="mb-0 text-danger">{{ __('Password') }}</h5>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="password">{{ ('Password') }}</label>
                                <input type="password" class="form-control {{ $errors->has('new_password')?'is-invalid':'' }}" id="password" name="password" placeholder="Password" required>
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label font-weight-semibold required" for="confirmPassword">{{ __('Confirm Password') }}</label>
                                <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" id="confirmPassword" name="confirm_password" placeholder="Confirm Password" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-admin.app-layout>