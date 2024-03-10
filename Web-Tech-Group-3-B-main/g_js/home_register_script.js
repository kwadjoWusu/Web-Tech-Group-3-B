document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.form');
    const firstNameInput = document.querySelector('input[name="firstname"]');
    const lastNameInput = document.querySelector('input[name="lastname"]');
    const genderInputs = document.querySelectorAll('input[name="gender"]');
    const majorInput = document.querySelector('select[name="major"]');
    const gradClassInput = document.querySelector('input[name="gradclass"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');

    const passwordRegex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission for now

        // Validation flag
        let valid = true;

        // Check if first name is not empty
        if (firstNameInput.value.trim() === '') {
            alert('Please enter your first name.');
            valid = false;
        }

        // Check if last name is not empty
        if (lastNameInput.value.trim() === '') {
            alert('Please enter your last name.');
            valid = false;
        }

        // Check if gender is selected
        let genderSelected = false;
        genderInputs.forEach(function(input) {
            if (input.checked) {
                genderSelected = true;
            }
        });
        if (!genderSelected) {
            alert('Please select your gender.');
            valid = false;
        }

        // Check if major is selected
        if (majorInput.value === '') {
            alert('Please select your major.');
            valid = false;
        }

        // Check if graduation class is not empty
        if (gradClassInput.value.trim() === '') {
            alert('Please enter your graduation class.');
            valid = false;
        }

        // Check if email is valid
        if (!emailRegex.test(emailInput.value)) {
            alert('Please enter a valid email address.');
            valid = false;
        }

        // Check if password meets requirements and matches confirm password
        if (!passwordRegex.test(passwordInput.value) || passwordInput.value !== confirmPasswordInput.value) {
            alert('Please make sure your password meets the requirements and matches the confirm password.');
            valid = false;
        }

        // Return the value of valid
        return valid;
    });
});
