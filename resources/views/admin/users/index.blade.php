@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection

@section('custom-styles')
<style>
</style>
@endsection

@section('custom-scripts')
<script>
</script>
@endsection

<x-admin.app-layout title="Users">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bi bi-person me-2 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Users') }}</h5>
                </div>
                <div class="flex-shrink-1 pointer">
                    <a href="{{ route('admin.users.create') }}" class="d-flex align-items-center"><em class="bi bi-plus-circle me-1 font-22 text-primary"></em> <strong>Create</strong></a>
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
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Enabled</th>
                            <th scope="col">Verified</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">
                                <form class="ajax-form" method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                                    @method('delete')
                                    @csrf
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm p-1">
                                        <em class="bi bi-pencil-square text-primary fs-5"></em>
                                    </a>
                                    <button type="submit" class="btn btn-sm p-1 remove-table-row">
                                        <em class="bi bi-x-circle text-danger fs-5"></em>
                                    </button>
                                </form>
                            </th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <td>
                                <form class="ajax-form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="enabled" value="false">
                                        <input class="form-check-input" name="enabled" type="checkbox" value="true" onchange="$(this).closest('form').submit();" {{ ($user->enabled ?? true)?'checked':'' }}>
                                    </div>
                                </form>
                            </td>
                            <td>
                                <form class="ajax-form" method="POST" action="{{ route('admin.users.update', $user->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="verified" value="false">
                                        <input class="form-check-input" name="verified" type="checkbox" value="true" onchange="$(this).closest('form').submit();" {{ ((bool)$user->email_verified_at)?'checked':'' }}>
                                    </div>
                                </form>
                            </td>
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>