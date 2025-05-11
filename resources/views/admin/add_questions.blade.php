@extends('layouts.main')
@section('title', 'Exams')
@push('plugin-styles')
    {{-- <link rel="stylesheet" type="text/css" href="https://digabi.github.io/mathquill/test/support/home.css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mathquill.css') }}">
@endpush
@section('sidebar')
    <nav class="navbar navbar-vertical navbar-expand-lg" style="display:none;">
        <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content">
                <ul class="navbar-nav flex-column" id="navbarVerticalNav">
                    <li class="nav-item">
                        <div class="nav-item-wrapper">
                            <a class="nav-link label-1"
                                href="{{ route('admin.exams.questions.show', ['levelSub' => $levelSub, 'seriesId' => $seriesId]) }}">
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
        <div class="mb-3">
            <h2 class="mb-4">Add Question</h2>
        </div>
        <form action="{{ route('admin.exams.questions.store', ['levelSub' => $levelSub, 'seriesId' => $seriesId]) }}"
            method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="form-group">
                        <label for="question">Write your Question</label>
                        <textarea required name="question_text" id="question_text" class="form-control" rows="5"
                            placeholder="Enter your question here..."></textarea>
                    </div>
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mb-2">
                    <label for="latex">Enter LaTex</label>
                    <input id="latex-source" type="text" class="form-control" placeholder="Enter your LaTeX formula">
                </div>

                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mb-2 d-flex align-items-center justify-content-center"
                    style="height: 100px;">
                    <span id="editable-math" class="mathquill-math-field">\frac{d}{dx}\sqrt{x}=</span>
                </div>


                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mb-2">
                    <label for="latex-target">Insert LaTeX into</label>
                    <select id="latex-target" class="form-control">
                        <option value="question_text">Question</option>
                        <option value="option_a">First Answer</option>
                        <option value="option_b">Second Answer</option>
                        <option value="option_c">Third Answer</option>
                        <option value="option_d">Fourth Answer</option>
                    </select>
                </div>

                <div
                    class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-12 mb-2 d-flex align-items-center justify-content-center">
                    <button class="btn btn-phoenix-success" id="add-to-text">Add to Text</button>
                </div>

                <!-- JavaScript -->
                <script>
                    document.getElementById('add-to-text').addEventListener('click', function(e) {
                        e.preventDefault(); // Prevent form submission
                        let latexInput = document.getElementById('latex-source').value.trim();
                        let targetField = document.getElementById('latex-target').value;

                        if (latexInput !== '') {
                            let field = document.getElementsByName(targetField)[0];
                            if (field) {
                                field.value += ' $$' + latexInput + '$$ ';
                            }
                        }
                    });
                </script>

                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="option_a">First Answer</label>
                        <input type="text" class="form-control" name="option_a" required>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="option_b">Second Answer</label>
                        <input type="text" class="form-control" name="option_b" required>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="option_c">Third Answer</label>
                        <input type="text" class="form-control" name="option_c" required>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="option_d">Fourth Answer</label>
                        <input type="text" class="form-control" name="option_d" required>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="correct_option">Correct Option</label>
                        <select name="correct_option" id="correct" class="form-control" required>
                            <option value="">Select Correct Option</option>
                            <option value="option_a">First Answer</option>
                            <option value="option_b">Second Answer</option>
                            <option value="option_c">Third Answer</option>
                            <option value="option_d">Fourth Answer</option>
                        </select>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="option_a">Illustrative Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>
                </div>
                @if ($markingSystem == 'wms')
                <div class="col-xxl-6 col-xl-6 col-md-6 col-12 mb-2">
                    <div class="form-group">
                        <label for="mark">How much for this question?(marks)</label>
                        <input type="text" class="form-control" name="mark" required placeholder="Eg 2">
                    </div>
                </div>
                @endif
                <div class="col-12 text-left">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>

    @push('plugin-scripts')
        <script type="text/javascript" src="https://digabi.github.io/mathquill/test/support/jquery-1.5.2.js"></script>
        <script type="text/javascript" src="https://digabi.github.io/mathquill/build/mathquill.js"></script>
        <script type="text/javascript">
            MQ = MathQuill.getInterface(MathQuill.getInterface.MAX);

            //on document ready, mathquill-ify all `<tag class="mathquill-*">latex</tag>`
            //elements according to their CSS class.
            $(function() {
                $('.mathquill-static-math').each(function() {
                    MQ.StaticMath(this);
                });
                $('.static-math-no-mouse-events').each(function() {
                    MQ.StaticMath(this, {
                        mouseEvents: false
                    });
                });
                $('.mathquill-math-field').each(function() {
                    MQ.MathField(this);
                });
                $('.mathquill-text-field').each(function() {
                    MQ.TextField(this);
                });
            });

            $('#show-html-source').toggle(function() {
                $(this).html('Hide Semantically Meaningful HTML Source').parent().next().show();
            }, function() {
                $(this).html('Show Semantically Meaningful HTML Source').parent().next().hide();
            });

            var latexMath = $('#editable-math'),
                latexSource = $('#latex-source'),
                htmlSource = $('#html-source'),
                codecogsimg = $('#codecogsimg'),
                codecogslink = $('#codecogslink'),
                htmlTransplantExample = $('#html-transplant-example');

            $('#codecogs').click(function() {
                var latex = latexSource.val();
                codecogslink.attr('href', 'http://latex.codecogs.com/gif.latex?' + latex);
                codecogsimg.attr('src', 'http://latex.codecogs.com/gif.latex?' + latex);
            });

            $(function() {
                var latexMath = MQ($('#editable-math')[0]);
                latexMath.config({
                    handlers: {
                        edit: function() {
                            var latex = latexMath.latex();
                            latexSource.val(latex);
                            //        location.hash = '#'+latex; //extremely performance-crippling in Chrome for some reason
                            htmlSource.text(printTree(latexMath.html()));
                            htmlTransplantExample.html(latexMath.html());
                        }
                    }
                });
                latexMath.focus();

                latexSource.val(latexMath.latex());
                latexSource.bind('keydown keypress', function() {
                    var oldtext = latexSource.val();
                    setTimeout(function() {
                        var newtext = latexSource.val();
                        if (newtext !== oldtext) {
                            latexMath.latex(newtext);
                            htmlSource.text(printTree(latexMath.html()));
                            htmlTransplantExample.html(latexMath.html());
                        }
                    });
                });

                htmlSource.text(printTree(latexMath.html()));
                htmlTransplantExample.html(latexMath.html());

                if (location.hash && location.hash.length > 1)
                    latexMath.latex(decodeURIComponent(location.hash.slice(1))).focus();
            });

            $(".insert-trigger").click(function() {
                var latex = $(this).data('latex');
                $(this).parent().find('.mathquill-math-field').each(function() {
                    var mathquill = MQ(this);
                    mathquill.write(latex);
                });
            });

            //print the HTML source as an indented tree. TODO: syntax highlight
            function printTree(html) {
                html = html.match(/<[a-z]+|<\/[a-z]+>|./ig);
                if (!html) return '';
                var indent = '\n',
                    tree = [];
                for (var i = 0; i < html.length; i += 1) {
                    var token = html[i];
                    if (token.charAt(0) === '<') {
                        if (token.charAt(1) === '/') { //dedent on close tag
                            indent = indent.slice(0, -2);
                            if (html[i + 1] && html[i + 1].slice(0, 2) ===
                                '</') //but maintain indent for close tags that come after other close tags
                                token += indent.slice(0, -2);
                        } else { //indent on open tag
                            tree.push(indent);
                            indent += '  ';
                        }

                        token = token.toLowerCase();
                    }

                    tree.push(token);
                }
                return tree.join('').slice(1);
            }
        </script>
    @endpush
@endsection
