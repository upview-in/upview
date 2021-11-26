@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Users</li>
@endsection

@section('custom-styles')
@endsection

@section('custom-scripts')
@endsection

<x-admin-app-layout title="Users">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card radius-10">
                <div class="card-body">
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
                                        <form action="{{ route('admin.users.destroy', $user->id) }}">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm p-0"><i class="bx bx-edit text-primary fs-5"></i></a>
                                            <button type="submit" class="btn btn-sm p-0">
                                                <i class="bx bx-trash text-danger fs-5"></i>
                                            </button>
                                        </form>
                                    </th>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->mobile }}</td>
                                    <!-- <td></td> -->
                                    <td>{{ $user->created_at }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-app-layout>