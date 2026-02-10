<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>  user wallet </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/material.css">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="assets/css/dataTables.bootstrap4.min.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="assets/css/select2.min.css">
    <!-- Datetimepicker CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <!-- Main Wrapper -->
    <div class="main-wrapper"> 
    	<?php  include 'include/header.php'; ?> 
    	<?php  include 'include/sidebar.php'; ?>

      <!-- Page Wrapper -->
      <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid">
        <?php  include 'include/pageheader.php'; ?>
          <div class="main-content">
            <div class="row">
              <div class="card card-buttons mt-md-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-9">
                      <ol class="breadcrumb text-muted mb-0">
                        <li class="breadcrumb-item">
                          <a href="#"> Home</a>
                        </li>
                        <li class="breadcrumb-item text-muted">  Profile </li>
                      </ol>
                    </div>                    
                  </div>
                </div>
              </div>
            </div>
          </div>
              <div class="row">
            <div class="card-group">
              <div class="card">
                <div class="card-body myform">
                  <form action="#" method="GET">
                    <div class="row">

                      <div class="col-md-3">
                        <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder="Name">
                      </div>

                       <div class="col-md-3">
                        <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder="Phone no">
                      </div>

                       <div class="col-md-3">
                        <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder="Search by Email">
                      </div>

                        <div class="col-md-3">
                        <input type="text" class="form-control formmrgin" name="application_id" value="" placeholder="Status">
                      </div>          
                        <div class="col-md-4 col-sm-6">
                        <button type="submit" class="btn btn-info d-lg-block  formmrgin" name="country_submit" value="1">Submit </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <br>        
        </div>
        <!-- /Page Content --> 
        <?php  include "include/onclicksidebar.php" ?>
      </div>
      <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->
    <!-- jQuery -->
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap Core JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <!-- Select2 JS -->
    <script src="assets/js/select2.min.js"></script>
    <!-- Datatable JS -->
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <!-- Datetimepicker JS -->
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <!-- Theme Settings JS -->
    <script src="assets/js/layout.js"></script>
    <script src="assets/js/theme-settings.js"></script>
    <script src="assets/js/greedynav.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
  </body>
</html>