<!DOCTYPE html>
<html lang="en-US" dir="ltr" data-navigation-type="default" data-navbar-horizontal-shape="default">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="_token" content="{{ csrf_token() }}">
    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>@yield('title', 'Welcome') | {{ env('APP_NAME') }}</title>
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
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
    <div class="header header-style-1">
        <div class="top-header">
            <div class="container my-0">
                <div class="row">
                    <div class="col-xl-9 col-lg-9">
                        <div class="top-left">
                            <div class="d-sm-flex">
                                <div class="header-txt pr-30">
                                    <a href="mailto:{{ $welcomeData['contact']['email'] ?? 'info@example.com' }}">
                                        <i class="icofont-email"></i>
                                        {{ $welcomeData['contact']['email'] ?? 'info@example.com' }}
                                    </a>
                                </div>

                                <div class="header-txt px-30">
                                    <a href="tel:{{ $welcomeData['contact']['mobile'] ?? '+255714257454' }}">
                                        <i class="icofont-phone"></i>
                                        {{ $welcomeData['contact']['mobile'] ?? '+255 714 257 454' }}
                                    </a>
                                </div>

                                <div class="header-txt pl-30">
                                    <i class="icofont-google-map"></i>
                                    {{ $welcomeData['contact']['location'] ?? 'Our Office - Dar es Salaam, Tanzania' }}
                                </div>
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
    </div>
    <!-- header end -->

    <!-- banner begin -->
    <div class="banner pt-185 pb-190">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-11">
                    <div class="banner-txt">
                        <h3 class="banner-subtitle mt--9 mb-10">The Best Way to</h3>
                        <h1 class="banner-title mb-20 cd-headline push">
                            <span>Boost your</span>
                            <span class="cd-words-wrapper">
                                <b class="is-visible">Mind</b>
                                <b>Memory</b>
                                <b>Knowledge</b>
                            </span>
                        </h1>
                        <p class="banner-paragraph mb-11">
                            The right place for Helping students excel with test exams and knowledge-boosting resources.
                        </p>

                        <div class="btn-box sm-padd-btn pt-35">
                            <a href="{{ route('auth.login') }}" class="def-btn btn-3">Get Started</a>
                            <a href="#pricing" class="def-btn btn-2">View Pricing</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner end -->

    <!-- feature begin -->
    <div class="feature pt-120 pb-50" id="welcome">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="part-txt mb-70">
                        <div class="section-heading mb-70">
                            <h2 class="section-title mt--8 mb-25">Welcome to JiBoost</h2>
                            <p class="heading-sub-txt mt--1 mb--8">We provide the best tools and resources for students
                                to excel in their studies.
                                If you're looking to boost your knowledge and ace your exams, you've come to the right
                                place.</p>
                        </div>
                        <div class="row r-gap-40 has-gradient-service mb-30 mb-lg-0">
                            <div class="col-xl-6 col-md-6">
                                <div class="feature-box d-flex">
                                    <div class="feature-part-icon mr-30">
                                        <img src="{{ asset('assets/welcome/images/feat-icon-1.png') }}"
                                            class="filter-shadow-1" alt="Icon">
                                    </div>
                                    <div class="feature-txt">
                                        <h3 class="feature-sub-title mt--7 mb--8"><a href="class-details.html">Custom
                                                Exams</a></h3>
                                        <div class="divider mt-10 mb-20 bg-gradient-1 rounded-pill"></div>
                                        <p class="mt--6 mb--8">Create personalized exams, print them, share digitally,
                                            or export as PDFs.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="feature-box d-flex">
                                    <div class="feature-part-icon mr-30">
                                        <img src="{{ asset('assets/welcome/images/feat-icon-2.png') }}"
                                            class="filter-shadow-2" alt="Icon">
                                    </div>
                                    <div class="feature-txt">
                                        <h3 class="feature-sub-title mt--7 mb--8"><a href="#">Progress
                                                Tracking</a></h3>
                                        <div class="divider mt-10 mb-20 bg-gradient-2 rounded-pill"></div>
                                        <p class="mt--6 mb--8">Monitor student performance, set goals, and track
                                            progress with detailed analytics.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="feature-box d-flex">
                                    <div class="feature-part-icon mr-30">
                                        <img src="{{ asset('assets/welcome/images/feat-icon-3.png') }}"
                                            class="filter-shadow-3" alt="Icon">
                                    </div>
                                    <div class="feature-txt">
                                        <h3 class="feature-sub-title mt--7 mb--8"><a href="class-details.html">Exam
                                                Series</a></h3>
                                        <div class="divider mt-10 mb-20 bg-gradient-3 rounded-pill"></div>
                                        <p class="mt--6 mb--8">Access a series of practice exams with instant feedback
                                            and explanations.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="feature-box d-flex">
                                    <div class="feature-part-icon mr-30">
                                        <img src="{{ asset('assets/welcome/images/feat-icon-4.png') }}"
                                            class="filter-shadow-4" alt="Icon">
                                    </div>
                                    <div class="feature-txt">
                                        <h3 class="feature-sub-title mt--7 mb--8"><a href="class-details.html">Result
                                                Sharing</a></h3>
                                        <div class="divider mt-10 mb-20 bg-gradient-4 rounded-pill"></div>
                                        <p class="mt--6 mb--8">Share marks, resources, and achievements with peers,
                                            parents, and teachers.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="p-relative ml-30 mb-70">
                        <img src="{{ asset('assets/welcome/images/feature_img.webp') }}" alt="image">
                        <!-- {{-- <a href="#" data-video-id="6stlCkUDG_s"
                            class="video-btn bg-gradient-1 p-absolute bottom-0 right-0 text-center text-white"><i
                                class="icofont-play"></i></a> --}} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature end -->

    <!-- about begin -->
    <div class="about pt-120 pb-120">
        <div class="container" id="whatwedo">
            <div class="row justify-content-end">
                <div class="col-xl-6 col-lg-7 col-md-8 col-sm-12">
                    <h2 class="about-title mt--8 mb-25">About JiBoost</h2>
                    <p class="fw-bolds mt--1 mb-16">Empowering students through interactive test exams and personalized
                        learning experiences.</p>
                    <p class="mb-35">JiBoost is dedicated to helping students excel in their studies by providing
                        comprehensive practice exams and detailed analytics. Our platform allows students to improve
                        their knowledge, track their progress, and achieve their academic goals.</p>
                    <span class="about-list d-block mb-15"><span class="mr-15"><i
                                class="icofont-check-alt"></i></span>Customized exams tailored to individual learning
                        needs.</span>
                    <span class="about-list d-block mb-15"><span class="mr-15"><i
                                class="icofont-check-alt"></i></span>Progress tracking and performance analytics for
                        continuous improvement.</span>
                    <div class="btn-box pt-50">
                        <a href="/signin" class="def-btn btn-2">Learn More</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- about end -->

    <!-- class begin -->
    <div class="class pt-120 pb-80" id="classes">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-heading text-center mb-65">
                        <h2 class="section-title mt--8 mb-25">Featured Classes</h2>
                        <p class="heading-sub-txt mt--1 mb--8">Here is what you can expect from a house cleaning from a
                            Handy professional. Download the app to share further cleaning details and instructions!</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center popular-classes-wrapper">

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/std_7.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">1st Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Std Four</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/std_4.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">2nd Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Std Seven</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/form_2.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">3rd Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Form Two</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/form_4.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">4th Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Form Four</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/form_5.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">5th Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Form Five</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 popular-class-item popularity featured">
                    <div class="class-card mb-40">
                        <div class="part-img">

                            <a href="class-details.html"><img src="{{ asset('assets/welcome/images/form_6.png') }}"
                                    class="w-100" alt="image"></a>
                        </div>
                        <div class="part-txt p-40 px-30">
                            <div class="text-center">
                                <a href="#" class="class-catname bg-theme symbol">6th Class</a>

                                <h3 class="class-title mt--7 mb-6 name"><a href="class-details.html">Form Six</a>
                                </h3>
                            </div>
                            <!-- <span class="class-time mb-25">Class Time : 08:00 am - 10:00 am</span> -->
                            <p class="class-time mb-25">Subjects : Kiswahili, English , Science and Mathematics</p>
                            <p class="mt--8 mb--8">Involves the first grade to the fourth grade of the primary school
                                students.</p>
                            <div class="class-info mt-30 d-flex justify-content-between">
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Subjects : </span>
                                    <span class="amount d-block fz-18 color-3 fw-bold mt--8 mb--8">4</span>
                                </div>
                                <div class="vertical-border"></div>
                                <div class="box box-1 text-center">
                                    <span class="single-info d-block fz-14 mt--4 mb-10">Total Series : </span>
                                    <span class="amount d-block fz-18 color-1 fw-bold mt--8 mb--8">22</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- <div class="row">
                <div class="col-12">
                    <div id="see-load-more" class="popular-class-btn text-center pt-30 mb-40">
                        <button class="def-btn">See More Classes</button>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
    <!-- class end -->

    <!-- Pricing Stats Begin -->

    <div class="counter pt-120 pb-120" id="pricing">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-heading text-center mb-70">
                        <h2 class="section-title text-white mt--8 mb-25">Pricing</h2>
                        <p class="heading-sub-txt text-white mt--1 mb--8">The following are the descriptions that show
                            up the prices for each payment package for accessing exams in JiBoost.</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex align-items-stretch">
                <div class="offset-xl-1 offset-lg-1 offset-md-1 col-xl-3 col-lg-3 col-md-3 col-12 mt-3">
                    <div class="pricing-item h-100">
                        <div class="text-center mt-4">
                            <h3 class="pricing-title"><span>Tsh</span> 500</h3>
                        </div>
                        <div class="mt-3 text-center">
                            <h4>Pay Per Exam</h4>
                            <p class="mt-3">
                                Pay once for a specific exam, and it's yours for a lifetime. You can access and review
                                it anytime.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-12 mt-3">
                    <div class="pricing-item middle-item h-100">
                        <div class="text-center mt-4">
                            <h3 class="pricing-title"><span>Tsh</span> 4,000</h3>
                        </div>
                        <div class="mt-3 text-center">
                            <h4>All Level Subscription</h4>
                            <p class="mt-3">
                                Get unlimited access to all exam levels with a single payment. Study freely without
                                restrictions.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-12 mt-3">
                    <div class="pricing-item h-100">
                        <div class="text-center mt-4">
                            <h3 class="pricing-title"><span>Tsh</span> 2,500</h3>
                        </div>
                        <div class="mt-3 text-center">
                            <h4>Specific Level Subscription</h4>
                            <p class="mt-3">
                                Unlock all exams for a specific level with a one-time payment. Perfect for focused
                                learning.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Pricing Stats End -->


    <!-- app download begin -->
    <div class="app-download pb-120" id="apps">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="app-download-txt mb-50 mb-md-0">
                        <div class="section-heading mb-50">
                            <h2 class="section-title mt--8 mb-25 cd-headline rotate-1">
                                Join Our <br>
                                <span class="cd-words-wrapper">
                                    <b class="is-visible">Mobile Apps</b>
                                    <b>IOS App</b>
                                    <b>Android App</b>

                                </span>
                            </h2>
                            <p class="heading-sub-txt mt--1 mb--8">Nam vestibulum at est a mollis. Phasellus sit amet
                                tincidunt diam. Maecenas ultricies volutpat ornare. Sed quis enim nisi. Donec in dui
                                placerat tellus dictum mollis.</p>
                        </div>
                        <div class="btn-box">
                            <a href="#" class="app-download-btn mr-75">
                                <img src="{{ asset('assets/welcome/images/appstore.png') }}" class="filter-shadow-3"
                                    alt="App Store">
                            </a>
                            <a href="{{ route('playstore') }}" class="app-download-btn" target="_blank">
                                <img src="{{ asset('assets/welcome/images/playstore.png') }}" class="filter-shadow-2"
                                    alt="Play Store">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="part-img pl-30 w_100">
                        <img src="{{ asset('assets/welcome/images/app-download-img.png') }}" alt="image">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- app download end -->


    <!-- counter begin -->
    <div class="counter pt-120 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-10">
                    <div class="section-heading text-center mb-70">
                        <h2 class="section-title text-white mt--8 mb-25">Test yourself with JiBoost</h2>
                        <p class="heading-sub-txt text-white mt--1 mb--8">Join our team today to get the best out of
                            JiBoost. We have a number of students, teachers and parents joined with us. Come and help
                            yourself out!</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-3 col-6">
                    <div class="counter-box d-flex flex-column align-items-center">
                        <div class="counter-img mb--60">
                            <img src="{{ asset('assets/welcome/images/counter-icon-1.png') }}"
                                class="filter-shadow-1" alt="Icon">
                        </div>
                        <div class="counter-part-txt text-center p-relative">
                            <h2 class="counter-txt odometer mb-20"
                                data-count="{{ $welcomeData['users']['students'] }}">
                                {{ $welcomeData['users']['students'] }}</h2>
                            <p class="counter-sub-txt mt--1 mb--8">Students</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-6">
                    <div class="counter-box d-flex flex-column align-items-center pt-120">
                        <div class="counter-img mb--60">
                            <img src="{{ asset('assets/welcome/images/counter-icon-4.png') }}"
                                class="filter-shadow-3" alt="Icon">
                        </div>
                        <div class="counter-part-txt text-center p-relative">
                            <h2 class="counter-txt odometer mb-20"
                                data-count="{{ $welcomeData['users']['teachers'] }}">
                                {{ $welcomeData['users']['teachers'] }}</h2>
                            <p class="counter-sub-txt mt--1 mb--8">Teachers</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-6">
                    <div class="counter-box d-flex flex-column align-items-center">
                        <div class="counter-img mb--60">
                            <img src="{{ asset('assets/welcome/images/counter-icon-3.png') }}"
                                class="filter-shadow-2" alt="Icon">
                        </div>
                        <div class="counter-part-txt text-center p-relative">
                            <h2 class="counter-txt odometer mb-20"
                                data-count="{{ $welcomeData['users']['parents'] }}">
                                {{ $welcomeData['users']['parents'] }}</h2>
                            <p class="counter-sub-txt mt--1 mb--8">Parents</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-3 col-6">
                    <div class="counter-box d-flex flex-column align-items-center pt-120">
                        <div class="counter-img mb--60">
                            <img src="{{ asset('assets/welcome/images/counter-icon-2.png') }}"
                                class="filter-shadow-4" alt="Icon">
                        </div>
                        <div class="counter-part-txt text-center p-relative">
                            <h2 class="counter-txt odometer mb-20" data-count="{{ $welcomeData['users']['total'] }}">
                                {{ $welcomeData['users']['total'] }}</h2>
                            <p class="counter-sub-txt mt--1 mb--8">Total</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter end -->



    <!-- contact begin -->
    <div class="contact-3 pb-50 pt-120" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="contact-form-wrapper mb-70">
                        <span class="contact-subtext">Get In Touch</span>
                        <h4 class="contact-titletext mb-40">Have Any Query?</h4>
                        <form>
                            <div class="contact-form">
                                <div class="contact-col-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="contact-col-6">
                                    <input type="email" placeholder="Email">
                                </div>
                                <div class="contact-col">
                                    <input type="text" placeholder="Message Subject">
                                </div>
                                <div class="contact-col">
                                    <textarea placeholder="Leave Messege"></textarea>
                                </div>
                                <div class="contact-col">
                                    <button class="def-btn">Submit Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="contact-info-wrapper ml-60 mb-70">
                        <ul>
                            <li>
                                <i class="icofont-google-map"></i>
                                <div class="contact-info-content">
                                    <span class="contact-info-content-text">Visit Office</span>
                                    Makumbusho, Dar es salaam
                                </div>
                            </li>
                            <li>
                                <i class="icofont-phone"></i>
                                <div class="contact-info-content">
                                    <span class="contact-info-content-text">Call Anytime</span>
                                    <a
                                        href="tel:{{ $welcomeData['contact']['mobile'] }}">{{ $welcomeData['contact']['mobile'] }}</a>
                                </div>

                            </li>
                            <li>
                                <i class="icofont-envelope-open"></i>
                                <div class="contact-info-content">
                                    <span class="contact-info-content-text">Send Email</span>
                                    <a
                                        href="mailto:{{ $welcomeData['contact']['email'] }}">t{{ $welcomeData['contact']['email'] }}</a>
                                </div>

                            </li>
                            <li>
                                <i class="icofont-globe"></i>
                                <div class="contact-info-content">
                                    <span class="contact-info-content-text">Visit Us</span>
                                    <a href="#" target="_blank">www.jiboost.co.tz</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact end -->



    <!-- footer begin -->
    <div class="footer">
        <div class="container">
            <div class="row g-0">
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="footer-single-info p-35 px-30 d-flex align-items-center">
                        <div class="footer-info-icon-wrap mr-20">
                            <img src="{{ asset('assets/welcome/images/footer-info-icon-1.png') }}"
                                class="footer-info-icon" alt="Phone">
                        </div>
                        <div class="footer-info-txt-area">
                            <p class="footer-info-title text-white mt--1 mb-11">Give us a Call</p>
                            <h4 class="footer-info-txt text-white mb--3"><a
                                    href="tel:{{ $welcomeData['contact']['mobile'] }}">{{ $welcomeData['contact']['mobile'] }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="footer-single-info p-35 px-30 border-l d-flex align-items-center">
                        <div class="footer-info-icon-wrap mr-20">
                            <img src="{{ asset('assets/welcome/images/footer-info-icon-2.png') }}"
                                class="footer-info-icon" alt="Email">
                        </div>
                        <div class="footer-info-txt-area">
                            <p class="footer-info-title text-white mt--1 mb-11">Send us a Message</p>
                            <h4 class="footer-info-txt text-white mb--3"><a
                                    href="mailto:{{ $welcomeData['contact']['email'] }}">{{ $welcomeData['contact']['email'] }}</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="footer-single-info p-35 px-30 border-l d-flex align-items-center">
                        <div class="footer-info-icon-wrap mr-20">
                            <img src="{{ asset('assets/welcome/images/footer-info-icon-3.png') }}"
                                class="footer-info-icon" alt="Office">
                        </div>
                        <div class="footer-info-txt-area">
                            <p class="footer-info-title text-white mt--1 mb-11">Visit our Location</p>
                            <h4 class="footer-info-txt text-white mb--3">{{ $welcomeData['contact']['location'] }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="main-footer pt-120 pb-70">
                <div class="row">
                    <div class="col-xl-4 col-lg-3 col-sm-6">
                        <div class="footer-card mb-50">

                            <h4 class="footer-card-title mt--2 pb-20 mb-30"><img
                                    src="{{ asset('assets/welcome/images/splash_dark.png') }}" alt="Logo"
                                    width="30" height="30" style="margin-right:20px">About JiBoost</h4>
                            <p class="footer-card-txt text-white mt--6 mb-30 pr-30">We provide the best tools and
                                resources for students to excel in their studies. If you're looking to boost your
                                knowledge and ace your exams, you've come to the right place.</p>
                            <span class="footer-follow-dialogue d-block mb-23">Follow us :</span>
                            <div class="footer-socials">
                                <a href="#" target="_blank" class="footer-social"><i
                                        class="icofont-twitter"></i></a>
                                <a href="#" target="_blank" class="footer-social"><i
                                        class="icofont-rss"></i></a>
                                <a href="#" target="_blank" class="footer-social"><i
                                        class="icofont-dribbble"></i></a>
                                <a href="#" target="_blank" class="footer-social"><i
                                        class="icofont-behance"></i></a>
                                <a href="#" target="_blank" class="footer-social"><i
                                        class="icofont-instagram"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-5 col-sm-6">
                        <div class="footer-card mb-50">
                            <h4 class="footer-card-title mt--2 pb-20 mb-30">Quick Links</h4>
                            <div class="footer-links mt--8">
                                <ul>
                                    <li><a href="#welcome" class="footer-link">Welcome</a></li>
                                    <li><a href="#whatwedo" class="footer-link">About</a></li>
                                    <li><a href="#classes" class="footer-link">Classes</a></li>
                                    <li><a href="#apps" class="footer-link">Apps</a></li>
                                    <li><a href="#contact" class="footer-link">Contact Us</a></li>
                                    <li><a href="/privacypolicy.html" class="footer-link">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-sm-6">
                        <div class="footer-card mb-50">
                            <h4 class="footer-card-title mt--2 pb-20 mb-30">Newsletter Subscription</h4>
                            <div class="footer-mewsletter">
                                <p class="footer-card-txt text-white mt--6 mb-26">Enter your email and get latest
                                    updates and offers subscribe us</p>
                                <form>
                                    <input type="email" name="email" class="footer-input px-35 mb-25"
                                        placeholder="Enter your email">
                                    <button class="def-btn">Subscribe Now!</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer end -->

    <script src={{ asset('assets/welcome/js/jquery-3.6.0.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/jquery-ui.js') }}></script>
    <script src={{ asset('assets/welcome/js/animate-headline.js') }}></script>
    <script src={{ asset('assets/welcome/js/simple-pagination.js') }}></script>
    <script src={{ asset('assets/welcome/js/main.js') }}></script>
    <script src={{ asset('assets/welcome/js/admin.js') }}></script>
    <script>
        localStorage.removeItem('registrationState');
        localStorage.removeItem('userType');
    </script>
</body>

</html>
