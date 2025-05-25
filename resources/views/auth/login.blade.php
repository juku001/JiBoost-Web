@extends('layouts.auth')

@section('content')
    <!-- Initial Section -->
    <section id="initial-section">
        <div class="container">
            <div
                class="row d-flex align-items-center justify-content-center min-vh-100 flex-column flex-md-row text-center text-md-start">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex flex-column align-items-center">
                    <div class="banner-txt text-center">
                        <h3 class="banner-subtitle mb-3">Sign In</h3>
                        <h1 class="banner-title mb-3 cd-headline push">
                            <span>Welcome Back</span>
                        </h1>
                        <p class="banner-paragraph mb-3">
                            The exams are waiting, signin and test yourself.
                        </p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 d-flex flex-column align-items-center">
                    <form action="{{ route('login') }}" method="POST" class="w-100" id="loginForm">
                        @csrf
                        <div class="text-center mb-3">
                            <h5 class="fw-bold">Fill the following form to login</h5>
                        </div>
                        <div class="login-item mb-3">
                            {{-- <input class="form-control" type="email" name="username" required placeholder="Enter your email"> --}}
                            <input class="form-control @error('username') is-invalid @enderror" type="email"
                                name="username" value="{{ old('username') }}" required placeholder="Enter your email">

                            @error('username')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="login-item mb-3 position-relative">
                            <input id="password" class="form-control" type="password" name="password" required
                                placeholder="Enter your password">
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                                👁️
                            </span>
                        </div>

                        <div class="text-center">
                            <button id="signInBtn" class="btn btn-jb-primary">
                                <span id="buttonText">Sign In</span>
                                <span id="buttonSpinner" class="spinner-border spinner-border-sm text-light d-none"></span>
                            </button>

                        </div>
                        <div class="text-center">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-2">
                                <p class="mb-0">Not Registered Yet? <a class="text-primary fw-semibold"
                                        href="{{ route('auth.register') }}">Click here</a>
                                </p>
                                <p class="my-1"><a href="{{ route('password.forgot') }}">Forgot Password</a></p>
                            </div>
                            <p class="mt-2"><a class="text-primary fw-semibold" href="{{ url('/?reset_welcome=1') }}">Back
                                    to Welcome Page</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('plugin-scripts')
    <script>
        // const EXPIRY_KEY = 'otp_expiry_time';
        // let expiryTime = localStorage.deleteItem(EXPIRY_KEY);


        function togglePasswordVisibility() {
            const input = document.getElementById("password");
            const icon = document.querySelector(".toggle-password");
            const isPassword = input.type === "password";

            input.type = isPassword ? "text" : "password";
            icon.textContent = isPassword ? "🙈" : "👁️"; // Toggle icon
        }



        // document.getElementById('signInBtn').addEventListener('click', function() {
        //     document.getElementById('buttonText').classList.add('d-none');
        //     document.getElementById('buttonSpinner').classList.remove('d-none');
        // });
        const form = document.getElementById('loginForm');
        const signInBtn = document.getElementById('signInBtn');
        const buttonText = document.getElementById('buttonText');
        const buttonSpinner = document.getElementById('buttonSpinner');

        form.addEventListener('submit', function(e) {
            // Optional: Perform front-end validation here (if needed)

            // If form is valid, show spinner
            if (form.checkValidity()) {
                buttonText.classList.add('d-none');
                buttonSpinner.classList.remove('d-none');
                signInBtn.disabled = true; // Optional: prevent multiple clicks
            }
            // Let the form submit normally
        });
    </script>
@endsection
