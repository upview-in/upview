@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.support.users.index') }}">Support</a></li>
<li class="breadcrumb-item" aria-current="page">Users</li>
<li class="breadcrumb-item active" aria-current="page">{{ $supportUser->username }}</li>
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

<x-admin.app-layout title="Users" back=true>
    <div class="row g-3 m-0 p-0">
        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-success">
                <form class="ajax-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.support.users.update', ['user' => $supportUser->id]) }}">
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
                            <div class="avatar avatar-image ms-2 me-3" style="height: 80px; width: 80px; flex-shrink: 0;">
                                <img src="{{ $supportUser->getFirstMediaUrl('avatars', 'thumb') }}" alt="" id="avatarImg" class="pointer">
                            </div>
                            <input id="avatar" name="avatar" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg">
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
                <form class="ajax-form" method="POST" action="{{ route('admin.support.users.update', $supportUser->id) }}">
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
                            <div class="col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold required" for="userName">{{ __('Name') }}</label>
                                <input type="text" class="form-control" id="userName" name="name" placeholder="User Name" value="{{ old('name') ?? $supportUser->name }}" required>
                                @error('name')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4 col-sm-6 col-12">
                                <label class="form-label font-weight-semibold required" for="username">{{ __('Username') }}</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username') ?? $supportUser->username }}" required>
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
                                    <option {{ $supportUser->local_lang !== $lang->code ?: "selected" }} value="{{ $lang->code }}">{{ $lang->name . ' (' . $lang->native_name . ')' }}</option>
                                    @endforeach
                                </select>
                                @error('local_lang')
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

        <div class="col-md-12">
            <div class="card border-top border-0 border-4 border-danger">
                <form class="ajax-form" method="POST" action="{{ route('admin.support.users.update', $supportUser->id) }}">
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
    </div>
</x-admin.app-layout>