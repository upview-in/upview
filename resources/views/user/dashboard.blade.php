<x-app-layout pageHeader=0>
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <i class="fas fa-puzzle-piece text-danger fs-20"></i>
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
                        <i class="fas fa-book text-cyan fs-20"></i>
                        <div class="m-l-15">
                            {{-- db --}}
                            <h2 class="m-b-0">0</h2>
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
                        <i class="far fa-user-circle text-gold fs-20"></i>
                        <div class="m-l-15">
                            {{-- db --}}
                            <h2 class="m-b-0">2</h2>
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
                        <i class="far fa-gem  text-purple fs-20"></i>
                        <div class="m-l-15">
                            <h2 class="m-b-0">Enterprise</h2>
                            <p class="m-b-0 text-muted">Account Type</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<hr style="border-top: 2px solid #bbb; opacity: 0.4;"/>
<div class="row">
    <div class="col">
        <h1 class="text-left">Welcome, George</h1>
    </div>
</div>

<div class="row">
    <video controls width="900"  style="border: 1px solid #000;">

        <source src="{{ asset('videos/upview.mp4')  }} "
                type="video/mp4">
        Sorry, your browser doesn't support embedded videos.
    </video>
</div>
</x-app-layout>
