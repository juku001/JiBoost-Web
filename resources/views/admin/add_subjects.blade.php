@extends('layouts.main')
@section('title', 'Subjects')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Subjects</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Check your business growth in one place</h5>
            </div>
            <div class="mt-5 row">
                @foreach ($subjects as $subject)
                    <div class="col-xl-3 col-lg-3 col-md-4 col-6 mt-2">
                        <div class="subject-box">
                            <img class="subject-image" src="{{ $ApiRoutes->baseUrl() . $subject['image'] }}"
                                alt="{{ $subject['subject_name'] }}">
                            <h6 class="subject-name">{{ $subject['subject_name'] }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
