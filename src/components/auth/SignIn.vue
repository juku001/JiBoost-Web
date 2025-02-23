<template>

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
                                <a href="#" class="header-right-txt"><i class="icofont-facebook-messenger"></i></a>
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

    <!-- Initial Section -->
    <section id="initial-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12" id="signup-spacing">
                    <div class="banner-txt text-center">
                        <h3 class="banner-subtitle mt--9 mb-10">Sign In</h3>
                        <h1 class="banner-title mb-20 cd-headline push">
                            <span>Welcome Back</span>
                        </h1>
                        <p class="banner-paragraph mb-11">
                            The exams are waiting, signin and test yourself.
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12" id="signup-spacing">
                    <form action="" method="POST">

                        <div class="text-center mb-20">
                            <h5 class="fw-bold">Fill the following form to login</h5>
                        </div>
                        <div class="login-item mt-50">
                            <input class="form-control" type="email" name="username" placeholder="Enter your email">
                        </div>
                        <div class="login-item mt-50">
                            <input class="form-control" type="password" name="password"
                                placeholder="Enter your password">
                        </div>
                        <div class="mt-50 text-center">
                            <button class="btn btn-jb-primary">Sign In</button>
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-12">
                                    <p class="mt-25">Not Registered Yet ? <RouterLink to="/signup">Click here
                                        </RouterLink>
                                    </p>
                                </div>
                                <div class="col-xl-6 col-md-6 col-12">
                                    <p class="mt-25"><RouterLink to="/signup">Forgot Password
                                        </RouterLink>
                                    </p>
                                </div>
                            </div>
                            <p>
                                <RouterLink to="/">Back to Welcome Page</RouterLink>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


</template>


<script>

export default {
    name: 'SignIn'
}

</script>