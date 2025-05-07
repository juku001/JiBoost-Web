<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tester</title>

    <!-- Include MathJax -->
    <script type="text/javascript" async src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script type="text/javascript" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</head>

<body>

    <div style="text-align: center; margin: 20px">
        <h2>Mathematical & Chemical Equations</h2>
        
        @foreach ($questions as $category => $equation)
            <p><strong>{{ ucfirst($category) }}:</strong></p>
            <p>{!! $equation !!}</p>
        @endforeach
    </div>

</body>

</html>






{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tester</title>

    <!-- MathJax CDN -->
    <script type="text/javascript" async
        src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/3.2.0/es5/tex-mml-chtml.js">
    </script>
</head>
<body>
    
    <div style="text-align: center; margin: 20px;">
        <p class="mathjax"> {{ $question }} </p>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            MathJax.typeset(); // Ensures MathJax processes LaTeX content
        });
    </script>

</body>
</html> --}}
