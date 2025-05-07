@extends('layouts.main')
@section('title', 'Examination')

@section('content')
    <div class="content">
        <div class="text-right">
            <a href="" class="btn btn-danger">Cancel Exam</a>
        </div>
        <div class="mt-5">


            <div class="container">
                <div class="row">
                    <div
                        class="offset-xxl-1 offset-xl-1 offset-lg-1 offset-md-1 col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-12">
                        <form id="examForm"
                            action="{{ route('examination.series.submit', ['sub' => $sub, 'series' => $series]) }}"
                            method="POST">
                            @csrf {{-- Include CSRF token for security --}}

                            @foreach ($response['data'] as $index => $question)
                                <div class="question-container" data-question="{{ $index }}"
                                    style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                    <div class="text-right">
                                        <p>Question No. {{ $index + 1 }}</p>
                                    </div>

                                    <div class="row">
                                        @if ($question['image'])
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-12">
                                                <h5>{{ $question['question_text'] }}</h5>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                                                <img src="{{ $question['image'] }}" class="img-fluid rounded shadow"
                                                    alt="Question Image">
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <h5>{{ $question['question_text'] }}</h5>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-4">
                                        @foreach (['a', 'b', 'c', 'd'] as $option)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input"
                                                    name="answers[{{ $question['id'] }}]" value="option_{{ $option }}"
                                                    required>
                                                <label class="form-check-label">{{ $question['option_' . $option] }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-5 d-flex justify-content-between">
                                        @if ($index > 0)
                                            <button type="button" class="btn btn-danger prev-btn"
                                                data-index="{{ $index }}">Prev</button>
                                        @endif

                                        @if ($index < count($response['data']) - 1)
                                            <button type="button" class="btn btn-primary next-btn"
                                                data-index="{{ $index }}">Next</button>
                                        @endif

                                        @if ($index === count($response['data']) - 1)
                                            <button type="submit" class="btn btn-success">Submit Exam</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>
                </div>

                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        let currentIndex = 0;
                        const questions = document.querySelectorAll(".question-container");

                        function showQuestion(index) {
                            questions.forEach((q, i) => {
                                q.style.display = i === index ? "block" : "none";
                            });
                        }

                        document.querySelectorAll(".next-btn").forEach(button => {
                            button.addEventListener("click", function() {
                                currentIndex = parseInt(this.dataset.index) + 1;
                                showQuestion(currentIndex);
                            });
                        });

                        document.querySelectorAll(".prev-btn").forEach(button => {
                            button.addEventListener("click", function() {
                                currentIndex = parseInt(this.dataset.index) - 1;
                                showQuestion(currentIndex);
                            });
                        });

                        showQuestion(currentIndex);
                    });
                </script>



                {{-- <div class="row">
                    <div
                        class="offset-xxl-1 offset-xl-1 offset-lg-1 offset-md-1 col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-12">
                        <form id="examForm">
                            @foreach ($response['data'] as $index => $question)
                                <div class="question-container" data-question="{{ $index }}"
                                    style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                    <div class="text-right">
                                        <p>Question No. {{ $index + 1 }}</p>
                                    </div>

                                    <div class="row">
                                        @if ($question['image'])
                                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-12">
                                                <h5>{{ $question['question_text'] }}</h5>
                                            </div>
                                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-12 text-center">
                                                <img src="{{ $question['image'] }}" class="img-fluid rounded shadow"
                                                    alt="Question Image">
                                            </div>
                                        @else
                                            <div class="col-12">
                                                <h5>{{ $question['question_text'] }}</h5>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="mt-4">
                                        @foreach (['a', 'b', 'c', 'd'] as $option)
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input"
                                                    name="answers[{{ $question['id'] }}]" value="option_{{ $option }}"
                                                    required>
                                                <label class="form-check-label">{{ $question['option_' . $option] }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-5 d-flex justify-content-between">
                                        @if ($index > 0)
                                            <button type="button" class="btn btn-danger prev-btn"
                                                data-index="{{ $index }}">Prev</button>
                                        @endif

                                        @if ($index < count($response['data']) - 1)
                                            <button type="button" class="btn btn-primary next-btn"
                                                data-index="{{ $index }}">Next</button>
                                        @endif

                                        @if ($index === count($response['data']) - 1)
                                            <button type="submit" class="btn btn-success">Submit Exam</button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </form>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            let currentIndex = 0;
                            const questions = document.querySelectorAll(".question-container");

                            function showQuestion(index) {
                                questions.forEach((q, i) => {
                                    q.style.display = i === index ? "block" : "none";
                                });
                            }

                            document.querySelectorAll(".next-btn").forEach(button => {
                                button.addEventListener("click", function() {
                                    currentIndex = parseInt(this.dataset.index) + 1;
                                    showQuestion(currentIndex);
                                });
                            });

                            document.querySelectorAll(".prev-btn").forEach(button => {
                                button.addEventListener("click", function() {
                                    currentIndex = parseInt(this.dataset.index) - 1;
                                    showQuestion(currentIndex);
                                });
                            });

                            showQuestion(currentIndex);
                        });
                    </script>

                </div> --}}
            </div>


        </div>
    </div>
@endsection
