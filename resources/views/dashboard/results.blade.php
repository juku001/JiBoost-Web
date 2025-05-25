@php
    use App\Helpers\CustomFunctions;
@endphp
@extends('layouts.main')
@section('title', 'Results')
@section('sidebar')
    @include('customs.sidebar')
@endsection
@section('content')

    <div class="content">
        <div class="row gy-3  justify-content-between">
            <div class="col-12">
                <h2 class="mb-2 text-body-emphasis">{{ __('navigation.results') }}</h2>
                <h5 class="text-body-tertiary fw-semibold mb-4">{{ __('results.subtitle') }}</h5>

            </div>
        </div>
        <div class="row gy-3 mb-4">

            @foreach ($results as $result)
                @php
                    $isSubmitted = $result['end_type'] == 'submitted';
                    $colorClass = $isSubmitted ? 'primary' : 'danger';
                    $color = $isSubmitted ? '#00394f' : '#fa3b1d';

                @endphp

                <div class="col-12 mb-1">
                    <a href="{{ route('dashboard.results.show', ['id' => CustomFunctions::encrypt($result['id'])]) }}"
                        class="text-decoration-none text-reset">
                        <div class="d-flex align-items-stretch bg-{{ $colorClass }}-subtle">
                            <!-- Left vertical colored bar -->
                            <div style="width: 4px; background-color: {{ $color }}; margin-right: 10px;"></div>

                            <!-- Main container -->
                            <div class="flex-grow-1 p-3 rounded"
                                style="background-color: var(--bs-{{ $colorClass }}-bg-subtle);">
                                <div class="d-flex justify-content-between align-items-start">
                                    <div>
                                        <h5 class="mb-1 text-{{ $colorClass }}">{{ $result['series_title'] }}</h5>
                                        <p class="fw-bold mb-0">{{ $result['subject'] }} | {{ $result['education_level'] }}
                                        </p>
                                    </div>
                                    <div>
                                        <span class="fw-bold" style="font-style: italic;">
                                            {{ $isSubmitted ? $result['questions_checked'] . '/' . $result['questions_count'] : $result['questions_count'] }}
                                            Qns
                                        </span>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="text-muted small">
                                        {{ CustomFunctions::formatDateTimeFromDateTime($result['start_time']) }}
                                    </span>

                                    @if ($isSubmitted)
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center me-2"
                                                style="width: 20px; height: 20px; border: 1px solid;background-color : #00394f">
                                                <strong class="responsive-text ">{{ $result['grade'] ?? '' }}</strong>
                                            </div>
                                            <span class="fw-bold">{{ $result['score'] }}%</span>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
