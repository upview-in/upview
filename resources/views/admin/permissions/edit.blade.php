@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.userPermissions.index') }}">Permissions</a></li>
<li class="breadcrumb-item active" aria-current="page">{{ $userPermission->name }}</li>
@endsection

@section('custom-scripts')
@if(session()->get('message'))
<script>
    notify('success', "{{ session()->get('message') }}", 'check');
</script>
@endif
@endsection

@section('custom-styles')
@endsection

<x-admin-app-layout title="Permissions" back=true>
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div>
                    <em class="bx bxs-user me-1 font-22 text-primary"></em>
                </div>
                <h5 class="mb-0 text-primary">{{ __('Basic') }}</h5>
            </div>
            <hr>
            <form class="ajax-form" method="POST" action="{{ route('admin.userPermissions.update', $userPermission->id) }}">
                @method('patch')
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label font-weight-semibold required" for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') ?? $userPermission->name }}" required>
                        @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label font-weight-semibold required" for="slug">{{ __('Slug') }}</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug') ?? $userPermission->slug }}" required>
                        @error('slug')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-success">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-admin-app-layout>