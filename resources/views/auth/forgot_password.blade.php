@extends('layouts.auth')
@section('title', 'Forgot Password')
@section('content')
    <div class="container min-vh-100 d-flex flex-column justify-content-center">

        {{-- Back Button --}}
        @include('customs.auth_back_button')
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">
                {{-- SVG Icon --}}
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="bi bi-envelope-fill"
                        style="width: 80px; height: auto;">
                        <path
                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                    </svg>
                </div>

                {{-- Heading and subtitle --}}
                <h1 class="banner-title mb-3" style="font-size: 2em">Reset Password</h1>
                <p class="mb-4">Fill your email to proceed with account password reset</p>

                {{-- Form --}}
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="login-item mb-3">
                        <input class="form-control @error('username') is-invalid @enderror" type="email" name="username"
                            value="{{ old('username') }}" required placeholder="Enter your email">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-jb-primary mt-3">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
