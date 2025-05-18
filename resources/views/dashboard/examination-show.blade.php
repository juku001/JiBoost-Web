@extends('layouts.sub_main')
@section('title', 'Examination')
@section('content')
    @php
        use App\Helpers\CustomFunctions;
    @endphp
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center overflow-hidden">
        <div class="text-center">
            <h1 class="jb-heading">{{ $series['title'] }}</h1>

            <div class="mt-4">
                <h4>{{ $levelSubject['level_name'] }}</h4>
                <p>{{ $levelSubject['subject_name'] }}</p>
            </div>

            <div class="mt-4">
                <div>
                    <span>Estimated Time: <span
                            class="fw-bold">{{ CustomFunctions::getDurationFromMinutes($series['duration']) }}</span></span>
                </div>
                <div>
                    <span>Number of Questions: <span class="fw-bold">{{ count($series['data']) }}</span></span>
                </div>
                <div class="mt-3">
                    <a href="{{ route('examination.series.start', ['sub' => $sub, 'series' => $id]) }}"
                        class="btn btn-jb-primary px-6 py-3">Start Exam</a>
                </div>
            </div>
        </div>
    </div>

@endsection
