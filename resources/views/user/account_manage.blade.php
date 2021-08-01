@section('path-navigation')
<span class="breadcrumb-item active">Account Management</span>
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
	toast('Success', 'Error to add account!', 5000, 'close', 'danger');
</script>
@endif

@if(session()->has('retry'))
<script>
	toast('Notice', 'Retry to add account. required info missing', 5000, 'close', 'danger');
</script>
@endif

@if(session()->has('already_linked'))
<script>
	toast('Notice', 'Account already linked!', 5000, 'check', 'warning');
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

<x-app-layout title="Account Management">
	<div class="container-fluid">
		<div class="card shadow" id="highlights">
			<div class="card-header p-15 ml-3 w-500">
				<label class="h3 m-0">Manage Accounts</label>
				<button class="btn btn-md btn-outline-primary float-right" type="button" data-toggle="modal" data-target="#addAccountModal">
					<i class="anticon anticon-user-add"></i> Add Account
				</button>
			</div>
			<div class="card-body p-15 ml-3">
				<div class="table-responsive">
					<table class="table" data-toggle="table" data-pagination="true" data-search="true">
						<thead>
							<tr>
								<th scope="col" data-sortable="true">#</th>
								<th scope="col" data-sortable="true" data-field="name">Name</th>
								<th scope="col" data-sortable="true" data-field="email">Email</th>
								<th scope="col" data-sortable="true" data-field="linked_account">Linked Account</th>
								<th scope="col" data-sortable="true" data-field="authorized_since">Authorized Since</th>
								<th scope="col" data-sortable="true" data-field="status">Expire In</th>
								<th scope="col" data-sortable="true" data-field="renew">Renew</th>
								<th scope="col">Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$platforms = [
								null,
								'<span class="text-danger"><i class="anticon anticon-youtube"></i> YouTube</span>',
								'<span class="text-primary"><i class="anticon anticon-facebook"></i> Facebook</span>',
								'<span class="text-warning"><i class="anticon anticon-instagram"></i> Instagram</span>',
							];

							?>
							@foreach($linkedAccounts as $key => $linkedAccount)
							<tr>
								<th scope="row">{{ $key + 1 }}</th>
								<td><img class="rounded-circle mr-3" src="{{ $linkedAccount->picture }}" width="50px" /> {{ $linkedAccount->name ?? 'N/A' }}</td>
								<td>{{ $linkedAccount->email ?? 'N/A' }}</td>
								<td>{!! $platforms[$linkedAccount->platform] !!}</td>
								<td>{{ $linkedAccount->created_at->diffForHumans() }}</td>
								<td>
									<?php

									if ($linkedAccount->platform == 1) {
										echo \Carbon\Carbon::parse($linkedAccount->created + $linkedAccount->expire_in)->diffInMinutes(\Carbon\Carbon::now()) . ' Minutes';
									} else if ($linkedAccount->platform == 2 || $linkedAccount->platform == 3) {
										echo \Carbon\Carbon::parse($linkedAccount->expire_in)->diffInDays(\Carbon\Carbon::now()) . ' Days';
									}

									?>
								</td>
								<td>
									<?php

									if ($linkedAccount->platform == 1) {
										echo "Auto";
									} else if ($linkedAccount->platform == 2 || $linkedAccount->platform == 3) {
										echo "Manually";
									}

									?>
								</td>
								<td>
									<a href="{{ route('panel.user.account.setDefaultAccount', ['id' => $linkedAccount->id, 'platform' => $linkedAccount->platform]) }}">
										<i class="{{ (!is_null($linkedAccount->default) && $linkedAccount->default)?'fa':'far' }} fa-star text-warning justify-center" data-toggle="tooltip" data-placement="bottom" title="Set as default account" aria-hidden="false"></i>
									</a>
									<a href="{{ route('panel.user.account.unlinkAccount', $linkedAccount->id) }}">
										<i class="fas fa-unlink text-danger justify-center" data-toggle="tooltip" data-placement="bottom" title="Unlink Account" aria-hidden="false"></i>
									</a>
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
					<h5 class="modal-title" id="exampleModalLabel">Choose Platform</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-12 mt-3 text-center">
							<a href="{{ route('panel.user.account.getYoutubeAccess') }}" class="btn btn-lg btn-danger w-50"><i class="anticon anticon-youtube"></i> Youtube</a>
						</div>
						<div class="col-12 mt-3 text-center">
							<a href="{{ route('panel.user.account.getFacebookAccess') }}" class="btn btn-lg btn-primary w-50"><i class="anticon anticon-facebook"></i> FaceBook</a>
						</div>
						<div class="col-12 mt-3 text-center">
							<a href="{{ route('panel.user.account.getInstagramAccess') }}" class="btn btn-lg btn-warning w-50"><i class="anticon anticon-instagram"></i> Instagram</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>