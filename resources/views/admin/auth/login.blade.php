<x-admin-guest-layout bodyClasses="bg-login">
	<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container-fluid">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					<div class="mb-4 text-center">
						<img src="{{ asset('admin/images/logo/named_logo.svg') }}" width="210" alt="" />
						<sub><label class="ms-1 fs-6">Admin</label></sub>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="p-4 rounded">
								<div class="text-center">
									<h3 class="">Sign in</h3>
								</div>
								<div class="form-body">
									<form method="POST" action="{{ route('admin.login') }}" class="row g-3">
										@csrf
										<!-- <div class="col-12">
											<label for="inputEmailAddress" class="form-label">Email Address</label>
											<input type="email" class="form-control" name="email" id="inputEmailAddress" placeholder="Email Address">
											@error('email')
											<span class="invalid-feedback d-block" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div> -->
										<div class="col-12">
											<label for="inputUsername" class="form-label">Enter Username</label>
											<input type="text" class="form-control" name="username" id="inputUsername" placeholder="Username">
											@error('username')
											<span class="invalid-feedback d-block" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="col-12">
											<label for="inputChoosePassword" class="form-label">Enter Password</label>
											<div class="input-group" id="show_hide_password">
												<input type="password" class="form-control border-end-0" name="password" id="inputChoosePassword" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bi bi-hide'></i></a>
											</div>
											@error('password')
											<span class="invalid-feedback d-block" role="alert">
												<strong>{{ $message }}</strong>
											</span>
											@enderror
										</div>
										<div class="col-md-6">
											<div class="form-check form-switch">
												<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="remember" checked>
												<label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
											</div>
										</div>
										<div class="col-12">
											<div class="d-grid">
												<button type="submit" class="btn btn-primary"><i class="bi bi-lock-open"></i>Sign in</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--end row-->
		</div>
	</div>
</x-admin-guest-layout>