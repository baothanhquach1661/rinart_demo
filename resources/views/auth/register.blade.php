<!doctype html>
<html class="no-js" lang="en">

<head>
    @php
        $seo = App\Models\Seo::find(1);
    @endphp
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>RinArt || Register</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="{{ $seo->meta_description }}">
    <meta name="author" content="{{ $seo->meta_author }}">
    <meta name="keyword" content="{{ $seo->meta_keyword }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/images/favicon.png') }}">

    <!-- CSS
    ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/vendor/base.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.min.css') }}">

    <script>
        {{ $seo->google_analytics }}
    </script>

</head>

<body>

     <div class="axil-signin-area">

        <!-- Start Header -->
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="index.html" class="site-logo"><img src="{{ asset('frontend/assets/images/logo/rinart_logo.png')}}" alt="logo"></a>
                </div>
                <div class="col-md-6">
                    <div class="singin-header-btn">
                        <p>Already a member?</p>
                        <a href="sign-in.html" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">I'm New Here</h3>
                        <p class="b2 mb--55">Enter your detail below</p>


                        <form method="POST" action="{{ route('register') }}">
                        @csrf
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" class="form-control" id="username" name="username" value="">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="annie@example.com">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" value="">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- Modernizer JS -->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('frontend/assets/js/vendor/jquery.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/waypoints.min.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>




































