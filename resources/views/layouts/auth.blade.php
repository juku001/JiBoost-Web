<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Log In') | {{ env('APP_NAME') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('assets/img/favicons/manifest.json') }}">



    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/welcome/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/animate-headline.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/style.css') }}">
</head>

<body>
    <!-- preloader start -->
    <div id="loading">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="loading-content">
                    <img class="loading-logo-text" src="{{ asset('assets/welcome/images/logo-text.png') }}"
                        alt="Jiboost">
                    <div class="loading-stroke">
                        <img class="loading-logo-icon" src="{{ asset('assets/welcome/images/logo-icon.png') }}"
                            alt="Pen">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- mouse-cursor-start -->
    <div class="mouse-cursor-invisible">
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>
    </div>
    <!-- mouse-cursor-end -->

    <!-- header begin -->
    {{-- <div class="header header-style-1">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="top-left">
                            <div class="d-sm-flex">
                                <div class="header-txt pr-30"><a href="mail:thespidergraphics@gmail.com"><i
                                            class="icofont-email"></i> thespidergraphics@gmail.com</a></div>
                                <div class="header-txt px-30"><a href="tel:+255615331132"><i class="icofont-phone"></i>
                                        +255 615 331 132</a></div>
                                <div class="header-txt pl-30"><i class="icofont-google-map"></i> Makumbusho, Dar es
                                    salaam. Tanzania</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="top-right">
                            <div class="d-flex justify-content-lg-end justify-content-center">
                                <a href="#" class="header-right-txt"><i
                                        class="icofont-facebook-messenger"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-twitter"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-instagram"></i></a>
                                <a href="#" class="header-right-txt"><i class="icofont-youtube"></i></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    <!-- header end -->

    @yield('content')



    <script src={{ asset('assets/welcome/js/jquery-3.6.0.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/jquery-ui.js') }}></script>
    <script src={{ asset('assets/welcome/js/animate-headline.js') }}></script>
    <script src={{ asset('assets/welcome/js/simple-pagination.js') }}></script>
    <script src={{ asset('assets/welcome/js/main.js') }}></script>
    <script src={{ asset('assets/welcome/js/admin.js') }}></script>
</body>

</html>
