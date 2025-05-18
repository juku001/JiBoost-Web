<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | {{ env('APP_NAME') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/welcome/css/registration.css') }}">
</head>

<body>
    <div class="container">
        <div class="text-center mt-4">
            <h2 class="custom-heading">Student Registration</h2>
            <p class="custom-subtitle fw-bold">Fill the following form to register</p>
        </div>

        <div class="step-indicator">
            <div class="step-circle step-1 {{ $step === 0 ? 'active' : ''}}">1</div>
            <div class="step-circle step-2 {{ $step === 1 ? 'active' : ''}}">2</div>
            <div class="step-circle step-3 {{ $step === 2 ? 'active' : ''}}">3</div>
        </div>

        <div class="row mt-3">
            <div class="offset-1 offset-md-3 col-10 col-md-6">

                <form action="{{ route('signup') }}" method="POST">
                    @csrf
                    @switch($step)
                        @case(0)
                            <div>
                                <div class="form-group my-3">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" name="fullname" required>
                                    <p class="small text-danger d-none">Your name is important to us</p>
                                </div>
                                <div class="form-group my-3">
                                    <label>Sex</label><br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="male"
                                            value="male" required>
                                        <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sex" id="female"
                                            value="female" required>
                                        <label class="form-check-label" for="female">Female</label>
                                    </div>
                                    <p class="small text-danger d-none">Please select your gender</p>
                                </div>

                                <div class="form-group my-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                    <p class="small text-danger d-none">Your email is important to us</p>
                                </div>
                                <div class="form-group my-3">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" required>
                                    <p class="small text-danger d-none">Please provider your phone number</p>
                                </div>

                                <div class="form-group my-3">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" required>
                                    <p class="small text-danger d-none">Enter your password</p>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary next-step position-relative"
                                        id="step1NextBtn">
                                        <span class="spinner-border spinner-border-sm me-2 d-none" role="status"
                                            aria-hidden="true" id="step1Spinner"></span>
                                        Next
                                    </button>

                                    <a href="{{ route('auth.register') }}" class="btn btn-danger">Back</a>
                                </div>
                            </div>
                        @break

                        @case(1)
                            <div>
                                <div class="form-group my-3">
                                    <label>Date of Birth</label>
                                    <input type="date" class="form-control" name="dob">
                                </div>
                                <div class="form-group my-3">
                                    <label>Country</label>
                                    <input type="text" class="form-control" name="country">
                                </div>
                                <div class="form-group my-3">
                                    <label>Region</label>
                                    <input type="text" class="form-control" name="region">
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-secondary prev-step">Back</button>
                                    <button type="button" class="btn btn-primary next-step">Next</button>
                                </div>
                            </div>
                        @break

                        <div>
                            <div class="form-group my-3">
                                <label>School Name</label>
                                <input type="text" class="form-control" name="school_name">
                            </div>
                            <div class="form-group my-3">
                                <label>Education Level</label>
                                <input type="text" class="form-control" name="education_level">
                            </div>
                            <div class="form-group my-3">
                                <label>School Location</label>
                                <input type="text" class="form-control" name="school_location">
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn btn-secondary prev-step">Back</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                        @default
                    @endswitch
                </form>
            </div>
        </div>
    </div>
</body>

</html>
