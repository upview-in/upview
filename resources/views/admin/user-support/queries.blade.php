@section('path-navigation')
    <li class="breadcrumb-item" aria-current="page">Support</li>
    <li class="breadcrumb-item active" aria-current="page">Queries</li>
@endsection

<x-admin.app-layout title="Support">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bi bi-chat-square-dots me-2 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Queries') }}</h5>
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
                    <caption></caption>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Query Title</th>
                            <th scope="col">Query Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Assignee</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$queries->total())
                            <tr>
                                <td colspan="100" class="text-center pt-5 pb-5">Oops! No data found.</td>
                            </tr>
                        @endif

                        @foreach($queries as $key => $query)
                            <tr>
                                <td>{{ $key + 1 ?? '-' }}</td>
                                <td>{{ $query->query_title ?? '-' }}</td>
                                <td>{{ mb_strimwidth($query->query_description, 0, 27, '...') ?? '-' }}</td>
                                <td>
                                    @if($query->status == 0)
                                        <span class="justify-center text-danger">Pending</span>
                                    @elseif($query->status == 1)
                                        <span class="justify-center text-info">Assigned</span>
                                    @else
                                        <span class="justify-center text-success">Closed</span>
                                    @endif
                                </td>
                                <td>{{ $query->supportUser->name ?? '-' }}<br><span class="text-muted">{{ $query->supportUser->username ?? '' }}</span></td>
                                <td>{{ $query->created_at ?? '-' }}</td>
                                <th scope="row">
                                    <form class="ajax-form" method="POST" action="">
                                        @method('delete')
                                        @csrf
                                        <a href="" class="btn btn-sm p-1">
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
                <div class="mt-4">
                    {{ $queries->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>
