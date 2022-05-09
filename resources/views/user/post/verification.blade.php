@section('path-navigation')
<a class="breadcrumb-item" href="{{ route('panel.user.post.scheduler') }}">Posts</a>
<span class="breadcrumb-item active">Post Verification</span>
@endsection

<x-app.app-layout title="Post Verification">
    <div class="container-fluid">
        <div class="card shadow" id="highlights">
            <div class="card-header p-15 ml-3 w-500">
                <label class="h3 m-0">Post Verification</label>
            </div>
            <div class="card-body p-15 ml-3">
                <div class="table-responsive">
                    <table class="table table-borderless" data-toggle="table" data-pagination="true" data-search="true">
                        <caption></caption>
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" data-sortable="true">#</th>
                                <th scope="col" rowspan="2" data-sortable="true" data-field="Platform">Platform</th>
                                <th scope="col" rowspan="2" data-sortable="true" data-field="supported_type">Supported Media Type</th>
                                <th scope="col" colspan="2">Max Size Supported</th>
                            </tr>
                            <tr>
                                <th scope="col" data-sortable="true" data-field="images_size">Image</th>
                                <th scope="col" data-sortable="true" data-field="video_size">Video</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>