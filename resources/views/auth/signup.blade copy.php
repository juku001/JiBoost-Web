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
            <div class="step-circle step-1 active">1</div>
            <div class="step-circle step-2">2</div>
            <div class="step-circle step-3">3</div>
        </div>

        <div class="row mt-3">
            <div class="offset-1 offset-md-3 col-10 col-md-6">
                <form id="registrationForm">
                    @csrf

                    <!-- Step 1 -->
                    <div class="step step-1">
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
                            {{-- <button type="button" class="btn btn-primary next-step">Next</button>
                             --}}
                            <button type="button" class="btn btn-primary next-step position-relative"
                                id="step1NextBtn">
                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status"
                                    aria-hidden="true" id="step1Spinner"></span>
                                Next
                            </button>

                            <a href="{{ route('auth.register') }}" class="btn btn-danger">Back</a>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="step step-2 d-none">
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

                    <!-- Step 3 -->
                    <div class="step step-3 d-none">
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
                </form>
            </div>
        </div>
    </div>







    {{-- <script>
        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                if (currentStep === 0) {
                    const fullname = document.querySelector('input[name="fullname"]').value.trim();
                    const email = document.querySelector('input[name="email"]').value.trim();
                    const phone = document.querySelector('input[name="phone"]').value.trim();
                    const password = document.querySelector('input[name="password"]').value.trim();
                    const sex = document.querySelector('input[name="sex"]:checked');

                    // Local validation first
                    if (!fullname || !email || !phone || !password || !sex) {
                        alert("Please fill in all required fields.");
                        return;
                    }

                    // Basic email format check (optional)
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        alert("Please enter a valid email address.");
                        return;
                    }

                    const btn = document.getElementById('step1NextBtn');
                    const spinner = document.getElementById('step1Spinner');
                    btn.disabled = true;
                    spinner.classList.remove('d-none');

                    let emailValid = false;
                    let phoneValid = false;

                    try {
                        const emailRes = await fetch("{{ route('auth.register.validate.email') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                email
                            })
                        });
                        const emailData = await emailRes.json();
                        emailValid = emailData.valid;
                        if (!emailValid) alert(emailData.message || "Email already in use.");
                    } catch (err) {
                        alert("Email validation failed.");
                    }

                    try {
                        const phoneRes = await fetch("{{ route('auth.register.validate.mobile') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                phone
                            })
                        });
                        const phoneData = await phoneRes.json();
                        phoneValid = phoneData.valid;
                        if (!phoneValid) alert(phoneData.message || "Phone already in use.");
                    } catch (err) {
                        alert("Phone validation failed.");
                    }

                    spinner.classList.add('d-none');
                    btn.disabled = false;

                    if (emailValid && phoneValid) {
                        updateStep('next');
                    }
                } else {
                    updateStep('next');
                }
            });
        });
    </script> --}}
    {{-- <script src="{{ asset('assets/welcome/js/registration.js') }}" type="text/javascript"></script> --}}



    <script>
        const steps = document.querySelectorAll('.step');
        const indicators = document.querySelectorAll('.step-circle');
        let currentStep = 0;

        function updateStep(direction) {
            steps[currentStep].classList.add('d-none');
            indicators[currentStep].classList.remove('active');

            if (direction === 'next') currentStep++;
            else if (direction === 'prev') currentStep--;

            steps[currentStep].classList.remove('d-none');
            indicators[currentStep].classList.add('active');
        }

        function validateCurrentStep() {
            const currentStepForm = steps[currentStep];
            let isValid = true;

            // Loop through required fields
            currentStepForm.querySelectorAll('[required]').forEach(input => {
                const errorMsg = input.closest('.form-group')?.querySelector('p.text-danger');

                // For radios, we need special handling
                if (input.type === 'radio') {
                    const name = input.name;
                    const isChecked = currentStepForm.querySelectorAll(`input[name="${name}"]:checked`).length > 0;
                    if (!isChecked) {
                        isValid = false;
                        if (errorMsg) errorMsg.classList.remove('d-none');
                    } else {
                        if (errorMsg) errorMsg.classList.add('d-none');
                    }
                } else {
                    if (!input.value.trim()) {
                        isValid = false;
                        if (errorMsg) errorMsg.classList.remove('d-none');
                    } else {
                        if (errorMsg) errorMsg.classList.add('d-none');
                    }
                }
            });

            return isValid;
        }

        // document.querySelectorAll('.next-step').forEach(btn => {
        //     btn.addEventListener('click', async () => {
        //         if (validateCurrentStep()) {
        //             updateStep('next');
        //         }
        //     });
        // });



        document.querySelectorAll('.next-step').forEach(btn => {
            btn.addEventListener('click', async () => {
                if (!validateCurrentStep()) return;

                // Only run email/phone check on Step 0
                if (currentStep !== 0) {
                    updateStep('next');
                    return;
                }

                // Spinner
                const originalHTML = btn.innerHTML;
                btn.innerHTML =
                    `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Checking...`;
                btn.disabled = true;

                const form = document.querySelector('#registrationForm');
                const formData = new FormData(form);
                const email = formData.get('email');
                const phone = formData.get('phone');

                try {
                    // Check Email
                    const emailRes = await fetch('/check/email', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="csrf-token"]')
                                ?.value
                        },
                        body: new URLSearchParams({
                            email
                        })
                    });

                    const emailData = await emailRes.json();
                    if (!emailData.success) {
                        showInlineError('email', emailData.message || 'Email already taken');
                        btn.innerHTML = originalHTML;
                        btn.disabled = false;
                        return;
                    }

                    // Check Phone
                    const phoneRes = await fetch('/check/mobile', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('input[name="csrf-token"]')
                                ?.value
                        },
                        body: new URLSearchParams({
                            phone
                        })
                    });

                    const phoneData = await phoneRes.json();
                    if (!phoneData.success) {
                        showInlineError('phone', phoneData.message || 'Phone already taken');
                        btn.innerHTML = originalHTML;
                        btn.disabled = false;
                        return;
                    }

                    // All passed, move forward
                    updateStep('next');
                } catch (error) {
                    alert('An error occurred while checking your email or phone.');
                    console.error(error);
                } finally {
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                }
            });
        });


        document.querySelectorAll('.prev-step').forEach(btn => {
            btn.addEventListener('click', () => {
                updateStep('prev');
            });
        });


        //helper function 
        function showInlineError(fieldName, message) {
            const field = document.querySelector(`[name="${fieldName}"]`);
            const error = field.closest('.form-group')?.querySelector('p.text-danger');
            if (error) {
                error.textContent = message;
                error.classList.remove('d-none');
            }
        }











        ///this is the validation for the mobile number


        const phoneInput = document.querySelector('input[name="phone"]');
        const phoneError = phoneInput.closest('.form-group').querySelector('p.text-danger');

        // Auto-prefix 255 and prevent removing it
        phoneInput.addEventListener('focus', () => {
            if (!phoneInput.value.startsWith('255')) {
                phoneInput.value = '255';
            }
        });

        phoneInput.addEventListener('input', () => {
            // Re-add prefix if removed
            if (!phoneInput.value.startsWith('255')) {
                phoneInput.value = '255';
            }

            // Keep only numbers and limit to 12 digits
            phoneInput.value = phoneInput.value.replace(/\D/g, '').slice(0, 12);

            // Show error if less than 12 digits
            if (phoneInput.value.length < 12) {
                phoneError.textContent = 'Phone number must be 9 digits after 255';
                phoneError.classList.remove('d-none');
            } else {
                phoneError.classList.add('d-none');
            }
        });

        // Prevent backspacing past 255
        phoneInput.addEventListener('keydown', function(e) {
            if ((this.selectionStart <= 3) && (e.key === "Backspace" || e.key === "Delete")) {
                e.preventDefault();
            }
        });

        // Ensure validation in the step validator too
        function validateCurrentStep() {
            const currentStepForm = steps[currentStep];
            let isValid = true;

            currentStepForm.querySelectorAll('[required]').forEach(input => {
                const errorMsg = input.closest('.form-group')?.querySelector('p.text-danger');

                if (input.type === 'radio') {
                    const name = input.name;
                    const isChecked = currentStepForm.querySelectorAll(`input[name="${name}"]:checked`).length > 0;
                    if (!isChecked) {
                        isValid = false;
                        if (errorMsg) errorMsg.classList.remove('d-none');
                    } else {
                        if (errorMsg) errorMsg.classList.add('d-none');
                    }
                } else {
                    if (!input.value.trim()) {
                        isValid = false;
                        if (errorMsg) errorMsg.classList.remove('d-none');
                    } else {
                        if (errorMsg) errorMsg.classList.add('d-none');
                    }

                    // Phone-specific validation
                    if (input.name === 'phone' && input.value.length !== 12) {
                        isValid = false;
                        errorMsg.textContent = 'Phone number must be 9 digits after 255';
                        errorMsg.classList.remove('d-none');
                    }
                }
            });

            return isValid;
        }




        //this is a custom javascript for the email part 


        const emailInput = document.querySelector('input[name="email"]');
        const emailError = emailInput.closest('.form-group').querySelector('p.text-danger');

        emailInput.addEventListener('input', () => {
            const value = emailInput.value.trim();

            if (!value) {
                emailError.textContent = 'Email is required';
                emailError.classList.remove('d-none');
            } else if (!validateEmailFormat(value)) {
                emailError.textContent = 'Please enter a valid email address';
                emailError.classList.remove('d-none');
            } else {
                emailError.classList.add('d-none');
            }
        })

        function validateEmailFormat(email) {
            // Simple but effective regex for general email format
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
    </script>
</body>

</html>
