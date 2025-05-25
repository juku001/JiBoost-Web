@extends('layouts.sub_main')
@section('title', 'Exam Details')
@section('sub_title')
    <h5 class="logo-text ms-2 jb-heading responsive-text">JiBoost</h5>
@endsection
@section('plugin-styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endsection
@section('new-route', route('dashboard.results'))
@section('content')
    @php
        use App\Helpers\CustomFunctions;
        use App\Helpers\LaTexHelper;
        use App\Helpers\ApiRoutes;
        $isSubmitted = $exam['end_type'] == 'submitted';
        $data = (array) session(env('USER_INFO_KEY'));
        $name = $data['name'];
    @endphp
    <div class="content">
        <div class="text-center">
            <h3>Exam Results</h3>
            <h5 class="text-body-tertiary my-3">{{ $name }}</h5>
        </div>
        <div class="col-12 w-100">
            <div class="card">
                <div class="card-body text-center p-4 p-md-9">
                    <div>
                        <h6>{{ $exam['series']['education_level_subject']['subject']['subject_name'] ?? 'No Subject' }} |
                            {{ $exam['series']['education_level_subject']['education_level']['name'] ?? 'No Subject' }}</h6>
                        @php
                            use Carbon\Carbon;
                        @endphp

                        <p class="responsive-text">{{ Carbon::parse($exam['created_at'])->format('d F Y') }}</p>

                        <h6 class="mt-1 text-{{ $isSubmitted ? 'primary' : 'danger' }}">
                            {{ $isSubmitted ? 'Submitted' : 'Cancelled' }}
                        </h6>
                    </div>
                    <div class="mt-5 mt-md-8 row">
                        <div class="col-6 col-md-3  p-2">
                            <div
                                class="text-center result-item-dash d-flex flex-column justify-content-center align-items-center h-100">
                                <h6>Start Time</h6>
                                <p class="responsive-text">
                                    {{ CustomFunctions::formatTimeFromDateTime($exam['start_time']) }}</p>
                            </div>
                        </div>

                        <div class="col-6 col-md-3  p-2">
                            <div
                                class="text-center result-item-dash d-flex flex-column justify-content-center align-items-center h-100">
                                <h6>End Time</h6>
                                <p class="responsive-text">
                                    {{ CustomFunctions::formatTimeFromDateTime($exam['end_time']) }}
                                </p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3  p-2">
                            <div
                                class="text-center result-item-dash d-flex flex-column justify-content-center align-items-center h-100">
                                <h6>Total Qns</h6>
                                <p class="responsive-text">{{ $exam['questions_count'] }}</p>
                            </div>
                        </div>
                        <div class="col-6 col-md-3  p-2">
                            <div
                                class="text-center result-item-dash d-flex flex-column justify-content-center align-items-center h-100">
                                <h6>Done Qns</h6>
                                <p class="responsive-text">
                                    {{ $exam['questions_done'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if ($isSubmitted)
                        <div class="mt-3 mt-md-5 d-flex justify-content-center align-items-end gap-1 stars">
                            <span style="visibility: hidden;">★</span>
                            <span style="font-size: 1.2rem;">★</span>
                            <span style="font-size: 1.5rem;">★</span>
                            <span style="font-size: 2rem;">★</span>
                            <span style="font-size: 2.5rem;">★</span>
                            <span style="font-size: 2rem;">★</span>
                            <span style="font-size: 1.5rem;">★</span>
                            <span style="font-size: 1.2rem;">★</span>
                            <span style="visibility: hidden;">★</span>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <div class="rounded-circle text-white d-flex align-items-center justify-content-center"
                                style="width:30px; height:30px; border: 1px solid; background-color: #00394f;">
                                <strong class="responsive-text">{{ $exam['grade'] ?? '' }}</strong>
                            </div>

                            <div class="mt-2 text-center">
                                <h2 class="jb-heading" style="font-size: 2.8rem">{{ number_format($exam['score'], 2) }}
                                </h2>
                                <p class="mt-2">
                                    Score
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        @if ($isSubmitted)
            <div class="col-12 mt-5 mt-md-9 w-100">
                <div class="card">
                    <div class="card-body text-center p-4 p-md-9">
                        <div class="text-center">
                            <p class="responsive-text">Questions</p>
                        </div>
                        <div class="mt-4 text-start">
                            @foreach ($questions as $index => $question)
                                <div class="mt-3 text-start w-100">
                                    <p class="m-0 small">Qn. {{ $index + 1 }}</p>

                                    <p class="m-0 small w-100">
                                    <div class="text-start">
                                        {!! LaTexHelper::extractLatex($question['question_text']) !!}
                                    </div>
                                    </p>

                                    @if (isset($question['image']))
                                        <p class="m-0 small w-100 text-start">
                                            {{-- <img target="_blank" href="{{ ApiRoutes::baseUrl() . '/' . $question['image'] }}"
                                                class="d-inline-block text-start">
                                                View Image
                                            > --}}
                                            <img class="img-fluid" width="150"
                                                src="{{ ApiRoutes::baseUrl() . '/' . $question['image'] }}"
                                                alt="question {{ $index + 1 }}">
                                        </p>
                                    @endif

                                    <p class="text-primary m-0 small">Your Answer</p>
                                    <p class="m-0 w-100 text-start">
                                        {!! CustomFunctions::giveAnswerResult($question, $exam['questions_data']) !!}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        @endif
        <div class="mt-2 text-center">
            <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill" style="background-color: #00394F">
                Done
            </a>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script type="text/javascript" async src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
@endpush
