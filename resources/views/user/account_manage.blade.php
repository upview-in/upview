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

<x-app-layout title="Account Management">
	<div class="container-fluid">
		<div class="card shadow" id="highlights">
			<div class="card-header p-15 ml-3 w-500">
				<label class="h3 m-0">Manage Accounts</label>
				<button class="btn btn-md btn-outline-primary float-right" type="button" data-toggle="modal" data-target="#addAccountModal">
					<em class="anticon anticon-user-add"></em> Add Account
				</button>
			</div>
			<div class="card-body p-15 ml-3">
				<div class="table-responsive">
					<table class="table table-borderless" data-toggle="table" data-pagination="true" data-search="true">
						<caption></caption>
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
								<td><img class="rounded-circle mr-3" alt="img" src="{{ $linkedAccount->picture }}" width="50px" /> {{ $linkedAccount->name ?? 'N/A' }}</td>
								<td>{{ $linkedAccount->email ?? 'N/A' }}</td>
								<td>{!! $platforms[$linkedAccount->platform] !!}</td>
								<td>{{ $linkedAccount->created_at->diffForHumans() }}</td>
								<td>
									<?php

                                    if ($linkedAccount->platform == 1) {
                                        $expireAt = \Carbon\Carbon::parse($linkedAccount->created + $linkedAccount->expire_in)->diffInMinutes(\Carbon\Carbon::now());
                                        if (($linkedAccount->created + $linkedAccount->expire_in) < \Carbon\Carbon::now()->timestamp) {
                                            echo  'Expired';
                                        } else {
                                            echo $expireAt . ' Minutes';
                                        }
                                    } elseif ($linkedAccount->platform == 2 || $linkedAccount->platform == 3) {
                                        $expireAt = \Carbon\Carbon::parse($linkedAccount->expire_in)->diffInDays(\Carbon\Carbon::now());
                                        if ($linkedAccount->expire_in < \Carbon\Carbon::now()->timestamp) {
                                            echo  'Expired';
                                        } else {
                                            echo  $expireAt . ' Days';
                                        }
                                    }

                                    ?>
								</td>
								<td>
									<?php

                                    if ($linkedAccount->platform == 1) {
                                        echo 'Auto';
                                    } elseif ($linkedAccount->platform == 2 || $linkedAccount->platform == 3) {
                                        echo 'Manually';
                                    }

                                    ?>
								</td>
								<td>
									<a href="{{ route('panel.user.account.setDefaultAccount', ['id' => $linkedAccount->id, 'platform' => $linkedAccount->platform]) }}">
										<em class="{{ (!is_null($linkedAccount->default) && $linkedAccount->default)?'fa':'far' }} fa-star text-warning justify-center" data-toggle="tooltip" data-placement="bottom" title="Set as default account" aria-hidden="false"></em>
									</a>
									<a href="{{ route('panel.user.account.unlinkAccount', $linkedAccount->id) }}">
										<em class="fas fa-unlink text-danger justify-center" data-toggle="tooltip" data-placement="bottom" title="Unlink Account" aria-hidden="false"></em>
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
						<div class="col-6 mt-3 text-center">
							<a href="{{ route('panel.user.account.getYoutubeAccess') }}" class="btn btn-lg btn-danger w-100"><em class="fab fa-youtube"></em> Youtube</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="{{ route('panel.user.account.getFacebookAccess') }}" class="btn btn-lg btn-primary w-100"><em class="fab fa-facebook-square"></em> FaceBook</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="{{ route('panel.user.account.getInstagramAccess') }}" class="btn btn-lg btn-warning w-100"><em class="fab fa-instagram"></em> Instagram</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="javascript:void(0);" class="btn btn-lg btn-info w-100"><em class="fab fa-twitter-square"></em> Twitter</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="javascript:void(0);" class="btn btn-lg btn-primary w-100"><em class="fab fa-linkedin"></em> LinkedIn</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="javascript:void(0);" class="btn btn-lg btn-danger w-100"><em class="fab fa-pinterest"></em> Pinterest</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="javascript:void(0);" class="btn btn-lg btn-warning w-100"><em class="fab fa-reddit-square"></em> Reddit</a>
						</div>
						<div class="col-6 mt-3 text-center">
							<a href="javascript:void(0);" class="btn btn-lg btn-info w-100"><em class="fab fa-telegram"></em> Telegram</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
