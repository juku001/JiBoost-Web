@extends('layouts.main')
@section('title', 'Dashboard')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-12">
                <h2 class="mb-2 text-body-emphasis">{{ __('dashboard.title') }}</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">{{ __('dashboard.subtitle') }}</h5>
                <div class="row g-3 mb-3">

                    <div class="col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="row h-100">
                                    <!-- Left Side (Centered Content) -->
                                    <div
                                        class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex align-items-center justify-content-center mb-5 mb-md-0 mt-5 mt-md-0">
                                        <h2 class="text-center jb-heading">{{ __('dashboard.welcome') }}</h2>
                                    </div>
                                    <!-- Right Side (Fixed Height) -->
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                                        @if ($subscription != null)
                                            <div class="bg-success-subtle rounded-4 text-center d-flex align-items-center justify-content-center"
                                                style="height: 25vh; min-height: 35vh;">
                                                <div class="row">
                                                    <div>
                                                        <p class="text-success-emphasis">{{ __('dashboard.sub_active_text') }}</p>

                                                        <p class="text-success-emphasis">
                                                            {{ ucfirst($subscription['name']) }} Subscription</p>
                                                        <p class="text-success strong">Valid Until
                                                            {{ $subscription['end_date'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="bg-danger-subtle rounded-4 text-center d-flex align-items-center justify-content-center"
                                                style="height: 25vh; min-height: 35vh;">
                                                <div class="row">
                                                    <div>
                                                        <p class="text-danger-emphasis">{{ __('dashboard.sub_inactive_text') }}</p>
                                                    </div>
                                                    <div class="">
                                                        <a class="btn btn-danger me-1 mb-1"
                                                            href="{{ route('dashboard.subscription') }}">{{ __('dashboard.sub_inactive_button') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mt-5 mb-5">
                                    <div>
                                        <h3>{{ __('dashboard.ppe_title') }}</h3>
                                    </div>
                                    <div class="">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <h4>Tsh {{ $ppe != null ? $ppe['balance'] : 0 }}</h4>
                                </div>
                                <div class="mt-2">
                                    <span>{{ __('dashboard.left',[ 'exam' => $ppe != null ? $ppe['exams'] : 0]) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
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
                                @if ($quote == null)
                                    <h3 class="mb-5 mt-4 text-center">{{ __('dashboard.quote_title') }}</h3>
                                    <p class="text-body-tertiary fw-semibold text-center">"Always Keep going forward,
                                        no matter what the
                                        situation" - JuKu001</p>
                                @else
                                    <h3 class="mb-5 mt-4 text-center">{{ __('dashboard.quote_title') }}</h3>
                                    <p class="text-body-tertiary fw-semibold text-center">"{{ $quote['quote'] }}" -
                                        {{ $quote['author'] }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
