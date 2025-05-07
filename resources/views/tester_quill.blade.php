<!DOCTYPE html>
<html>

<head>

    <meta name="viewport" content="width=624">
    <meta charset="UTF-8">

    <title>MathQuill Demo</title>

    <link rel="stylesheet" type="text/css" href="https://digabi.github.io/mathquill/test/support/home.css">
    <link rel="stylesheet" type="text/css" href="https://digabi.github.io/mathquill/build/mathquill.css">

    <style type="text/css">
        code span {
            font: 90% Verdana, sans-serif;
        }

        #codecogsimg {
            vertical-align: middle;
            border: none;
        }

        .mathquill-text-field {
            width: 100%;
        }

        #html-source {
            display: none;
            font-size: 90%;
            white-space: pre-wrap;
        }

        .mq-math-mode .mq-editable-field {
            min-width: 1cm;
        }
    </style>

</head>

<body>
    <div id="body">


        <p>Math textbox with initial LaTeX:</p>
        <p>
           <span id="editable-math"
                class="mathquill-math-field">\frac{d}{dx}\sqrt{x}=</span></p>


        <form action="{{ route('test.latex') }}" method="POST">
          @csrf
            <p>Latex source:
                <textarea id="latex-source" style="width:80%;vertical-align:top" name="latex-source"></textarea>
            </p>
            <p>
              <button>Save LaTex</button>
            </p>
        </form>
      
    </div>
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
</body>

</html>
