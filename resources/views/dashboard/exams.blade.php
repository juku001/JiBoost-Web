@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')

    <div class="content">
        <div class="row gy-3 mb-4 justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">{{ __('navigation.exams') }}</h2>
                <h5 class="text-body-tertiary fw-semibold mb-2">{{ __('exams.subtitle') }}</h5>

                <div class="mb-3 row">
                    @foreach ($levelSubjects as $level)
                        <div class="row mt-4">
                            <h4 class="responsive-text">{{ $level['level'] }}</h4>
                            <p class="responsive-text mb-1">{{ $level['subtitle'] }}</p>
                            <div class="scrollable-row">
                                @foreach ($level['subjects'] as $subject)
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-7 scroll-item">
                                        <a
                                            href="{{ route('examination.series', ['id' => $subject['education_level_subject_id']]) }}">
                                            <div class="image-container w-100">
                                                <img src="{{ $apiRoutes->baseUrl() . $subject['image'] }}"
                                                    alt="Chemistry Image">
                                            </div>
                                        </a>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <span
                                                    class="responsive-text fw-semibold">{{ $subject['subject_name'] }}</span>
                                            </div>
                                            <div>
                                                <span class="responsive-text fw-semibold">{{ $subject['count'] }}
                                                    Series</span>
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
@section('plugin-scripts')
    
@endsection
