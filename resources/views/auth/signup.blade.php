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

    </div>
    <!-- header end -->
    <!-- Form Structure -->
    <form action="{{ route('signup') }}" method="POST">
        @csrf
        <!-- Form Section (Initially Hidden) -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <h2 class="section-title">{{ ucfirst($userType) }} Registration</h2>
                        <h3 class="banner-paragraph">Fill the following form to register</h3>
                    </div>
                    <div class="row mt-5">
                        <div
                            class="offset-xxl-2 offset-xl-2 offset-lg-1 offset-md-1 col-xxl-8 col-xl-8 col-lg-10 col-md-10 col-12 mt-2 row">

                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                                <div class="form-group">
                                    <label for="name">Fullname</label>
                                    <input type="name" class="form-control" name="name"
                                        placeholder="Eg John Doe" required>
                                    <input type="hidden" value="{{ $userType }}" name="user-type">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email"
                                        placeholder="Eg someemail@email.com" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mt-4">
                                <div class="form-group">
                                    <label for="mobile">Mobile</label>
                                    <input type="phone" class="form-control" name="mobile"
                                        placeholder="Eg 2557XXXXXXXX" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="sex">Sex</label>
                                    <select type="sex" class="form-control" name="sex" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" class="form-control" name="dob" required>

                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="region">Region</label>
                                    <select id="region" name="region" class="form-control" required>
                                        <option value="">Select your Region</option>
                                        <option value="Dar es Salaam">Dar es Salaam</option>
                                        <option value="Dodoma">Dodoma</option>
                                        <option value="Geita">Geita</option>
                                        <option value="Iringa">Iringa</option>
                                        <option value="Kagera">Kagera</option>
                                        <option value="Kigoma">Kigoma</option>
                                        <option value="Kilimanjaro">Kilimanjaro</option>
                                        <option value="Lindi">Lindi</option>
                                        <option value="Manyara">Manyara</option>
                                        <option value="Mara">Mara</option>
                                        <option value="Mbeya">Mbeya</option>
                                        <option value="Morogoro">Morogoro</option>
                                        <option value="Mtwara">Mtwara</option>
                                        <option value="Mwanza">Mwanza</option>
                                        <option value="Pwani">Pwani</option>
                                        <option value="Rukwa">Rukwa</option>
                                        <option value="Ruvuma">Ruvuma</option>
                                        <option value="Shinyanga">Shinyanga</option>
                                        <option value="Singida">Singida</option>
                                        <option value="Tabora">Tabora</option>
                                        <option value="Tanga">Tanga</option>
                                        <option value="Zanzibar Urban/West">Zanzibar Urban/West</option>
                                        <option value="Zanzibar North">Zanzibar North</option>
                                        <option value="Zanzibar South">Zanzibar South</option>
                                        <option value="Zanzibar Central/South">Zanzibar Central/South</option>
                                    </select>

                                </div>
                            </div>


                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="address">Street Address</label>
                                    <input type="text" class="form-control" name="address"
                                        placeholder="Eg Kisutu Street, House no 23" required>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="level">Education Level</label>
                                    <select type="text" class="form-control" name="level_of_education" required>
                                        <option value="">Select your education level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="school_name">Name of your School</label>
                                    <input type="text" class="form-control" name="school_name" required
                                        placeholder="Eg JiBoost Primary School">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-4">
                                <div class="form-group">
                                    <label for="school_location">School Location</label>
                                    <input type="text" class="form-control" name="school_location" required
                                        placeholder="Eg Temeke,Dar es Salaam">
                                </div>
                            </div>
                            <div class="col-12 mt-4">
                                <p>Enter Account Password</p>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-2">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password here">
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-6 col-lg-5 col-md-5 col-12 mt-2">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Repeat Password here">
                                </div>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-jb-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="text-center">
                        <span class="signup-step active" id="signup-step-1">1</span>
                        <span class="signup-step" id="signup-step-2">2</span>
                        <span class="signup-step" id="signup-step-3">3</span>
                    </div> --}}
                    {{-- <div class="form-content container-fluid">
                        <!-- Step 1 -->
                        <div id="step-1">
                            <div class="row">
                                <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                    <label for="first-name">Full Name<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="fullname" name="full_name" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mt-15">
                                    <label for="sex">Sex<span class="text-danger fw-bold">*</span></label>
                                    <select id="sex" name="sex" class="form-control" required>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                    <label for="email">Email<span class="text-danger fw-bold">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mt-15">
                                    <label for="phone">Phone<span class="text-danger fw-bold">*</span></label>
                                    <input type="tel" id="phone" name="phone" class="form-control"
                                        required>
                                </div>
                                <div class="form-group mt-20 col-xl-6 col-lg-6 col-md-6 col-12">
                                    <label for="password">Password<span class="text-danger fw-bold">*</span></label>
                                    <input type="password" id="password" name="password" class="form-control"
                                        required>
                                </div>
                                <div class="mb-30 text-center">
                                    <button id="back-btn" type="button" class="btn btn-danger mt-25">Back</button>
                                    <button id="next-btn-step-1" type="button"
                                        class="btn btn-jb-primary mt-25">Next</button>
                                </div>
                            </div>
                        </div>
                        <!-- Step 2 -->
                        <div id="step-2" style="display: none;">
                            <div class="row">

                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mt-15">
                                    <label for="dob">Date of Birth<span
                                            class="text-danger fw-bold">*</span></label>
                                    <input type="date" id="dob" name="dob" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mt-15">
                                    <label for="address">Address<span class="text-danger fw-bold">*</span></label>
                                    <input type="text" id="address" name="address" class="form-control"
                                        required>
                                </div>
                                <div class="form-group col-xl-6 col-lg-6 col-md-6 col-12 mt-15">
                                    <label for="region">Region<span class="text-danger fw-bold">*</span></label>
                                    <select id="region" name="region" class="form-control" required>
                                        <option value="">Select your Region</option>
                                        <option value="Dar es Salaam">Dar es Salaam</option>
                                        <option value="Dodoma">Dodoma</option>
                                        <option value="Geita">Geita</option>
                                        <option value="Iringa">Iringa</option>
                                        <option value="Kagera">Kagera</option>
                                        <option value="Kigoma">Kigoma</option>
                                        <option value="Kilimanjaro">Kilimanjaro</option>
                                        <option value="Lindi">Lindi</option>
                                        <option value="Manyara">Manyara</option>
                                        <option value="Mara">Mara</option>
                                        <option value="Mbeya">Mbeya</option>
                                        <option value="Morogoro">Morogoro</option>
                                        <option value="Mtwara">Mtwara</option>
                                        <option value="Mwanza">Mwanza</option>
                                        <option value="Pwani">Pwani</option>
                                        <option value="Rukwa">Rukwa</option>
                                        <option value="Ruvuma">Ruvuma</option>
                                        <option value="Shinyanga">Shinyanga</option>
                                        <option value="Singida">Singida</option>
                                        <option value="Tabora">Tabora</option>
                                        <option value="Tanga">Tanga</option>
                                        <option value="Zanzibar Urban/West">Zanzibar Urban/West</option>
                                        <option value="Zanzibar North">Zanzibar North</option>
                                        <option value="Zanzibar South">Zanzibar South</option>
                                        <option value="Zanzibar Central/South">Zanzibar Central/South</option>
                                    </select>
                                </div>
                                <div class="text-center mt-20 mb-40">
                                    <button id="previous-btn-step-2" type="button"
                                        class="btn btn-danger">Previous</button>
                                    <button id="next-btn-step-2" type="button"
                                        class="btn btn-jb-primary">Next</button>
                                </div>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div id="step-3" style="display: none;">
                            <div id="additional-fields"></div>
                            <div class="mt-20 mb-40 text-center">
                                <button id="previous-btn-step-3" type="button"
                                    class="btn btn-danger">Previous</button>
                                <button id="submit-btn" type="submit" class="btn btn-jb-primary">Submit</button>
                            </div>
                        </div>
                    </div> --}}
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
