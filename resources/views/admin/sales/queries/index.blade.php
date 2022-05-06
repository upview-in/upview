@section('path-navigation')
    <li class="breadcrumb-item" aria-current="page">Sales</li>
    <li class="breadcrumb-item active" aria-current="page">Queries</li>
@endsection

<x-admin.app-layout title="Sales">
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Number</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Message</th>
                            <th scope="col">Enquired On</th>
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
                                <td>{{ $query->name ?? '-' }}</td>
                                <td>{{ $query->email ?? '-' }}</td>
                                <td>{{ $query->number ?? '-' }}</td>
                                <td>{{ $query->subject ?? '-' }}</td>
                                <td>{{ $query->message ?? '-' }}</td>
                                <td>{{ $query->created_at ?? '-' }}</td>
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