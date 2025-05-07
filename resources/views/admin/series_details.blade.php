@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1" href="{{ route('admin.exams.series') }}">
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
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">{{ $data['level_name'] }}</h2>
                <h4 class="text-body-tertiary fw-semibold mb-4">{{ $data['subject_name'] }} Subject</h4>
            </div>
            <div class="mt-3 row">

                @foreach ($data['series'] as $serie)
                    <div
                        class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-12 d-flex justify-content-center align-items-center mb-2">
                        <div class="card w-100 text-center d-flex justify-content-center align-items-center"
                            style="height: 150px;">
                            <a href="{{ route('admin.exams.questions.show', ['levelSub' => $levelSub, 'seriesId' => $serie['id']]) }}"
                                style="text-decoration: none">
                                <div class="m-0">
                                    <h4>{{ $serie['title'] }}</h4>
                                    <p>{{ $serie['isTrial'] ? 'Trial' : '' }}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
