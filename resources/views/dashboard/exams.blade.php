@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')

    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-xxl-6">
                <h2 class="mb-2 text-body-emphasis">Exams</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">Select an exam series to start with</h5>

                <div class="g-3 mb-3 mt-3 row">
                    @foreach ($levelSubjects as $level)
                        <div class="row mt-4">
                            <h4>{{ $level['level'] }}</h4>
                            <p>{{ $level['subtitle'] }}</p>
                            <div class="scrollable-row">

                                @foreach ($level['subjects'] as $subject)
                                    <div class="col-xl-3 col-lg-3 col-md-3 col-6">
                                        <a href="{{ route('examination.series', ['id' => $subject['education_level_subject_id']]) }}">
                                            <div class="image-container w-100">
                                                <img src="{{ $apiRoutes->baseUrl() . $subject['image'] }}"
                                                    alt="Chemistry Image">
                                            </div>
                                        </a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span>{{ $subject['subject_name'] }}</span>
                                            </div>
                                            <div>
                                                <span>{{ $subject['count'] }} Series</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
@endsection
