@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Permissions</li>
@endsection

@section('custom-styles')
@endsection

@section('custom-scripts')
@endsection

<x-admin.app-layout title="Permissions">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bi bi-shield-shaded me-2 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Permissions') }}</h5>
                </div>
                <div class="d-flex flex-shrink-1 pointer">
                    <a class="d-flex align-items-center ps-3 text-success" onclick="$('#import-file').click()"><em class="bi bi-cloud-arrow-up me-1 font-22"></em> <strong>Import</strong></a>
                    <form class="ajax-form hidden" method="POST" action="{{ route('admin.userPermissions.import') }}">
                        @csrf
                        <div class="input-group">
                            <input type="file" name="file" id="import-file" onchange="$(this).closest('form').submit();">
                        </div>
                    </form>
                    <a href="{{ route('admin.userPermissions.export') }}" class="d-flex align-items-center ps-3 text-warning"><em class="bi bi-cloud-arrow-down me-1 font-22"></em> <strong>Export</strong></a>
                    <a href="{{ route('admin.userPermissions.create') }}" class="d-flex align-items-center ps-5"><em class="bi bi-plus-circle me-1 font-22 text-primary"></em> <strong>Create</strong></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3 col-sm-6 col-12">
                    <form method="GET">
                        <div class="input-group">
                            <span class="input-group-text bg-transparent"><em class="bi bi-search"></em></span>
                            <input type="text" class="form-control border-start-0" name="search" value="{{ request()->search ?? '' }}" placeholder="Search...">
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <thead>
                        <tr>
                            <th scope="col">Actions</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Enabled</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$userPermissions->total())
                            <tr>
                                <td colspan="100" class="text-center pt-5 pb-5">Oops! No data found.</td>
                            </tr>
                        @endif

                        @foreach($userPermissions as $userPermission)
                        <tr>
                            <th scope="row">
                                <form class="ajax-form" method="POST" action="{{ route('admin.userPermissions.destroy', $userPermission->id) }}">
                                    @method('delete')
                                    @csrf
                                    <a href="{{ route('admin.userPermissions.edit', $userPermission->id) }}" class="btn btn-sm p-1">
                                        <em class="bi bi-pencil-square text-primary fs-5"></em>
                                    </a>
                                    <button type="submit" class="btn btn-sm p-1 remove-table-row">
                                        <em class="bi bi-x-circle text-danger fs-5"></em>
                                    </button>
                                </form>
                            </th>
                            <td>{{ $userPermission->name }}</td>
                            <td>{{ $userPermission->slug }}</td>
                            <td>
                                <form class="ajax-form" method="POST" action="{{ route('admin.userPermissions.update', $userPermission->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="enabled" value="false">
                                        <input class="form-check-input" name="enabled" type="checkbox" value="true" onchange="$(this).closest('form').submit();" {{ ($userPermission->enabled ?? true)?'checked':'' }}>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $userPermission->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $userPermissions->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>