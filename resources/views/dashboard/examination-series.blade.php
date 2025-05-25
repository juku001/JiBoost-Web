@extends('layouts.main')
@section('title', 'Examination')
@php
    use App\Helpers\CustomFunctions;
@endphp
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
        <div class="container">
            <div class="row">
                <div class="col-12 text-center py-6 bg-secondary-subtle rounded">
                    <h4 class="jb-heading">{{ $levelSubject['level_name'] }}</h4>
                    <h4 class="responsive-text">{{ $levelSubject['subject_name'] }}</h4>
                    <div class="mt-3 text-center d-flex justify-content-between">
                        <div class="card mx-1 flex-fill d-flex align-items-center justify-content-center">
                            <div class="py-4 text-center">
                                <h3>0/1</h3>
                                <p class="responsive-text">Completed series</p>
                            </div>
                        </div>

                        <div class="card mx-1 flex-fill d-flex align-items-center justify-content-center">
                            <div class="py-4 text-center">
                                <h3>0.0 %</h3>
                                <h5 class="responsive-text">N/A</h5>
                                <p class="responsive-text">Best Series Score</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container-fluid px-0">
            <div class="row g-0 mt-5">
                @foreach ($levelSubject['series'] as $series)
                    <div class="col-6 col-md-4 p-2">
                        @php
                            $isAllowed = CustomFunctions::allowedToViewSeries(
                                $series,
                                $subInfo,
                                $levelSubject['level_id'],
                            );
                            $route = route('examination.series.show', [
                                'sub' => CustomFunctions::encrypt($levelSubjectId),
                                'series' => CustomFunctions::encrypt($series['id']),
                            ]);
                            if ($isAllowed == false) {
                                $route = route('examination.series.deny', [
                                    'id' => CustomFunctions::encrypt($levelSubjectId),
                                ]);
                            }
                        @endphp
                        <a class="text-decoration-none" href="{{ $route }}">
                            <div class="series-item">
                                <div class="series-body">
                                    @if ($series['isTrial'])
                                        <span class="trial-text jb-heading">Trial</span>
                                    @else
                                        @if ($isAllowed == false)
                                            <span>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-lock-fill series-icon" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd"
                                                        d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                                                </svg>
                                            </span>
                                        @endif
                                    @endif
                                </div>
                                <div class="series-footer">
                                    <span class="responsive-text">{{ $series['title'] }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
