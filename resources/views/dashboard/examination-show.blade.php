@extends('layouts.main')
@section('title', 'Examination')
@push('plugin-styles')
@endpush
@section('sidebar')
    {{-- <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
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
    </nav> --}}
@endsection
@section('content')
    <div class="content" style="background-color: white">
        <style>
            .custom-height {
                height: 60vh;
                /* 90% of viewport height */
            }
        </style>

        <div class="d-flex justify-content-center align-items-center custom-height">
            <div class="text-center">
                <h2>Series Name</h2>
                <div class="mt-5">
                    <a href="{{ route('examination.series.start', ['sub' => $sub, 'series' => $id]) }}"
                        class="btn btn-jb-primary">Sign In</a>
                    <a href="#" class="mt-3 btn btn-subtle-danger">Cancel</a>
                </div>
            </div>
        </div>

    </div>
@endsection
