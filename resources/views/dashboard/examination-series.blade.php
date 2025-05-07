@extends('layouts.main')
@section('title', 'Examination')
@push('plugin-styles')
@endpush
@section('sidebar')
    <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ route('dashboard.exams') }}">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><span data-feather="arrow-left"></span></span>
                                    <span class="nav-link-text">Back</span>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="navbar-vertical-footer">
            <button
                class="btn navbar-vertical-toggle border-0 fw-semibold w-100 white-space-nowrap d-flex align-items-center">
                <span class="uil uil-left-arrow-to-left fs-8"></span>
                <span class="uil uil-arrow-from-right fs-8"></span>
                <span class="navbar-vertical-footer-text ms-2">Collapsed View</span>
            </button>
        </div>
    </nav>
@endsection
@section('content')
    <div class="content">
        <div class="mb-3">
            <h3>{{ $levelSubject['level_name'] }}</h3>
            <h4>{{ $levelSubject['subject_name'] }}</h4>
            <p class="text-body-tertiary fw-semibold mb-4">Select a series to start examination</p>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="row" style="display: flex;">
                    @foreach ($levelSubject['series'] as $series)
                        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-3 col-6 d-flex">
                            @if ($series['isTrial'])
                                <!-- Check if isTrial is true -->
                                <div class="text-center d-flex flex-column justify-content-center align-items-center p-5 w-100"
                                    style="background-color: white; flex-grow: 1; border-radius: 12px; min-height: 150px;">
                                    <!-- Lock Icon and Title for Trial -->
                                    <i class="fa fa-lock" style="font-size: 50px; color: rgb(2, 102, 141);"></i>
                                    <p class="title mt-2" style="color: rgb(2, 102, 141);">{{ $series['title'] }}</p>
                                </div>
                            @else
                                <a href="{{ route('examination.series.show', ['sub' => $levelSubjectId, 'series' => $series['id']]) }}"
                                    style="text-decoration: none">
                                    <div class="text-center d-flex flex-column justify-content-center align-items-center p-5 w-100"
                                        style="background-color: white; flex-grow: 1; border-radius: 12px; min-height: 150px;">
                                        <!-- Title for Non-Trial -->
                                        <span class="title fw-bolder" style="color: #00394F;">{{ $series['title'] }}</span>
                                    </div>
                                </a>
                            @endif
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection
