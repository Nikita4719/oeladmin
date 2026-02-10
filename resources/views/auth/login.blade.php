<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="">
		<meta name="keywords" content="">
        <meta name="author" content="">
        <title> Login </title>
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<style type="text/css">
			.account-page .main-wrapper .account-content .account-box .account-btn
			{
           background: #070758;
            }
		</style>

    </head>
    <body class="account-page">
		<!-- Main Wrapper -->
        <div class="main-wrapper">
			<div class="account-content">
				<div class="container">
					<!-- Account Logo -->
					<div class="account-logo">
						<!-- <a href="{{url('/')}}"><img src="{{asset('assets/img/loo.png')}}" alt="OEL" style="  width: 19%;"></a> -->
					</div>
					<!-- /Account Logo -->
					<div class="account-box">
						<div class="account-wrapper">
                            @if(session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
							<h3 class="account-title">Login</h3>
							<p class="account-subtitle">Access to our dashboard</p>
							<form action="{{ route('login.submit') }}" method="POST">
    @csrf

								<div class="input-block mb-4">
									<label class="col-form-label">Email<span class="mandatory">*</span></label>
									<input class="form-control" type="text" value="{{old('email')}}" name="email">
                                    @error('email')
                                       {{$message}}
                                    @enderror
								</div>
								<div class="input-block mb-4">
									<label class="col-form-label">Password<span class="mandatory">*</span></label>
									<input class="form-control" type="password" name="password">
                                    @error('password')
                                        {{$message}}
                                    @enderror
								</div>
								<div class="input-block mb-4 text-center">
									<button class="btn btn-primary account-btn" type="submit">Login</button>
								</div>
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
       <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    </body>
</html>
