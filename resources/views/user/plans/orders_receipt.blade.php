@section('path-navigation')
<a class="breadcrumb-item">Pricing</a>
<a class="breadcrumb-item active">Orders Receipt</a>
@endsection

<x-app.app-layout title="Orders Receipt">
    <div class="card">
        <div class="card-header p-15 ml-3 w-500">
            <label class="h3 m-0">Orders History</label>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Order Id</th>
                        <th scope="col">Plan</th>
                        <th scope="col">Amount Paid</th>
                        <th scope="col">Purchased Date</th>
                        <th scope="col">Expired At</th>
                        <th scope="col">Status</th>
                        <!-- <th scope="col" class="text-center">Action</th> -->
                    </tr>

                    @if (!$orders_history->count())
                        <tr>
                            <td colspan="100" class="text-center">
                                No any order purchased yet.
                            </td>
                        </tr>
                    @endif

                    @foreach ($orders_history as $key => $order)
                        @php
                            $paid_amount = $order->payment_details['amount_received'] ?? 0;
                        @endphp
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->plan->name ?? '' }}</td>
                            <td>${{ $paid_amount != 0 ? round($paid_amount / 100) : 0 }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->purchased_at)->toDateString() }}</td>
                            <td>{{ \Carbon\Carbon::parse($order->expired_at)->toDateString() }}</td>
                            <td class="font-weight-bolder text-{{ \App\Models\UserOrder::$status_color[$order->status ?? 0] }}">{{ \App\Models\UserOrder::$status[$order->status ?? 0] }}</td>
                            <!-- <td class="text-center">
                                @if ($order->payment_gateway_using === 0)
                                    <a href="{{ $order->payment_details['charges']['data'][0]['receipt_url'] ?? '#' }}" title="Download receipt" target="_blank"><em class="fa fa-download"></em></a>
                                @endif
                            </td> -->
                        </tr>
                    @endforeach
                </table>
                <div class="mt-4">
                    {{ $orders_history->withQueryString()->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>
