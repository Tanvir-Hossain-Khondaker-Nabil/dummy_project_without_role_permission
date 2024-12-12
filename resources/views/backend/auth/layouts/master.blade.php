<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/images/logo.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card overflow-hidden shadow-lg">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-8">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to admin panel.</p>
                                    </div>
                                </div>
                                <div class="col-4 d-flex align-items-start">
                                    {{-- <img src="assets/images/logo.png" alt="" width="100" class="mt-2"> --}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <div class="auth-logo">
                                <a href="index.html" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="{{ asset('assets/images/logo.png') }}" alt="" class="rounded-circle img-fluid" style="width: 50px !important;">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="pt-0 p-2">
                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
