@section('path-navigation')
<li class="breadcrumb-item active" aria-current="page">Orders</li>
@endsection

<x-admin.app-layout title="Orders">
    <div class="card border-top border-0 border-4 border-primary">
        <div class="card-body p-5">
            <div class="card-title d-flex align-items-center">
                <div class="d-flex align-items-center w-100">
                    <em class="bi bi-tags me-2 font-22 text-primary"></em>
                    <h5 class="mb-0 text-primary">{{ __('Orders') }}</h5>
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
                            <th scope="col">#</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Payment ID</th>
                            <th scope="col">Plan</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Purchased Date</th>
                            <th scope="col">Expired At</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!$userOrders->total())
                            <tr>
                                <td colspan="100" class="text-center pt-5 pb-5">Oops! No data found.</td>
                            </tr>
                        @endif

                        @foreach($userOrders as $key => $userOrder)
                            @php
                                $paid_amount = $order->payment_details['amount_received'] ?? 0;
                            @endphp
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $userOrder->id }}</td>
                                <td>{{ $userOrder->payment_id ?? '' }}</td>
                                <td>{{ $userOrder->plan->name ?? '' }}</td>
                                <td>${{ $paid_amount != 0 ? round($paid_amount / 100) : 0 }}</td>
                                <td>{{ \Carbon\Carbon::parse($userOrder->purchased_at)->toDateString() }}</td>
                                <td>{{ \Carbon\Carbon::parse($userOrder->expired_at)->toDateString() }}</td>
                                <td class="font-weight-bolder text-{{ \App\Models\UserOrder::$status_color[$userOrder->status ?? 0] }}">{{ \App\Models\UserOrder::$status[$userOrder->status ?? 0] }}</td>
                                <td>{{ $userOrder->created_at }}</td>
                                <td class="text-center">
                                    <a href="{{ $userOrder->payment_details['charges']['data'][0]['receipt_url'] ?? '#' }}" title="Download receipt" target="_blank"><em class="bi bi-download"></em></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $userOrders->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-admin.app-layout>