@section('path-navigation')
    <li class="breadcrumb-item" aria-current="page">Support</li>
    <li class="breadcrumb-item active" aria-current="page">Support Requests</li>
@endsection

<x-admin-app-layout title="Support">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bi bi-chat-square-dots me-2 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Support Requests') }}</h5>
                </div>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table mb-0 align-middle">
                    <caption></caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Query Title</th>
                            <th scope="col">Query Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($supportQuery as $key => $supportQuery)
                        <tr>
                            <td>{{ $key + 1 ?? 'N/A' }}</td>
                            <td>{{ $supportQuery->query_title ?? 'N/A' }}</td>
                            <td>{{ $supportQuery->query_description ?? 'N/A' }}</td>
                            <td>
                                @if( $supportQuery->status == 0 )
                                            <span class="justify-center text-danger">Pending</span>
                                @elseif( $supportQuery->status == 1 )
                                    <span class="justify-center text-info">Assigned</span>
                                @else
                                    <span class="justify-center text-success">Closed</span>
                                @endif
                            </td>
                            <td>{{ $supportQuery->created_at ?? 'N/A' }}</td>
                            <th scope="row">
                                <form class="ajax-form" method="POST" action="{{ route('admin.userPermissions.destroy', $supportQuery->id) }}">
                                    @method('delete')
                                    @csrf
                                    <a href="{{ route('admin.userPermissions.edit', $supportQuery->id) }}" class="btn btn-sm p-1">
                                        <em class="bi bi-pencil-square text-primary fs-5"></em>
                                    </a>
                                    <button type="submit" class="btn btn-sm p-1 remove-table-row">
                                        <em class="bi bi-x-circle text-danger fs-5"></em>
                                    </button>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-app-layout>