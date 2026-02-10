<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title> Admin Dashboard </title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   <script src="{{asset('assets/js/jquery-3.7.1.min.js')}}"></script>
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">
    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material.css')}}">
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/morris/morris.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
   
    @yield('style')
  </head>
  <body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">
      @include('admin.include.header')
      @include('admin.include.sidebar')
      <!-- Page Wrapper -->
      <div class="page-wrapper">
        <!-- Page Content -->
        <div class="content container-fluid" >
          {{-- @include('admin.include.pageheader') --}}
          @yield('main-content')
        </div>
        <!-- /Page Content -->
      </div>
      <!-- /Page Wrapper -->

    <!-- jQuery -->
    @yield('page-script')
    @yield('scripts')
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Bootstrap Core JS -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Slimscroll JS -->
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <!-- Chart JS -->
    {{-- <script src="{{asset('assets/plugins/morris/morris.min.js')}}"></script> --}}
    <script src="{{asset('assets/plugins/raphael/raphael.min.js')}}"></script>
    {{-- <script src="{{asset('assets/js/chart.js')}}"></script> --}}
    <script src="{{asset('assets/js/greedynav.js')}}"></script>
    <!-- Theme Settings JS -->
    <script src="{{asset('assets/js/layout.js')}}"></script>
    <script src="{{asset('assets/js/theme-settings.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script type="">
      $(document).ready(function(){
        $('#mobile_btn').click(function(){
          $('#sidebar').toggleClass('sidebarNew');
          // alert('lll')
        })
        $('.sidebar-overlay').click(function(){
          $('#sidebar').removeClass('sidebarNew');
        });

      })
    </script>

{{-- <script>
    $('select').selectpicker();
</script> --}}

  </body>
</html>
