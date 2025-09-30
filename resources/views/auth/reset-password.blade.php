
<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--favicon-->
    <link rel="icon" href="{{ asset('default-images/aikez-logo.JPG') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('backend/') }}assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/toastr.min.css') }}">
    <link href="{{ asset('backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
    <title>Aikez Emp - Request Password</title>
</head>

<body>

<div class="wrapper">
		<div class="section-authentication-cover">
			<div class="">
				<div class="row g-0">
					<div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex">
                        <div class="card shadow-none bg-transparent shadow-none rounded-0 mb-0">
							<div class="card-body">
                                 <img src="{{ asset("backend/assets/images/login-images/reset-password-cover.svg") }}" class="img-fluid" width="600" alt=""/>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
						<div class="card rounded-0 m-3 shadow-none bg-transparent mb-0">
							<div class="card-body p-sm-5">
								<div class="">
									<div class="mb-4 text-center">
										<img src="{{ asset('default-images/aikez-logo.JPG') }}" width="60" alt="" />
									</div>
									<div class="text-start mb-4">
										<h5 class="">Generate New Password</h5>
										<p class="mb-0">We received your reset password request. Please enter your new password!</p>
									</div>
                                    <form action="{{ route('password.store') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                        <div class="mb-3 mt-4">
                                            <label class="form-label">Email</label>
                                            <input type="text" name="email" class="form-control" placeholder="Enter your email" />
                                            @error('email')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-3 mt-4">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter new password" />
                                            @error('password')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="mb-4">
                                            <label class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" />
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">Change Password</button> <a href="{{ route('admin.login.page') }}" class="btn btn-light"><i class='bx bx-arrow-back mr-1'></i>Back to Login</a>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>

				</div>
				<!--end row-->
			</div>
		</div>
	</div>

</html>
