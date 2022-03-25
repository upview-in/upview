@section('path-navigation')
<a class="breadcrumb-item" href="#">Posts</a>
<span class="breadcrumb-item active">Post History</span>
@endsection
<x-app.app-layout title="Post History">
    <div class="container-fluid">
        <div class="card shadow" id="highlights">
            <div class="card-header p-15 ml-3 w-500">
				<label class="h3 m-0">Post History</label>
			</div>
            <div class="card-body p-15 ml-3">
                <div class="table-responsive">
                    {{-- Success Message Div --}}
                    @if(session()->get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success:</strong> {{ session()->get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    {{-- Success Message Div End --}}
                    <table class="table table-borderless" data-toggle="table" data-pagination="true" data-search="true">
                        <caption></caption>
                        <thead>
							<tr>
								<th scope="col" data-sortable="true">#</th>
								<th scope="col" data-sortable="true" data-field="posted_from_profile">Posted From Profile</th>
								<th scope="col" data-sortable="true" data-field="posted_on_platforms">Posted on Platforms</th>
								<th scope="col" data-sortable="true" data-field="caption">Caption</th>
								<th scope="col" data-sortable="true" data-field="status">Status</th>
								<th scope="col" data-sortable="true" data-field="postedBy">Posted By</th>
								<th scope="col" data-sortable="true" data-field="posted_on">Posted On</th>
							</tr>
						</thead>
                        <tbody>
                            @foreach($postHistory as $key => $history)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td class="justify-center">{{ $history->profile->title ?? '-' }}</td>
                                <td class="justify-center"> 
                                    @foreach($history->post_info as $postInfo)
                                        @if($postInfo['platform'] == 'facebook')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-facebook-f p-1'></em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'instagram')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-instagram p-1'> </em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'linkedin')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-linkedin-in p-1'> </em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'reddit')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-reddit-alien p-1'> </em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'twitter')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-twitter p-1'> </em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'pinterest')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-pinterest-p p-1'> </em></a>
                                        @endif
                                        @if($postInfo['platform'] == 'tiktok')
                                            <a href="{{ $postInfo['postUrl'] }}" target="_blank"><em class='fab fa-tiktok p-1'> </em></a>
                                        @endif
                                    @endforeach
                                
                                </td>
                                <td class="justify-center">{{ $history->caption ?? '-' }}</td>
                                <td class="justify-center">
                                    @if( $history->status == 0 )
                                        <span class="justify-center text-success">Posted</span>
                                    @elseif( $history->status == 1 )
                                        <span class="justify-center text-warning">Scheduled</span>
                                    @endif
                                </td>
                                <td class="justify-center">{{ $history->postedBy ?? '-' }}</td>
                                <td class="justify-center">{{ $history->created_at ?? '-' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app.app-layout>