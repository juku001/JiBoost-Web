@extends('layouts.main')
@section('title', 'Exams')
@section('sidebar')
    <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1"
                                href="{{ route('admin.exams.series.show', ['levelSub' => $levelSub]) }}">
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
        <div class="mb-9">
            <div class="d-flex justify-content-between">
                <div>
                    <h2 class="mb-4">Question List<span
                            class="text-body-tertiary fw-normal">({{ count($questions) }})</span>
                    </h2>
                    <a class="fw-bold fs-9 mt-2"
                        href="{{ route('admin.exams.questions.add', ['levelSub' => $levelSub, 'seriesId' => $seriesId]) }}"><span
                            class="fas fa-plus me-1"></span>Add Question</a>
                </div>
                <div>
                    <a href="{{ route('admin.exams.questions.delete', ['levelSub' => $levelSub, 'seriesId' => $seriesId]) }}"
                        class="fw-bold fs-9 mt-2 text-danger"><span class="fas fa-trash me-1"></span> Delete Series</a>
                </div>
            </div>
            <div class="mb-4 todo-list">
                @foreach ($questions as $index => $question)
                    <div class="row justify-content-between align-items-md-center hover-actions-trigger btn-reveal-trigger border-translucent py-3 gx-0 cursor-pointer border-top"
                        data-todo-offcanvas-toogle="data-todo-offcanvas-toogle"
                        data-todo-offcanvas-target="todoOffcanvas-{{ $index + 1 }}">
                        <div class="col-12 col-md-auto flex-1">
                            <div>
                                <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1">
                                    <span>{{ $index + 1 }}. </span>
                                    {{-- <label
                                        class="form-check-label mb-0 fs-8 me-2 line-clamp-1 flex-grow-1 flex-md-grow-0 cursor-pointer">
                                        {{ $question['question_text'] }}</label> --}}

                                    <label
                                        class="form-check-label mb-0 fs-8 me-2 line-clamp-1 flex-grow-1 flex-md-grow-0 cursor-pointer">
                                        {{ \App\Helpers\LaTexHelper::extractLatex($question['question_text']) }}</label>

                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex ms-4 lh-1 align-items-center"><button
                                    class="btn btn-link p-0 text-body-tertiary fs-10 me-2"><span
                                        class="fas fa-paperclip me-1"></span>2</button>
                                <p class="text-body-tertiary fs-10 mb-md-0 me-2 me-md-3 mb-0">12 Nov, 2021</p>
                                <div class="d-none d-md-block end-0 position-absolute" style="top: 23%;">

                                </div>
                                <div class="">
                                    <p class="text-body-tertiary fs-10 ps-md-3 border-start-md fw-bold mb-md-0 mb-0">12:00
                                        PM
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="offcanvas offcanvas-end content-offcanvas offcanvas-backdrop-transparent border-start shadow-none bg-body-highlight"
                        tabindex="-1" data-todo-content-offcanvas="data-todo-content-offcanvas"
                        id="todoOffcanvas-{{ $index + 1 }}">
                        <div class="offcanvas-body p-0">
                            <div class="p-5 p-md-6">
                                <div class="d-flex flex-between-center align-items-start gap-5 mb-4">
                                    <h2 class="fw-bold fs-6 mb-0 text-body-highlight">Question {{ $index + 1 }}</h2>
                                    <button class="btn btn-phoenix-secondary btn-icon px-2" type="button"
                                        data-bs-dismiss="offcanvas" aria-label="Close"><span
                                            class="fa-solid fa-xmark"></span></button>
                                </div>
                                <div class="mb-6">

                                    <p class="text-body-highlight mb-0 mathjax">{{ $question['question_text'] }}</p>
                                </div>
                                <h4 class="mb-3">Answers</h4>
                                <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                        <label for="">A. </label>
                                        <label class="form-check-label mb-0 fs-8" for="subtask01">
                                            {{ $question['option_a'] }}</label>
                                    </div>
                                    @if ($question['correct_option'] == 'option_a')
                                        <div class="">
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-success"><span
                                                    class="badge-label">Correct</span><span class="ms-1"
                                                    data-feather="check" style="height:12.8px;width:12.8px;"></span></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                        <label for="">B. </label>
                                        <label class="form-check-label mb-0 fs-8" for="subtask02">
                                            {{ $question['option_b'] }}</label>
                                    </div>
                                    @if ($question['correct_option'] == 'option_b')
                                        <div class="">
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-success"><span
                                                    class="badge-label">Correct</span><span class="ms-1"
                                                    data-feather="check" style="height:12.8px;width:12.8px;"></span></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                        <label for="">C. </label>
                                        <label class="form-check-label mb-0 fs-8" for="subtask03">
                                            {{ $question['option_c'] }}</label>
                                    </div>
                                    @if ($question['correct_option'] == 'option_c')
                                        <div class="">
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-success"><span
                                                    class="badge-label">Correct</span><span class="ms-1"
                                                    data-feather="check" style="height:12.8px;width:12.8px;"></span></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                        <label for="">D. </label>
                                        <label class="form-check-label mb-0 fs-8" for="subtask04">
                                            {{ $question['option_d'] }}</label>
                                    </div>
                                    @if ($question['correct_option'] == 'option_d')
                                        <div class="">
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-success"><span
                                                    class="badge-label">Correct</span><span class="ms-1"
                                                    data-feather="check"
                                                    style="height:12.8px;width:12.8px;"></span></span>
                                        </div>
                                    @endif
                                </div>
                                <div class="d-flex flex-between-center hover-actions-trigger py-3 border-top">
                                    <div class="form-check mb-1 mb-md-0 d-flex align-items-center lh-1 min-h-auto">
                                        <label for="">E. </label>
                                        <label class="form-check-label mb-0 fs-8" for="subtask04">
                                            {{ $question['option_e'] }}</label>
                                    </div>
                                    @if ($question['correct_option'] == 'option_e')
                                        <div class="">
                                            <span class="badge badge-phoenix fs-10 badge-phoenix-success"><span
                                                    class="badge-label">Correct</span><span class="ms-1"
                                                    data-feather="check"
                                                    style="height:12.8px;width:12.8px;"></span></span>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <a href="{{ route('admin.delete.question', ['id' => $question['id']]) }}"
                                        class="btn btn-phoenix-danger">Delete Question</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('plugin-scripts')
        <script>
            MathJax = {
                tex: {
                    inlineMath: [
                        ['\\(', '\\)']
                    ]
                }
            };
        </script>
        <script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    @endpush
@endsection
