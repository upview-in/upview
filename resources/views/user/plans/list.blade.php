@section('path-navigation')
<a class="breadcrumb-item">Pricing</a>
<a class="breadcrumb-item active">Plans</a>
@endsection

@section('custom-css')
<style>
    .price-card {
        position: relative;
        max-width: 300px;
        height: auto;
        border-radius: 15px;
        /* margin: 0 auto; */
        margin: 0 18px;
        padding: 0;
        -webkit-box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        -webkit-transition: 0.5s;
        transition: 0.5s;
    }

    .price-card:hover {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

    .price-card .card::before {
        content: "";
        position: absolute;
        bottom: 46px;
        left: 49px;
        width: 67%;
        height: 34%;
        background: rgba(255, 255, 255, 0.1);
        z-index: 1;
        -webkit-transform: skewY(-5deg) scale(1.5);
        transform: skewY(-5deg) scale(1.5);
    }

    .price-card:nth-child(5n+1) .card,
    .price-card:nth-child(5n+1) .card .title .fa {
        background: linear-gradient(-45deg, #6503f4, #7797f4);
    }

    .price-card:nth-child(5n+2) .card,
    .price-card:nth-child(5n+2) .card .title .fa {
        background: linear-gradient(-45deg, #ff9141, #ffe843);
    }

    .price-card:nth-child(5n+3) .card,
    .price-card:nth-child(5n+3) .card .title .fa {
        background: linear-gradient(-45deg, #0fbbff, #00ff1c);
    }

    .price-card:nth-child(5n+4) .card,
    .price-card:nth-child(5n+4) .card .title .fa {
        background: linear-gradient(-45deg, #000a99, #00f3ff);
    }

    .price-card:nth-child(5n+5) .card,
    .price-card:nth-child(5n+5) .card .title .fa {
        background: linear-gradient(-45deg, #f40330, #e464f6);
    }

    .title .fa {
        color: #fff;
        font-size: 60px;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        text-align: center;
        line-height: 100px;
        -webkit-box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
    }

    .title h2 {
        position: relative;
        margin: 20px 0 0;
        padding: 0;
        color: #fff;
        font-size: 28px;
        z-index: 2;
    }

    .price {
        position: relative;
        z-index: 2;
    }

    .price h4 {
        margin: 0;
        padding: 20px 0;
        color: #fff;
        font-size: 60px;
    }

    .option {
        overflow-y: auto;
        height: 120px;
        margin: 0 0 10px;
        padding: 0;
        list-style: none;
        color: #ffffff;
        font-size: 16px;
        z-index: 100;
    }

    .option * {
        color: white;
    }

    .price-card .card {
        margin-bottom: 0;
        padding: 40px 20px;
        border-radius: 15px;
    }

    .price-card .card a {
        position: relative;
        z-index: 2;
        background: #fff;
        color: black;
        width: 150px;
        height: 40px;
        line-height: 40px;
        border-radius: 40px;
        display: block;
        text-align: center;
        margin: 20px auto 0;
        font-size: 16px;
        cursor: pointer;
        -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .price-card .card a:hover {
        text-decoration: none;
    }

    .alert {
        color: white;
        font-weight: bold;
        padding: 16px;
    }

    .alert-danger {
        background-color: rgb(255, 84, 0);
    }

    .alert-info {
        background-color: rgb(0, 167, 232);
    }

    .alert-success {
        background-color: rgb(99, 198, 0);
    }

    .alert-warning {
        background-color: rgb(255, 192, 4);
    }

    .alert a {
        color: black;
    }
</style>
@endsection

<x-app.app-layout title="Plans">
    @if (session()->has('data'))
        <div class="mb-4 alert alert-{{ session()->get('data')['code'] ?? 'danger' }}">
            {!! session()->get('data')['message'] ?? 'Something goes wrong!' !!}
        </div>
    @endif

    <div class="row justify-content-center">
        @if (empty($plans))
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="m-b-0 text-center">No Plans are available</h2>
                    </div>
                </div>
            </div>
        @endif

        @foreach ($plans as $plan)
            <div class="col-4 price-card mb-5">
                <div class="card text-center h-100">
                    <div class="title">
                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                        <h2>{{ $plan->name ?? '-' }}</h2>
                    </div>
                    <div class="price">
                        <h4><sup>Rs. </sup>{{ $plan->price }}</h4>
                    </div>
                    <div class="option">
                        {!! $plan->shortDescription !!}
                    </div>
                    <a href="{{ route('panel.user.plans.details', $plan->id) }}">Details</a>
                </div>
            </div>
        @endforeach
    </div>
</x-app.app-layout>
