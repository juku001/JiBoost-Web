
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
        btn.innerHTML = `<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Checking...`;
        btn.disabled = true;

        const form = document.querySelector('#registrationForm');
        const formData = new FormData(form);
        const email = formData.get('email');
        const phone = formData.get('phone');

        try {
            // Check Email
            const emailRes = await fetch('/check/email', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="csrf-token"]')?.value },
                body: new URLSearchParams({ email })
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
                headers: { 'X-CSRF-TOKEN': document.querySelector('input[name="csrf-token"]')?.value },
                body: new URLSearchParams({ phone })
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
phoneInput.addEventListener('keydown', function (e) {
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