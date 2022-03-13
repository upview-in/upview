@section('path-navigation')
<a class="breadcrumb-item active">Packages</a>
@endsection
<x-app.app-layout title="Choose Packages">
    <div class="row">
        @foreach ($packages as $package)
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('panel.packageDetails', encrypt($package)) }}">
                    <div class="card">
                        <div class="card-body">
                            <div class="media align-items-center">
                                <em class="fas fa-puzzle-piece text-danger fs-20"></em>
                                <div class="m-l-15">
                                    <h2 class="m-b-0">{{ $package ?? 'N/A' }}</h2>
                                    <p class="m-b-0 text-muted">Click to expand</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</x-app.app-layout>
