@extends('layouts.auth')
@section('title', 'Verify Code')
@section('content')
    <div class="container min-vh-100 d-flex flex-column justify-content-center">
        @include('customs.auth_back_button')
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">

                {{-- SVG Icon --}}
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-shield-fill-check"
                        viewBox="0 0 16 16" style="width: 80px; height: auto;">
                        <path fill-rule="evenodd"
                            d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.8 11.8 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7 7 0 0 0 1.048-.625 11.8 11.8 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.54 1.54 0 0 0-1.044-1.263 63 63 0 0 0-2.887-.87C9.843.266 8.69 0 8 0m2.146 5.146a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793z" />
                    </svg>
                </div>

                {{-- Heading and subtitle --}}
                <h1 class="banner-title mb-3" style="font-size: 2em">
                    Verify Code
                </h1>
                <p class="mb-4">Enter the code sent to your email to verify</p>

                {{-- Form --}}
                <form id="otpForm" method="POST" action="{{ route('password.verify') }}">
                    @csrf

                    <div class="d-flex justify-content-center gap-2 mb-4">
                        @for ($i = 0; $i < 7; $i++)
                            <input type="text" name="otp[]" maxlength="1" class="form-control text-center otp-input"
                                style="width: 40px; height: 50px; font-size: 1.5rem;" required>
                        @endfor
                    </div>

                    <input type="hidden" name="email" value="{{ $email }}">
                    {{-- Countdown Timer and Resend --}}
                    <div class="d-flex justify-content-between mb-3 px-2">
                        <span id="countdown" class="text-muted">02:00</span>
                        <a href="{{ route('password.resend') }}" class="text-primary"
                            onclick="localStorage.removeItem('otp_expiry_time')">
                            Resend Code
                        </a>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection

@section('plugin-scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('.otp-input');
            const form = document.getElementById('otpForm');
            const countdown = document.getElementById('countdown');

            // Focus and auto-submit logic
            inputs.forEach((input, index) => {
                input.addEventListener('input', function() {
                    if (input.value.length === 1) {
                        if (index < inputs.length - 1) {
                            inputs[index + 1].focus();
                        } else {
                            form.submit();
                        }
                    }
                });

                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Backspace' && input.value === '' && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });


            const EXPIRY_KEY = 'otp_expiry_time';
            const DURATION = 2 * 60 * 1000; // 2 minutes in ms

            let now = Date.now();
            let expiryTime = parseInt(localStorage.getItem(EXPIRY_KEY));

            // If no value or expired, reset timer
            if (!expiryTime || expiryTime < now) {
                expiryTime = now + DURATION;
                localStorage.setItem(EXPIRY_KEY, expiryTime);
            }

            const timer = setInterval(() => {
                now = Date.now();
                const remaining = expiryTime - now;

                if (remaining > 0) {
                    const minutes = Math.floor((remaining / 1000) / 60);
                    const seconds = Math.floor((remaining / 1000) % 60);
                    countdown.textContent =
                        `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
                } else {
                    clearInterval(timer);
                    countdown.textContent = 'OTP Expired';
                    countdown.classList.remove('text-muted');
                    countdown.classList.add('text-danger');
                }
            }, 1000);

        });
    </script>
@endsection
