@extends('layouts.main')
@section('title', 'Admin Dash')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Admin Dashboard</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>
                <div class="row g-3 mb-3">
                    {{-- <div class="col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row h-100">
                                    <!-- Left Side (Centered Content) -->
                                    <div
                                        class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center mb-5 mb-md-0 mt-5 mt-md-0">
                                        <h2 class="text-center jb-heading">Welcome to JiBoost</h2>
                                    </div>
                                    <!-- Right Side (Fixed Height) -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        <div class="bg-danger-subtle rounded-4 text-center d-flex align-items-center justify-content-center"
                                            style="height: 25vh; min-height: 35vh;">
                                            <div class="row">
                                                <div>
                                                    <p class="text-danger-emphasis">You don't have any active
                                                        subscription</p>
                                                </div>
                                                <div class="">
                                                    <button class="btn btn-danger me-1 mb-1"
                                                        type="button">Subscribe</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-6 col-xxl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mt-5 mb-5">
                                    <div>
                                        <h3>PayExam Balance</h3>
                                    </div>
                                    <div class="">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4>Tsh 0</h4>
                                </div>
                                <div class="mt-2">
                                    <span>0 Exams Left</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 col-xxl-5">
                        <div class="card border h-100 w-100 overflow-hidden">
                            <div class="bg-holder d-block bg-card"
                                style="background-image:url(assets/img/spot-illustrations/32.png);background-position: top right;">
                            </div>
                            <!--/.bg-holder-->
                            <div class="d-dark-none">
                                <div class="bg-holder d-none d-sm-block d-xl-none d-xxl-block bg-card"
                                    style="background-image:url(assets/img/spot-illustrations/21.png);background-position: bottom right; background-size: auto;">
                                </div>
                                <!--/.bg-holder-->
                            </div>
                            <div class="d-light-none">
                                <div class="bg-holder d-none d-sm-block d-xl-none d-xxl-block bg-card"
                                    style="background-image:url(assets/img/spot-illustrations/dark_21.png);background-position: bottom right; background-size: auto;">
                                </div>
                                <!--/.bg-holder-->
                            </div>
                            <div class="card-body px-5 position-relative">
                                <!-- <div class="badge badge-phoenix fs-10 badge-phoenix-warning mb-4"><span class="fw-bold">Coming soon</span><span class="fa-solid fa-award ms-1"></span></div> -->
                                <h3 class="mb-5 mt-4 text-center">Motivational Quotes</h3>
                                <p class="text-body-tertiary fw-semibold text-center">"Always Keep going forward,
                                    no matter what the
                                    situation" - JuKu001</p>
                            </div>
                            <div class="card-footer border-0 py-0 px-5 z-1">
                                <!-- <p class="text-body-tertiary fw-semibold">Follow <a href="https://themewagon.com/">ThemeWagon </a>at <br class="d-none d-xxl-block" />Bootstrap Marketplace for updates.</p> -->
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
