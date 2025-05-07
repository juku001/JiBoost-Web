<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Subscribe') | {{ env('APP_NAME') }}</title>
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

    <style>
        .method-logo {
            width: 100px;
            /* Default size */
            height: auto;
            /* Maintain aspect ratio */
            max-width: 100%;
            /* Ensure it doesn't overflow */
        }

        /* Adjust size for tablets */
        @media (max-width: 768px) {
            .method-logo {
                width: 80px;
            }
        }

        /* Adjust size for mobile devices */
        @media (max-width: 480px) {
            .method-logo {
                width: 60px;
            }
        }
    </style>
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



    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-20">
                <h2 class="section-title">Subscription</h2>
                <h3 class="banner-paragraph">Select Package and Payment Method</h3>
            </div>
            <div class="col-12 text-center mt-5">
                <div class="d-flex justify-content-center align-items-center gap-3 flex-wrap">
                    @foreach ($methods as $method)
                        <img src="{{ \App\Helpers\ApiRoutes::baseUrl() . $method['logo'] }}"
                            alt="{{ $method['name'] }}" class="method-logo">
                    @endforeach
                </div>
            </div>

            <div class="offset-xxl-2 offset-xl-2 offset-lg-1 offset-md-1 col-xxl-8 col-xl-8 col-lg-10 col-md-10 col-12">
                <div class="row">

                    <div class="row">
                        <!-- Subscription Selection -->
                        <div class="col-6 text-center">
                            <div>
                                <select id="subscription-select" class="form-control">
                                    <option value="" selected disabled>Select Package</option>
                                    @foreach ($subscriptions as $subscription)
                                        <option value="{{ $subscription['id'] }}" 
                                                data-name="{{ $subscription['name'] }}"
                                                data-description="{{ $subscription['description'] }}"
                                                data-price="{{ $subscription['price'] }}">
                                            {{ $subscription['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <!-- Dynamic Input Field -->
                            <div class="col-12 mt-3">
                                <label id="input-label" for="num-input">Number of Exams</label>
                                <input type="number" id="num-input" class="form-control">
                            </div>
                        </div>
                    
                        <!-- Subscription Details -->
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12 mt-2">
                                    <label for="">Name</label>
                                    <p id="sub-name">-</p>
                                </div>
                                <div class="col-12 mt-2">
                                    <label for="">Description</label>
                                    <p id="sub-description">-</p>
                                </div>
                                <div class="col-12">
                                    <label for="">Price</label>
                                    <p id="sub-price">-</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    



                </div>
            </div>

        </div>
    </div>



    <script src={{ asset('assets/welcome/js/jquery-3.6.0.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/bootstrap.bundle.min.js') }}></script>
    <script src={{ asset('assets/welcome/js/jquery-ui.js') }}></script>
    <script src={{ asset('assets/welcome/js/animate-headline.js') }}></script>
    <script src={{ asset('assets/welcome/js/simple-pagination.js') }}></script>
    <script src={{ asset('assets/welcome/js/main.js') }}></script>
    <script src={{ asset('assets/welcome/js/admin.js') }}></script>

    @push('plugin-scripts')
        <script>
      document.addEventListener("DOMContentLoaded", function() {
    const subscriptionSelect = document.getElementById("subscription-select");
    const subName = document.getElementById("sub-name");
    const subDescription = document.getElementById("sub-description");
    const subPrice = document.getElementById("sub-price");
    const inputLabel = document.getElementById("input-label");
    const numInput = document.getElementById("num-input");

    subscriptionSelect.addEventListener("change", function() {
        const selectedOption = this.options[this.selectedIndex];

        if (selectedOption.value) {
            // Update subscription details
            subName.textContent = selectedOption.getAttribute("data-name");
            subDescription.textContent = selectedOption.getAttribute("data-description");
            subPrice.textContent = "Tsh " + selectedOption.getAttribute("data-price"); // Format price

            // Change input label based on subscription type
            const packageName = selectedOption.getAttribute("data-name").toLowerCase();
            if (packageName.includes("per exam")) {
                inputLabel.textContent = "Number of Exams";
            } else {
                inputLabel.textContent = "Number of Months";
            }
        } else {
            // Reset fields if no package is selected
            subName.textContent = "-";
            subDescription.textContent = "-";
            subPrice.textContent = "-";
            inputLabel.textContent = "Number of Exams";
            numInput.value = "";
        }
    });
});
</script>
    @endpush
</body>

</html>
