@extends('layouts.auth')

@section('content')
    <div class="container min-vh-100 d-flex flex-column justify-content-center">

        {{-- Back Button --}}
        @include('customs.auth_back_button')
        <div class="row w-100 justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 text-center">
                {{-- SVG Icon --}}
                <div class="mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16"
                        style="width: 80px; height: auto;">
                        <path fill-rule="evenodd"
                            d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                    </svg>
                </div>



                {{-- Heading and subtitle --}}
                <h1 class="banner-title mb-3" style="font-size: 2em">New Credentials</h1>
                <p class="mb-4">Fill your email to proceed with account password reset</p>

                {{-- Form --}}
                <form method="POST" action="{{ route('password.new') }}">
                    @csrf
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="login-item mb-3">
                        <input class="form-control @error('password') is-invalid @enderror" type="password" name="password"
                            value="{{ old('password') }}" required placeholder="New Password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="login-item mb-3">
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="password"
                            name="password_confirmation" value="{{ old('password_confirmation') }}" required
                            placeholder="Confirm Password">
                        @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-jb-primary mt-3">Update</button>
                </form>

            </div>
        </div>
    </div>
@endsection
