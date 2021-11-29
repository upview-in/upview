@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection

@section('custom-styles')
@endsection

@section('custom-scripts')
@endsection

<x-admin-app-layout title="Users">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bx bxs-user me-1 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Users') }}</h5>
                </div>
                <div class="flex-shrink-1 pointer">
                    <a href="{{ route('admin.users.create') }}" class="d-flex align-items-center"><em class="bx bx-plus-circle me-1 font-22 text-primary"></em> <strong>Create</strong></a>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>Actions</th>
                            <th scope="col">#UserID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <!-- <th scope="col">Enabled</th> -->
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
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm p-0">
                                        <em class="bx bx-edit text-primary fs-5"></em>
                                    </a>
                                    <button type="submit" class="btn btn-sm p-0 remove-table-row">
                                        <em class="bx bx-trash text-danger fs-5"></em>
                                    </button>
                                </form>
                            </th>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->mobile_number }}</td>
                            <!-- <td></td> -->
                            <td>{{ $user->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>