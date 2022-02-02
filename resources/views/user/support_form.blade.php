@section('path-navigation')
<a class="breadcrumb-item" href="#">Support</a>
<span class="breadcrumb-item active">Submit Query</span>
@endsection
<x-app-layout title="Ask For Support ">
    <div class="container-fluid">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title font-size-20">{{ __('Report Query') }}</h4>
            </div>
        
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('panel.user.support.uploadQuery') }}">
                   
                    @if(session()->get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label class="font-weight-semibold" for="query">{{ __('Query Title') }}:</label>
                        <input type="text" class="form-control" id="query" name="query_title" placeholder="Enter Your Query" />
                    </div>
                    @error('query')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <label class="font-weight-semibold" for="description">{{ __('Describe Your Query') }}:</label>
                        <textarea class="form-control" id="queryDesc" name="query_description" rows="5" name="query" placeholder="Describe Your Query"></textarea>
                    </div>
                    @error('query_description')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror


                    <div class="form-group">
                        <h5 class="m-b-5 font-size-16">{{ __('Upload Query Screenshot') }}</h5>
                        <input id="queryss" name="query_ss" type="file" class="hidden" accept="image/png, image/jpeg, image/jpg">
                            <p class="opacity-07 font-size-13 m-b-0">
                                Max file size: 1MB
                            </p>
                    </div>
                    @error('query_ss')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                    <div class="form-group">
                        <button class="btn btn-success">{{ __('Submit Query') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
