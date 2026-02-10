<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
		<meta name="keywords" content="">
        <meta name="author" content="">
        <title> Reset Password  </title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
		

		<style type="text/css">
			.account-page .main-wrapper .account-content .account-box .account-btn {


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
						<a href="{{url('/')}}"><img src="assets/img/loo.png" class="rest_logo" alt="OEL" style="  width: 19%;"></a>
					</div>
					<!-- /Account Logo -->
					
					<div class="account-box">
						<div class="account-wrapper">
							<h3 class="account-title">Reset Password</h3>
						
							<!-- Account Form -->
							<form action="#">
								<div class="input-block mrgn">
									<label class="col-form-label"> Current Password <span class="mandatory">*</span></label>
									<input class="form-control" type="text">
								</div>
								<div class="input-block mrgn">
									<label class="col-form-label">  New Password<span class="mandatory">*</span></label>
									<input class="form-control" type="password">
								</div>
								<div class="input-block mrgn">
									<label class="col-form-label"> Confirm New Password <span class="mandatory">*</span></label>
									<input class="form-control" type="password">
								</div>
								<div class="input-block mrgn text-center">
									<button class="btn btn-primary account-btn" type="submit">Reset Password</button>
								</div>
							
							</form>
							<!-- /Account Form -->
						</div>
					</div>
				</div>
			</div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
       <script src="assets/js/jquery-3.7.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="assets/js/bootstrap.bundle.min.js"></script>
	
		<!-- Custom JS -->
		<script src="assets/js/app.js"></script>
		
    </body>
</html>