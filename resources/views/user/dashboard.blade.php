<x-app.app-layout pageHeader=0>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <em class="fas fa-puzzle-piece text-danger fs-20"></em>
                        <div class="m-l-15">
                            {{-- db --}}
                            <h2 class="m-b-0">1</h2>
                            <p class="m-b-0 text-muted">Active Modules</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <em class="fas fa-book text-cyan fs-20"></em>
                        <div class="m-l-15">
                            {{-- db --}}
                            <h2 class="m-b-0">{{ $totalReports  }}</h2>
                            <p class="m-b-0 text-muted">Reports Generated</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <em class="far fa-user-circle text-gold fs-20"></em>
                        <div class="m-l-15">
                            {{-- db --}}
                            <h2 class="m-b-0">{{ $linkedAccountsCount }}</h2>
                            <p class="m-b-0 text-muted">Accounts Linked</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        {{-- db --}}
                        <em class="far fa-gem  text-purple fs-20"></em>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{ Str::length($accountLevel ) ? $accountLevel :  'Free' }}</h2>
                            <p class="m-b-0 text-muted">Account Type</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr style="border-top: 2px solid #bbb; opacity: 0.4;"/>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">{{ __('Welcome, ').Auth::user()->name  }}</h1>
        </div>

        <div class="card-body">
            <video controls width="900" style="border: 1px solid #000;">
                <source src="{{ asset('videos/upview.mp4')  }} "
                        type="video/mp4">
                Sorry, your browser doesn't support embedded videos.
            </video>
        </div>
    </div>
</div>

<div class="row">

</div>
</x-app.app-layout>
