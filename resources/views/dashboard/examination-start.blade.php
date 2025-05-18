@extends('layouts.main')
@section('title', 'Examination')

@section('content')
    <div class="content">
        <div class="container mb-2">
            <div class="d-flex justify-content-center gap-2" id="examTimerContainer">
                <div class="text-center">
                    <div class="display-5 fw-bold" id="hours">00</div>
                    <div class="responsive-text">Hours</div>
                </div>
                <div class="text-center">
                    <div class="display-5 fw-bold" id="minutes">00</div>
                    <div class="responsive-text">Minutes</div>
                </div>
                <div class="text-center">
                    <div class="display-5 fw-bold" id="seconds">00</div>
                    <div class="responsive-text">Seconds</div>
                </div>
            </div>
        </div>


        <div class="d-flex flex-column">
            <div class="flex-grow-1 overflow-auto mt-5 px-3">

                <div class="container">
                    <div class="row">
                        <div
                            class="offset-xxl-1 offset-xl-1 offset-lg-1 offset-md-1 col-xxl-10 col-xl-10 col-lg-10 col-md-10 col-12">
                            <form id="examForm"
                                action="{{ route('examination.series.submit', ['sub' => $sub, 'series' => $series]) }}"
                                method="POST">
                                @csrf

                                <input type="hidden" name="series_id" value="{{ $series }}">
                                <input type="hidden" name="start_time" id="start_time">
                                <input type="hidden" name="end_time" id="end_time">
                                <input type="hidden" name="end_type" id="end_type">
                                <input type="hidden" name="questions_data" id="questions_data">

                                @foreach ($response['data'] as $index => $question)
                                    <div class="question-container" data-question="{{ $index }}"
                                        style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                        <div class="text-right">
                                            <p>Question No. {{ $index + 1 }}</p>
                                        </div>

                                        <div class="row">
                                            @if ($question['image'])
                                                <div class="col-md-8 col-12">
                                                    <h5>{{ $question['question_text'] }}</h5>
                                                </div>
                                                <div class="col-md-4 col-12 text-center">
                                                    <img src="{{ $question['image'] }}" class="img-fluid rounded shadow"
                                                        alt="Question Image">
                                                </div>
                                            @else
                                                <div class="col-12">
                                                    <h5>{{ $question['question_text'] }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-end mb-3">
                                            <button type="button" class="btn btn-phoenix-primary clear-answer-btn d-none"
                                                data-question-id="{{ $question['id'] }}">
                                                Clear Answer
                                            </button>
                                        </div>


                                        <div class="mt-4">
                                            @php
                                                $options = [
                                                    ['key' => 'option_a', 'label' => $question['option_a']],
                                                    ['key' => 'option_b', 'label' => $question['option_b']],
                                                    ['key' => 'option_c', 'label' => $question['option_c']],
                                                    ['key' => 'option_d', 'label' => $question['option_d']],
                                                ];
                                                shuffle($options);
                                            @endphp

                                            @foreach ($options as $opt)
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input"
                                                        name="answers[{{ $question['id'] }}]" value="{{ $opt['key'] }}">
                                                    <label class="form-check-label">{{ $opt['label'] }}</label>
                                                </div>
                                            @endforeach


                                        </div>

                                        <div class="mt-5 d-flex justify-content-between">
                                            <button type="button" class="btn btn-outline-danger rounded-pill prev-btn"
                                                data-index="{{ $index }}">Prev</button>

                                            <button type="button" class="btn btn-outline-primary rounded-pill next-btn"
                                                data-index="{{ $index }}">Next</button>
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

                            const startTime = new Date().toISOString();
                            document.getElementById('start_time').value = startTime;

                            function showQuestion(index) {
                                questions.forEach((q, i) => {
                                    q.style.display = i === index ? "block" : "none";
                                });

                                document.querySelectorAll(".prev-btn").forEach(btn => {
                                    btn.disabled = (index === 0);
                                });

                                document.querySelectorAll(".next-btn").forEach(btn => {
                                    btn.disabled = (index === questions.length - 1);
                                });
                            }

                            document.querySelectorAll(".next-btn").forEach(button => {
                                button.addEventListener("click", function() {
                                    const index = parseInt(this.dataset.index);
                                    if (index < questions.length - 1) {
                                        currentIndex = index + 1;
                                        showQuestion(currentIndex);
                                    }
                                });
                            });

                            document.querySelectorAll(".prev-btn").forEach(button => {
                                button.addEventListener("click", function() {
                                    const index = parseInt(this.dataset.index);
                                    if (index > 0) {
                                        currentIndex = index - 1;
                                        showQuestion(currentIndex);
                                    }
                                });
                            });

                            showQuestion(currentIndex);



                            document.getElementById('cancelExamBtn').addEventListener('click', function() {
                                const endTime = new Date().toISOString();
                                document.getElementById('end_time').value = endTime;
                                document.getElementById('end_type').value = 'cancelled';

                                const answers = {};
                                const inputs = document.querySelectorAll('input[type="radio"]:checked');
                                inputs.forEach(input => {
                                    const name = input.getAttribute('name');
                                    const match = name.match(/answers\[(\d+)\]/);
                                    if (match) {
                                        const questionId = match[1];
                                        answers[questionId] = input.value;
                                    }
                                });

                                document.getElementById('questions_data').value = JSON.stringify(answers);
                            });



                            document.getElementById('submitExamBtn').addEventListener('click', function() {
                                const endTime = new Date().toISOString();
                                document.getElementById('end_time').value = endTime;
                                document.getElementById('end_type').value = 'submitted';

                                const answers = {};
                                const inputs = document.querySelectorAll('input[type="radio"]:checked');
                                inputs.forEach(input => {
                                    const name = input.getAttribute('name');
                                    const match = name.match(/answers\[(\d+)\]/);
                                    if (match) {
                                        const questionId = match[1];
                                        answers[questionId] = input.value;
                                    }
                                });

                                document.getElementById('questions_data').value = JSON.stringify(answers);
                            });
                        });





                        document.addEventListener("DOMContentLoaded", function() {
                            const questions = document.querySelectorAll(".question-container");

                            // Show/hide the Clear Answer button
                            document.querySelectorAll("input[type=radio]").forEach(radio => {
                                radio.addEventListener("change", function() {
                                    const questionId = this.name.match(/\d+/)[0];
                                    const clearBtn = document.querySelector(
                                        `.clear-answer-btn[data-question-id="${questionId}"]`);
                                    if (clearBtn) {
                                        clearBtn.classList.remove("d-none");
                                    }
                                });
                            });

                            // Clear the selected answer and hide the Clear Answer button
                            document.querySelectorAll(".clear-answer-btn").forEach(button => {
                                button.addEventListener("click", function() {
                                    const questionId = this.dataset.questionId;
                                    const radios = document.querySelectorAll(
                                        `input[name="answers[${questionId}]"]`);
                                    radios.forEach(radio => radio.checked = false);
                                    this.classList.add("d-none");
                                });
                            });
                        });



                        document.addEventListener("DOMContentLoaded", function() {
                            const durationInMinutes = {{ $response['duration'] ?? 0 }};
                            const endTime = new Date().getTime() + durationInMinutes * 60 * 1000;

                            const hoursEl = document.getElementById("hours");
                            const minutesEl = document.getElementById("minutes");
                            const secondsEl = document.getElementById("seconds");

                            if (durationInMinutes > 0) {
                                const countdown = setInterval(() => {
                                    const now = new Date().getTime();
                                    const distance = endTime - now;

                                    if (distance <= 0) {
                                        clearInterval(countdown);
                                        hoursEl.innerText = minutesEl.innerText = secondsEl.innerText = "00";
                                        return;
                                    }

                                    const hours = Math.floor((distance / (1000 * 60 * 60)));
                                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    hoursEl.innerText = String(hours).padStart(2, '0');
                                    minutesEl.innerText = String(minutes).padStart(2, '0');
                                    secondsEl.innerText = String(seconds).padStart(2, '0');
                                }, 1000);
                            } else {
                                hoursEl.innerText = minutesEl.innerText = secondsEl.innerText = "--";
                            }
                        });
                    </script>

                </div>



            </div>

            {{-- Floating buttons fixed at bottom --}}
            <div style="position: fixed; bottom: 20px; left: 0; right: 0; padding: 0 15px; z-index: 1050;">
                <div class="d-flex justify-content-between mx-auto" style="max-width: 400px;">
                    <button type="submit" form="examForm" class="btn btn-exam cancel" id="cancelExamBtn">Cancel Exam</a>
                    <button type="submit" form="examForm" class="btn btn-exam submit" id="submitExamBtn">Submit
                        Exam</button>
                </div>
            </div>
        </div>
    </div>
@endsection
