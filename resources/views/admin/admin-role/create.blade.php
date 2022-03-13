@section('path-navigation')
<li class="breadcrumb-item" aria-current="page"><a href="{{ route('admin.adminRoles.index') }}">Roles</a></li>
<li class="breadcrumb-item active" aria-current="page">Create plan</li>
@endsection

@section('custom-scripts')
<script>
    $(document).ready(function () {
        $('.module-switch').change(function () {
            let changeTo = $(this).prop('checked');
            let moduleName = $(this).data('module-name');

            $('.permission-switch').each((index, element) => {
                if($(element).data('module-name') == moduleName) {
                    $(element).prop('checked', changeTo);
                }
            });
        });

        $('.column-switch').change(function () {
            let changeTo = $(this).prop('checked');
            let columnName = $(this).data('column-name');

            $('.permission-switch').each((index, element) => {
                if($(element).data('column-name') == columnName) {
                    $(element).prop('checked', changeTo);
                }
            });
        });

        $('.checkall-switch').change(function () {
            let changeTo = $(this).prop('checked');
            let groupName = $(this).data('group-name');

            $('.module-switch').each((index, element) => {
                if($(element).data('group-name') == groupName) {
                    $(element).prop('checked', changeTo);
                }
            });

            $('.column-switch').each((index, element) => {
                if($(element).data('group-name') == groupName) {
                    $(element).prop('checked', changeTo);
                }
            });

            $('.permission-switch').each((index, element) => {
                if($(element).data('group-name') == groupName) {
                    $(element).prop('checked', changeTo);
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
    .permissions-group > .module-group {
        white-space: nowrap;
        flex-wrap: nowrap;
    }

    .permissions-group > .module-group > .permission-item {
        display: inline-block;
        float: none;
    }

    .module-group {
        display: table !important;
    }

    .permission-item {
        display: table-cell !important;
        min-width: 200px;
        max-width: max-content;
        width: 200px;
    }

    .permission-item > div > label {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        min-width: 100px;
        max-width: 100px;
        width: 100px;
    }

    .nav-tabs {
        height: 50px;
        display: block;
        overflow-x: auto;
        overflow-y: hidden;
    }

    .nav-tabs > .nav-item {
        display: table-cell;
    }
</style>
@endsection

<x-admin.app-layout title="Roles">
    <form class="ajax-form" method="POST" enctype="multipart/form-data" action="{{ route('admin.adminRoles.store') }}" reset=true>
        @csrf
        <div class="card border-top border-0 border-4 border-primary">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div class="d-flex align-items-center w-100">
                        <em class="bi bi-person me-1 font-22 text-primary"></em>
                        <h5 class="mb-0 text-primary">{{ __('Basic') }}</h5>
                    </div>
                    <div class="d-flex align-items-center flex-shrink-1 pointer" onclick="$(this).closest('form').submit();">
                        <em class="bi bi-plus-circle me-1 font-22 text-primary"></em>
                        <strong>Create</strong>
                    </div>
                </div>
                <hr>
                <div class="row g-4">
                    <div class="col-md-6 col-sm-6 col-12">
                        <label class="form-label font-weight-semibold required" for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-md-6 col-sm-6 col-12">
                        <label class="form-label font-weight-semibold required" for="slug">{{ __('Slug') }}</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" value="{{ old('slug') }}" required>
                        @error('slug')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-top border-0 border-4 border-success">
            <div class="card-body p-5">
                <div class="card-title d-flex align-items-center">
                    <div class="d-flex align-items-center w-100">
                        <em class="bi bi-fingerprint me-1 font-22 text-success"></em>
                        <h5 class="mb-0 text-success">{{ __('Modules & Permissions') }}</h5>
                    </div>
                </div>
                <hr>
                <ul class="nav nav-tabs nav-success" role="tablist">
                    @foreach ($adminPermissionHelper->getGroups() as $index => $groupName)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link @once active @endonce" data-bs-toggle="tab" href="#tab{{ $index }}" role="tab" aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">
                                        <strong>{{ $groupName }}</strong>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content py-3">
                    @foreach ($adminPermissionHelper->getGroups() as $index => $groupName)
                        <div class="permissions-group tab-pane fade show overflow-auto @once active @endonce" id="tab{{ $index }}" role="tabpanel">
                            <div class="module-group">
                                <div class="permission-item p-3 border-end border-bottom fs-6">
                                    <div class="form-check form-switch d-flex">
                                        <input class="form-check-input checkall-switch" data-group-name="{{ $groupName }}" type="checkbox">
                                        <label class="form-check-label ms-3" title="All {{ $groupName }}"><strong>All {{ $groupName }}</strong></label>
                                    </div>
                                </div>
                                @foreach($adminPermissionHelper->getPermissionsColumnsFromGroup($groupName) as $column)
                                    <div class="permission-item p-3 border-end border-bottom fs-6">
                                        <div class="form-check form-switch d-flex justify-content-center">
                                            <input class="form-check-input column-switch" data-group-name="{{ $groupName }}" data-column-name="{{ $column }}" type="checkbox">
                                            <label class="form-check-label ms-3" title="{{ $column }}"><strong>{{ $column }}</strong></label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            @foreach($adminPermissionHelper->getModulesFromGroup($groupName) as $index => $moduleName)
                                <div class="module-group">
                                    <div class="permission-item p-3 border-end border-bottom fs-6">
                                        <div class="form-check form-switch d-flex">
                                            <input class="form-check-input module-switch" type="checkbox" data-group-name="{{ $groupName }}" data-module-name="{{ $moduleName }}" value="{{ $index }}">
                                            <label class="form-check-label ms-3"><strong>{{ $moduleName }}</strong></label>
                                        </div>
                                    </div>
                                    @foreach($adminPermissionHelper->getPermissionsColumnsFromGroup($groupName) as $column)
                                        @if(!empty($adminPermissionHelper->getSlug($groupName, $moduleName, $column)))
                                            <div class="permission-item p-3 border-end border-bottom">
                                                <div class="form-check form-switch d-flex justify-content-center">
                                                    <input class="form-check-input permission-switch" type="checkbox" name="permissions[]" data-group-name="{{ $groupName }}" data-module-name="{{ $moduleName }}" data-column-name="{{ $column }}" value="{{ $adminPermissionHelper->getSlug($groupName, $moduleName, $column) }}">
                                                </div>
                                            </div>
                                        @else
                                            <div class="permission-item p-3 border-end border-bottom"></div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</x-admin.app-layout>