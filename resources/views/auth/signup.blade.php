<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Register') | {{ env('APP_NAME') }}</title>
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/favicons/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/favicons/favicon.ico') }}">
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
            <div class="step-circle step-1 active">1</div>
            <div class="step-circle step-2">2</div>
            <div class="step-circle step-3">3</div>
        </div>

        <div class="row mt-3">
            <div class="offset-1 offset-md-3 col-10 col-md-6">

                <form id="registrationForm" action="{{ route('auth.register.signup') }}" method="POST">
                    @csrf
                    <div id="firstStep">
                        <div class="form-group my-3">
                            <input type="hidden" name="user_type" value="student">
                            <label for="name">Fullname</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter your full name"
                                required>
                            <p id="name-error" class="small text-danger" style="display:none">Your name is important
                                to us</p>
                        </div>
                        <div class="form-group my-3">
                            <label>Sex</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input input-jb-radio" type="radio" name="sex"
                                    id="male" value="male" required checked>
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input input-jb-radio" type="radio" name="sex"
                                    id="female" value="female" required>
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                            <p id="sex-error" class="small text-danger d-none">Please select your gender</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email"
                                placeholder="Enter your email address" required>
                            <p id="email-error" class="small text-danger" style="display:none">Your email is very
                                important
                                to us</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="mobile">Phone</label>
                            <input type="text" class="form-control" name="mobile"
                                placeholder="Enter your mobile number" maxlength="12" required>
                            <p id="mobile-error" class="small text-danger" style="display:none">Your mobile phone is
                                important
                                to us</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="Enter your password"
                                required>
                            <p id="password-error" class="small text-danger" style="display:none">Please enter the
                                password for your account</p>
                        </div>

                        <div class="my-4">
                            <div class="text-center my-1">
                                <button class="btn btn-primary" id="firstStepNext">Next</button>
                            </div>
                            <div class="text-center my-1">
                                <button class="btn btn-danger" id="firstStepCancel">Back</button>
                            </div>
                        </div>
                    </div>
                    <div id="secondStep">
                        <div class="form-group my-3">
                            <label for="dob">Date of Birth</label>
                            <input type="date" class="form-control" name="date_of_birth" required>
                            <p id="date_of_birth-error" class="small text-danger" style="display:none">Please provide
                                the date
                                you
                                were born</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="country">Select Country</label>
                            <select class="form-control" name="country" required>
                                {{-- <option value="" disabled selected>Select Country</option> --}}
                                <option value="Tanzania">Tanzania</option>
                            </select>
                            <p id="country-error" class="small text-danger" style="display:none">Which country are
                                you coming from?</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="region">Select Region</label>
                            <select class="form-control" name="region" required>
                                <option>Arusha</option>
                                <option selected>Dar es Salaam</option>
                                <option>Dodoma</option>
                                <option>Geita</option>
                                <option>Iringa</option>
                                <option>Kagera</option>
                                <option>Katavi</option>
                                <option>Kigoma</option>
                                <option>Kilimanjaro</option>
                                <option>Lindi</option>
                                <option>Manyara</option>
                                <option>Mara</option>
                                <option>Mbeya</option>
                                <option>Morogoro</option>
                                <option>Mtwara</option>
                                <option>Mwanza</option>
                                <option>Njombe</option>
                                <option>Pemba North</option>
                                <option>Pemba South</option>
                                <option>Pwani</option>
                                <option>Rukwa</option>
                                <option>Ruvuma</option>
                                <option>Shinyanga</option>
                                <option>Simiyu</option>
                                <option>Singida</option>
                                <option>Tabora</option>
                                <option>Tanga</option>
                                <option>Zanzibar Central/South</option>
                                <option>Zanzibar North</option>
                                <option>Zanzibar Urban/West</option>
                            </select>
                            <p id="region-error" class="small text-danger" style="display:none">Which region are you
                                coming from?</p>
                        </div>

                        <div class="form-group my-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address"
                                placeholder="Eg Ilala, Kisutu street" required>
                            <p id="address-error" class="small text-danger" style="display:none">Please provide your
                                local address</p>
                        </div>

                        <div class="my-4">
                            <div class="text-center my-1">
                                <button class="btn btn-primary" id="secondStepNext">Next</button>
                            </div>
                            <div class="text-center my-1">
                                <button class="btn btn-danger" id="secondStepCancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <div id="thirdStep">
                        <div class="form-group my-3">
                            <label for="school_name">School Name</label>
                            <input type="text" class="form-control" name="school_name"
                                placeholder="What school do
                                you
                                go to ?"
                                required>
                            <p id="school_name-error" class="small text-danger" style="display:none">What school do
                                you go to ?</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="school_location">School Location</label>
                            <input type="text" class="form-control" name="school_location"
                                placeholder="Where is your school located at ?" required>
                            <p id="school_location-error" class="small text-danger" style="display:none">Where is
                                your school located at ?</p>
                        </div>
                        <div class="form-group my-3">
                            <label for="education_level_id">Select Education Level</label>
                            <select class="form-control" name="level_of_education" required>

                                @foreach ($levels as $level)
                                    <option value="{{ $level['id'] }}">{{ $level['name'] }}</option>
                                @endforeach
                            </select>
                            <p id="level_of_education-error" class="small text-danger" style="display:none">Which
                                country are
                                you coming from?</p>
                        </div>
                        <div class="my-4">
                            <div class="text-center my-1">
                                <button class="btn btn-primary" id="thirdStepNext">Submit</button>
                            </div>
                            <div class="text-center my-1">
                                <button class="btn btn-danger" id="thirdStepCancel">Cancel</button>
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            let isEmailUnique = true;
            let isMobileUnique = true;

            const form = document.getElementById('registrationForm');

            const steps = ['firstStep', 'secondStep', 'thirdStep'];
            let currentStep = 0;

            function showStep(index) {
                steps.forEach((stepId, i) => {
                    const step = document.getElementById(stepId);
                    const circle = document.querySelector(`.step-${i + 1}`);
                    if (i === index) {
                        step.style.display = 'block';
                        circle.classList.add('active');
                    } else {
                        step.style.display = 'none';
                        circle.classList.remove('active');
                    }
                });
            }





            // Add real-time email uniqueness check
            const emailInput = document.querySelector('input[name="email"]');
            const emailError = document.getElementById('email-error');

            if (emailInput) {
                emailInput.addEventListener('blur', function() {
                    const email = emailInput.value.trim();

                    if (email) {
                        fetch("{{ route('auth.register.validate.email') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({
                                    email
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.exists) {
                                    isEmailUnique = false;
                                    emailInput.classList.add('is-invalid');
                                    emailError.textContent = "This email is already registered.";
                                    emailError.style.display = 'block';
                                } else {
                                    isEmailUnique = true;
                                    emailInput.classList.remove('is-invalid');
                                    emailError.textContent = "Your email is very important to us";
                                    emailError.style.display = 'none';
                                }
                            })
                            .catch(() => {
                                emailInput.classList.add('is-invalid');
                                emailError.textContent = "Could not verify email. Please try again.";
                                emailError.style.display = 'block';
                            });
                    }
                });
            }




            // Add real-time email uniqueness check
            const mobileInput = document.querySelector('input[name="mobile"]');
            const mobileError = document.getElementById('mobile-error');

            if (mobileInput) {
                mobileInput.addEventListener('blur', function() {
                    const mobile = mobileInput.value.trim();

                    if (mobile) {
                        fetch("{{ route('auth.register.validate.mobile') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value
                                },
                                body: JSON.stringify({
                                    mobile
                                })
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.exists) {
                                    isMobileUnique = false;
                                    mobileInput.classList.add('is-invalid');
                                    mobileError.textContent = "This mobile is already registered.";
                                    mobileError.style.display = 'block';
                                } else {
                                    isMobileUnique = true;
                                    mobileInput.classList.remove('is-invalid');
                                    mobileError.textContent = "Your mobile is very important to us";
                                    mobileError.style.display = 'none';
                                }
                            })
                            .catch(() => {
                                mobileInput.classList.add('is-invalid');
                                mobileError.textContent = "Could not verify mobile. Please try again.";
                                mobileError.style.display = 'block';
                            });
                    }
                });
            }









            function validateStep(index) {
                const step = document.getElementById(steps[index]);
                const inputs = step.querySelectorAll('input[required]');
                let isValid = true;

                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                const phoneRegex = /^255[67][0-9]{8}$/;
                const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{8,}$/;

                inputs.forEach(input => {
                    const errorId = `${input.name}-error`;
                    const errorElement = document.getElementById(errorId);
                    const value = input.value.trim();

                    let fieldValid = true;

                    if (!value) {
                        fieldValid = false;
                    } else {
                        if (input.name === 'email' && !emailRegex.test(value)) {
                            fieldValid = false;
                            if (errorElement) errorElement.textContent =
                                'Please enter a valid email address.';
                        } else if (input.name === 'phone' && !phoneRegex.test(value)) {
                            fieldValid = false;
                            if (errorElement) errorElement.textContent =
                                'Phone must start with 255 followed by 6 or 7 and 8 digits.';
                        } else if (input.name === 'password' && !passwordRegex.test(value)) {
                            fieldValid = false;
                            if (errorElement) errorElement.textContent =
                                'Password must be at least 8 characters, contain one uppercase letter and one number.';
                        } else {
                            // Reset to original message if valid
                            if (errorElement) {
                                if (input.name === 'email') errorElement.textContent =
                                    'Your email is very important to us';
                                if (input.name === 'phone') errorElement.textContent =
                                    'Your mobile phone is important to us';
                                if (input.name === 'password') errorElement.textContent =
                                    'Please enter the password for your account';
                            }
                        }
                    }

                    if (!fieldValid) {
                        input.classList.add('is-invalid');
                        if (errorElement) errorElement.style.display = 'block';
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                        if (errorElement) errorElement.style.display = 'none';
                    }


                    if (index === 0) {
                        if (!isEmailUnique) {
                            isValid = false;
                            emailInput.classList.add('is-invalid');
                            emailError.textContent = "This email is already registered.";
                            emailError.style.display = 'block';
                        }

                        if (!isMobileUnique) {
                            isValid = false;
                            mobileInput.classList.add('is-invalid');
                            mobileError.textContent = "This mobile is already registered.";
                            mobileError.style.display = 'block';
                        }
                    }

                });

                return isValid;
            }




            // Step navigation logic
            document.getElementById('firstStepNext').addEventListener('click', function(e) {
                e.preventDefault();
                if (validateStep(0)) {
                    currentStep = 1;
                    showStep(currentStep);
                }
            });

            document.getElementById('secondStepNext').addEventListener('click', function(e) {
                e.preventDefault();
                if (validateStep(1)) {
                    currentStep = 2;
                    showStep(currentStep);
                }
            });

            document.getElementById('thirdStepNext').addEventListener('click', function(e) {
                e.preventDefault();
                if (validateStep(2)) {
                    form.submit();
                }
            });

            // Cancel buttons
            document.getElementById('firstStepCancel').addEventListener('click', function(e) {
                e.preventDefault();
                window.history.back(); // This takes the user to the previous page
            });


            document.getElementById('secondStepCancel').addEventListener('click', function(e) {
                e.preventDefault();
                currentStep = 0;
                showStep(currentStep);
            });

            document.getElementById('thirdStepCancel').addEventListener('click', function(e) {
                e.preventDefault();
                currentStep = 1;
                showStep(currentStep);
            });

            // Initialize first step
            showStep(currentStep);
        });
    </script>

</body>

</html>
