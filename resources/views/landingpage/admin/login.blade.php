<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Study-abroad-login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="index, follow">

    <meta name="keywords" content="">
    <meta name="description" content="">

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="https://omah.dexignzone.com/codeigniter/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    {{-- <meta name="twitter:image" content="https://omah.dexignzone.com/codeigniter/social-image.png"> --}}
    {{-- <meta name="twitter:card" content="summary_large_image"> --}}

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/') }}/assets/images/favicon.png">
    <link href="{{ asset('admin') }}/assets/css/style.css" rel="stylesheet">

</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            {{-- <div class="text-center mb-3">
                                <a href="/"><img class="logo-auth"
                                        src="{{ asset('admin') }}/assets/images/logo.png" alt=""></a>
                            </div> --}}
                            <h4 class="text-center mb-4">Please Login</h4>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form method="post" action="{{ url('adminlogin') }}">
                                @csrf
                                <div class="form-group mb-4">
                                    <label class="form-label" for="username">Username</label>
                                    <input type="text" class="form-control" placeholder="Enter username"
                                        name="email" id="username">
                                    @error('email')
                                        <spane class="validationerror">{{ $message }}</spane>
                                    @enderror
                                </div>
                                <div class="form-group mb-3 mb-sm-4">
                                    <label class="form-label">Password</label>
                                    <div class="position-relative">
                                        <input type="password" id="dz-password" class="form-control" value=""
                                            name="password" placeholder="*********">
                                        <span class="show-pass eye">
                                            <i class="fa fa-eye-slash"></i>
                                            <i class="fa fa-eye"></i>
                                        </span>

                                        @error('email')
                                            <spane class="validationerror">{{ $message }}</spane>
                                        @enderror


                                    </div>
                                </div>
                                <div
                                    class="form-row d-flex flex-wrap justify-content-between align-items-baseline mb-2">
                                    <div class="form-group mb-sm-4 mb-1">
                                        <div class="form-check custom-checkbox ms-1">
                                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                                            <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                preference</label>
                                        </div>

                                    </div>

                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
 Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('admin') }}/assets/vendor/global/global.min.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/custom.min.js"></script>
    <script src="{{ asset('admin') }}/assets/js/deznav-init.js"></script>
</body>

</html>
