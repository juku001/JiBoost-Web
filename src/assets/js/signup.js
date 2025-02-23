// document.addEventListener('DOMContentLoaded', function () {
//     const radios = document.querySelectorAll('input[name="user-type"]');
//     const userImage = document.getElementById('user-image');

//     // Function to update image based on selected radio button
//     function updateImage() {
//         const checkedRadio = document.querySelector('input[name="user-type"]:checked');
//         if (checkedRadio) {
//             const value = checkedRadio.value;
//             switch (value) {
//                 case 'student':
//                     userImage.src = '../images/signup_student.webp';
//                     break;
//                 case 'parent':
//                     userImage.src = '../images/signup_parents.webp';
//                     break;
//                 case 'teacher':
//                     userImage.src = '../images/signup_teacher.webp';
//                     break;
//             }
//         }
//     }

//     // Add event listeners to all radio buttons
//     radios.forEach(radio => {
//         radio.addEventListener('change', updateImage);
//     });

//     // Set the default image on page load
//     // updateImage();
//     const savedUserType = localStorage.getItem('userType');
//     if (savedUserType) {
//         document.querySelector(`input[name="user-type"][value="${savedUserType}"]`).checked = true;
//         updateImage();
//     }
// });




document.addEventListener('DOMContentLoaded', function () {
    const backBtn = document.getElementById('back-btn');
    const sectionTitle = document.querySelector('#form-section .section-title');
    const continueBtn = document.getElementById('continue-btn');
    const nextBtnStep1 = document.getElementById('next-btn-step-1');
    const nextBtnStep2 = document.getElementById('next-btn-step-2');
    const previousBtnStep2 = document.getElementById('previous-btn-step-2');
    const previousBtnStep3 = document.getElementById('previous-btn-step-3');
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');
    const step3 = document.getElementById('step-3');
    const formSection = document.getElementById('form-section');
    const additionalFields = document.getElementById('additional-fields');
    const userTypeRadios = document.querySelectorAll('input[name="user-type"]');
    // const form = document.querySelector('form');

    // Restore the saved state from localStorage
    const savedState = localStorage.getItem('registrationState');
    if (savedState === 'form') {
        document.getElementById('initial-section').style.display = 'none';
        formSection.style.display = 'block';

        // Restore the saved user type
        const savedUserType = localStorage.getItem('userType');
        if (savedUserType) {
            document.querySelector(`input[name="user-type"][value="${savedUserType}"]`).checked = true;
            showFormSection(savedUserType);
        }
    }

    function backToInitial() {
        // Clear state from localStorage
        localStorage.removeItem('registrationState');
        localStorage.removeItem('userType');

        formSection.style.display = 'none';
        document.getElementById('initial-section').style.display = 'block';
    }

    function showStep(stepNumber) {
        // Hide all steps
        step1.style.display = 'none';
        step2.style.display = 'none';
        step3.style.display = 'none';

        // Show the current step
        if (stepNumber === 1) {
            step1.style.display = 'block';
        } else if (stepNumber === 2) {
            step2.style.display = 'block';
        } else if (stepNumber === 3) {
            step3.style.display = 'block';
        }

        // Update step indicators
        updateStepIndicators(stepNumber);
    }

    function updateStepIndicators(currentStep) {
        // Get all step indicators
        const stepIndicators = document.querySelectorAll('.signup-step');
        
        stepIndicators.forEach((indicator, index) => {
            if (index < currentStep - 1) {
                indicator.classList.add('completed');
                indicator.classList.remove('active');
            } else if (index === currentStep - 1) {
                indicator.classList.add('active');
                indicator.classList.remove('completed');
            } else {
                indicator.classList.remove('active');
                indicator.classList.remove('completed');
            }
        });
    }

    function showFormSection(userType) {
        // Show the form section
        document.getElementById('initial-section').style.display = 'none';
        formSection.style.display = 'block';

        // Show step 1
        showStep(1);

        // Update the additional fields based on user type
        let fieldsHtml = '';
        switch (userType) {
            case 'student':
                sectionTitle.textContent = 'Student Registration';
                fieldsHtml = `
                    <div class="form-group mt-15">
                        <label for="education-level">Level of Education</label>
                        <select id="education-level" name="education_level" class="form-control" required>
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>
                            <option value="advanced">Advanced</option>
                        </select>
                    </div>
                    <div class="form-group mt-15">
                        <label for="school-name">Current School</label>
                        <input type="text" id="school-name" name="school_name" class="form-control" required>
                    </div>
                `;
                break;
            case 'teacher':
                sectionTitle.textContent = 'Teacher Registration';
                fieldsHtml = `
                    <div class="form-group mt-15">
                        <label for="school-name">Current School</label>
                        <input type="text" id="school-name" name="school_name" class="form-control" required>
                    </div>
                    <div class="form-group mt-15">
                        <label for="subject">Teaching Subject</label>
                        <input type="text" id="subject" name="subject" class="form-control" required>
                    </div>
                `;
                break;
            case 'parent':
                sectionTitle.textContent = 'Parent Registration';
                fieldsHtml = `
                    <div class="form-group mt-15">
                        <label for="parent-type">Type of Parent</label>
                        <select id="parent-type" name="parent_type" class="form-control" required>
                            <option value="mother">Mother</option>
                            <option value="father">Father</option>
                        </select>
                    </div>
                    <div class="form-group mt-15">
                        <label for="num-kids">Number of Kids</label>
                        <input type="number" id="num-kids" name="num_kids" class="form-control" required>
                    </div>
                `;
                break;
        }
        additionalFields.innerHTML = fieldsHtml;
    }

    function validateStep1() {
        // Validate step 1
        const requiredFields = step1.querySelectorAll('[required]');
        return Array.from(requiredFields).every(field => field.value.trim() !== '');
    }

    function validateStep2() {
        // Validate step 2
        const requiredFields = step2.querySelectorAll('[required]');
        return Array.from(requiredFields).every(field => field.value.trim() !== '');
    }

    function validateStep3() {
        // Validate step 3
        const requiredFields = step3.querySelectorAll('[required]');
        return Array.from(requiredFields).every(field => field.value.trim() !== '');
    }

    function handleNextStep(currentStep) {
        let isValid = false;
        switch (currentStep) {
            case 1:
                isValid = validateStep1();
                break;
            case 2:
                isValid = validateStep2();
                break;
            case 3:
                isValid = validateStep3();
                break;
        }
        if (isValid) {
            showStep(currentStep + 1);
        } else {
            alert('Please fill in all required fields.');
        }
    }

    backBtn.addEventListener('click', function () {
        backToInitial();
    });

    continueBtn.addEventListener('click', function () {
        // Save state to localStorage
        localStorage.setItem('registrationState', 'form');
        const selectedUserType = Array.from(userTypeRadios).find(radio => radio.checked)?.value;
        localStorage.setItem('userType', selectedUserType);
        if (selectedUserType) {
            showFormSection(selectedUserType);
        } else {
            alert('Please select a user type.');
        }
    });

    nextBtnStep1.addEventListener('click', function () {
        handleNextStep(1);
    });

    previousBtnStep2.addEventListener('click', function () {
        showStep(1);
    });

    nextBtnStep2.addEventListener('click', function () {
        handleNextStep(2);
    });

    previousBtnStep3.addEventListener('click', function () {
        showStep(2);
    });
});
