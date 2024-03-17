document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('register-form');
    const firstNameInput = document.querySelector('input[name="fname"]');
    const lastNameInput = document.querySelector('input[name="lname"]');
    const genderInput = document.querySelector('select[name="gender"]');
    const majorInput = document.querySelector('select[name="major"]');
    const yearGroup = document.querySelector('select[name="yeargroup"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmpassword"]');

    function sanitizeInput(str) {
        return str.replace(/&/g, '&amp;')
                  .replace(/</g, '&lt;')
                  .replace(/>/g, '&gt;')
                  .replace(/"/g, '&quot;')
                  .replace(/'/g, '&#039;');
    }

    function register() {
        var formData = new FormData(form);
        
        // Sanitize security answers
        const ansInputs = document.querySelectorAll('input[name="security_answer[]"]');
        ansInputs.forEach(function(input) {
            formData.append('security_answer[]', sanitizeInput(input.value));
        });
    
        var xhr = new XMLHttpRequest(); 
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) { // When the request is complete
                if (xhr.status === 200) { // If the request is successful
                    document.getElementById('message').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('message').innerHTML = 'An error occurred'; 
                }
            }
        };
    
        xhr.open('POST', '../action/register_action.php'); 
        xhr.send(formData); 
    }
    const emailRegex = /^[^\s@]+@ashesi\.edu\.gh$/;
    const passwordRegex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;

    // Form validation and submission
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        
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
        if (genderInput.value === '') {
            alert('Please select your gender.');
            valid = false;
        }

        // Check if major is selected
        if (majorInput.value === '') {
            alert('Please select your major.');
            valid = false;
        }

        // Check if graduation class is not empty
        if (yearGroup.value.trim() === '') {
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

        if (valid) {
            register();
        }
    });
});
