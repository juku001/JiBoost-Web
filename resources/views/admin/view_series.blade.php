@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    @include('customs.admin_sidebar')
@endsection
@section('content')
    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">Education Levels & Subjects</h2>
                <h5 class="text-body-tertiary fw-semibold mb-2">Select education level to start with</h5>
            </div>
            <div class="row">
                @foreach ($levelSubjects as $levelSubject)
                    <div class="col-12 mt-5">
                        <h4>{{ $levelSubject['level'] }}</h4>
                        <h6>{{ $levelSubject['subtitle'] }}</h6>
                        <div class="mt-2 row">
                            @foreach ($levelSubject['subjects'] as $subject)
                                <div class="col-xl-3 col-lg-3 col-md-3 col-6 mt-2">
                                    <div>
                                        <a
                                            href="{{ route('admin.exams.series.show', ['levelSub' => $subject['education_level_subject_id']]) }}">
                                            <img class="w-100"
                                                src="{{ isset($subject['image']) ? $apiRoutes->baseUrl() . $subject['image'] : asset('images/default.png') }}"
                                                alt="{{ $subject['subject_name'] ?? 'Subject Image' }}">
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
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
@endsection
