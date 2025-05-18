<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Register') | {{ env('APP_NAME') }}</title>
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
    <div class="mouse-cursor-invisible">
        <div class="mouseCursor cursor-outer"></div>
        <div class="mouseCursor cursor-inner"></div>
    </div>
    <form action="{{ route('auth.register.type') }}" method="GET">
        {{-- @csrf --}}
        <section id="initial-section" class="d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12" id="signup-spacing">
                        <div class="banner-txt text-center">
                            <h3 class="banner-subtitle mt--9 mb-10">Create Account</h3>
                            <h1 class="banner-title mb-20 cd-headline push">
                                <span>Welcome to JiBoost</span>
                            </h1>
                            <p class="banner-paragraph mb-11">
                                Are you a Student, Teacher or Parent ?
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12 text-center" id="signup-spacing">
                        <h5 class="fw-bold">Select User Type</h5>
                        <div class="mt-1 mb-1">
                            <img id="user-image" src="{{ asset('assets/welcome/images/signup_student.webp') }}"
                                alt="User Type" width="250">
                        </div>
                        <div class="row mt-1">
                            <div class="col-4 text-center">
                                <input type="radio" name="user-type"
                                    data-image="{{ asset('assets/welcome/images/signup_student.webp') }}"
                                    id="student" value="student" checked>
                                <label for="student" class="jb-radio">Student</label>
                            </div>
                            <div class="col-4 text-center">
                                <input type="radio" name="user-type"
                                    data-image="{{ asset('assets/welcome/images/signup_parents.webp') }}"
                                    id="parent" value="parent">
                                <label for="parent" class="jb-radio">Parent</label>
                            </div>
                            <div class="col-4 text-center">
                                <input type="radio" name="user-type"
                                    data-image="{{ asset('assets/welcome/images/signup_teacher.webp') }}"
                                    id="teacher" value="teacher">
                                <label for="teacher" class="jb-radio">Teacher</label>
                            </div>
                        </div>
                        <div class="mt-15">
                            <button class="btn btn-jb-primary">Continue</button>
                        </div>
                        <div class="mt-3 mb-30">
                            <span>Already have an Account? <a class="text-primary fw-semibold"
                                    href="{{ route('auth.login') }}">Click here</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </form>
    <script src={{ asset('assets/welcome/js/jquery-3.6.0.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/jquery-ui.js') }}></script>
    <script src={{ asset('assets/welcome/js/animate-headline.js') }}></script>
    <script src={{ asset('assets/welcome/js/simple-pagination.js') }}></script>
    <script src={{ asset('assets/welcome/js/main.js') }}></script>
    <script src={{ asset('assets/welcome/js/admin.js') }}></script>
    <script src={{ asset('assets/welcome/js/signup.js') }}></script>
    @push('plugin-scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const form = document.getElementById("registration-form");
                const selectedType = document.querySelector('input[name="user_type"]:checked');

                if (selectedType) {
                    form.action = `{{ route('auth.register.type', '') }}/${selectedType.value}`;
                }
            });
        </script>
    @endpush
</body>

</html>
