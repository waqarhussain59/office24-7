<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Login | DHSDHA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css"/>

</head>

<body class=" bg-pattern" style="background-color: #034f19;">
<div class="home-btn d-none d-sm-block">
    <a href=""><i class=""></i></a>
</div>

<div class="account-pages my-2 pt-sm-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center mb-2">
                    <a href="index.html" class="logo"><img style="object-fit:contain"
                                                           src="{{ asset('images/cda.jpg') }}" height="64"
                                                           width="30%" alt="logo"></a>
                    {{-- <h5 class="font-size-16 text-white-50 mb-4">Prop Marker</h5> --}}
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row justify-content-center">
            <div class="col-xl-5 col-sm-8">
                <div class="card">
                    <div class="card-body p-4">
                        <div class="p-2">
                            <h5 class="mb-5 text-center">Sign in to continue to DHSCDA. </h5>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12">
                                        <label> Email</label>
                                        <div class="form-group form-group-custom mb-4">
                                            <input id="email" type="text" name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   id="username" required>
                                            {{-- <label for="username">Email</label> --}}
                                        </div>
                                        @error('email')
                                        <div class="">
                                                    <span class="text-danger mb-2" role="alert">
                                                        <strong>{{ $message }}</strong><br>
                                                    </span>
                                        </div>
                                        @enderror

                                        <label> Password</label>
                                        <div class="form-group form-group-custom mb-4">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password" id="userpassword" required>
                                            {{-- <label for="userpassword">Password</label> --}}
                                        </div>
                                        @error('password')
                                        <span class="text-danger">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                        @enderror

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input"
                                                           id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">Remember
                                                        me</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="mt-4">
                                            <button class="btn btn-success btn-block waves-effect waves-light"
                                                    style="background-color:#034f19  " type="submit">Log In
                                            </button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            {{-- <a href="auth-register.html" class="text-muted"><i class="mdi mdi-account-circle mr-1"></i> Create an account</a> --}}
                                        </div>
                                    </div>
                                </div>
                                <div >
                                    <button class="btn btn-success btn-block waves-effect waves-light"
                                            style="background-color:#034f19  "><a href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- end Account pages -->

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

<script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js') }}"></script>


</body>
</html>

