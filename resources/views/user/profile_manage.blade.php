@section('path-navigation')
<span class="breadcrumb-item active">Profile Management</span>
@endsection

@section('custom-scripts')

@if(session()->has('unlink'))
<script>
	toast('Success', 'Account Unlinked Successfully!', 5000, 'check', 'success');
</script>
@endif

@if(session()->has('linked'))
<script>
	toast('Success', 'Account linked Successfully!', 5000, 'check', 'success');
</script>
@endif

@if(session()->has('error'))
<script>
	toast('Error', 'Error to add account!', 5000, 'close', 'danger');
</script>
@endif

@if(session()->has('retry'))
<script>
	toast('Notice', 'Retry to add account. required info missing', 5000, 'close', 'danger');
</script>
@endif

@if(session()->has('re_linked'))
<script>
	toast('Success', 'Account re-linked!', 5000, 'check', 'success');
</script>
@endif

@if(session()->has('renewed'))
<script>
	toast('Notice', 'Account renewed successfully!', 5000, 'check', 'success');
</script>
@endif

@if(session()->has('default'))
<script>
	toast('Notice', 'Default account updated!', 5000, 'check', 'success');
</script>
@endif

@endsection

<x-app.app-layout title="Profile Management">
	<div class="container-fluid">
		<div class="card shadow" id="highlights">
			<div class="card-header p-15 ml-3 w-500">
				<label class="h3 m-0">Manage Profile</label>
				<button class="btn btn-md btn-outline-primary float-right" type="button" data-toggle="modal" data-target="#addAccountModal">
					<em class="anticon anticon-user-add"></em> Add Profile
				</button>
			</div>
			<div class="card-body p-15 ml-3">
				<div class="table-responsive">
					@if($errors->has('message') && $errors->get('message'))
						<div class="alert alert-danger">
							{{ $errors->get('message')[0] }}
						</div>
					@endif
					<table class="table table-borderless" data-toggle="table" data-pagination="true" data-search="true">
						<caption></caption>
						<thead>
							<tr>
								<th scope="col" data-sortable="true">#</th>
								<th scope="col" data-sortable="true" data-field="name">Name</th>
								<th scope="col" data-sortable="true" data-field="socialAccount">Social Accounts Linked</th>
								<th scope="col" data-sortable="true" data-field="authorized_since">Authorized Since</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($userProfiles as $key => $profiles)
								<tr>
									<th scope="row">{{ $key+1 }}</th>
									<td class="justify-center">{{ $profiles['title'] ?? '' }}</td>
									<td class="justify-center"> 
										@foreach($linked_platforms[$key] as $platforms)
											@if($platforms == 'facebook')
												<em class='fab fa-facebook-f p-1 font-size-20'></em>
											@endif
											@if($platforms == 'instagram')
												<em class='fab fa-instagram p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'linkedin')
												<em class='fab fa-linkedin-in p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'reddit')
												<em class='fab fa-reddit-alien p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'twitter')
												<em class='fab fa-twitter p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'pinterest')
												<em class='fab fa-pinterest-p p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'tiktok')
												<em class='fab fa-tiktok p-1 font-size-20'> </em>
											@endif
											@if($platforms == 'youtube')
												<em class='fab fa-youtube p-1 font-size-20'> </em>
											@endif
										@endforeach
									</td>
									<td class="justify-center">{{ $profiles['authorized_on'] ?? '' }}</td>
									<td class="justify-center">
										<form method="POST" action="{{ route('panel.user.profile.deleteProfile') }}">
											@method('DELETE')
											@csrf
											<a href="{{ route('panel.user.profile.ayrshareForward', encrypt($profiles['profile_key'])) }}" target="_blank">
												<em class="fas fa-link text-info justify-center btn font-size-20" data-toggle="tooltip" data-placement="bottom" title="Link Social Media Accounts" aria-hidden="false" ></em>
											</a>
											<input type="hidden" name="profileKey"  value="{{ encrypt($profiles['profile_key']) }}"/>
											<button class="btn"><em class="fas fa-trash text-danger justify-center font-size-20" data-toggle="tooltip" data-placement="bottom" title="Delete Profile" aria-hidden="false" ></em></button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="addAccountModal" tabindex="-1" role="dialog" aria-labelledby="addAccountModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Profile</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="card">
						<div class="card-body">
							<form method="POST" action="{{ route('panel.user.profile.createAyrProfile') }}">
								@csrf
								<div class="form-group">
									<label class="font-weight-semibold" for="profile_name">{{ __('Profile Name') }}:</label>
									<input type="text" class="form-control" id="profile_name" name="profile_name" placeholder="Enter Full Name" />
								</div>

								<div class="form-group">
									<button class="btn btn-success">{{ __('Create') }}</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</x-app.app-layout>
