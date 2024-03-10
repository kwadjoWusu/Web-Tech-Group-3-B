document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.form');
    const firstNameInput = document.querySelector('input[name="fname"]');
    const lastNameInput = document.querySelector('input[name="lname"]');
    const genderSelect = document.querySelector('select[name="gender"]');
    const roleSelect = document.querySelector('select[name="role"]');
    const majorSelect = document.querySelector('select[name="major"]');
    const yearGroupSelect = document.querySelector('select[name="yeargroup"]');
    const telephoneInput = document.querySelector('input[name="telephone"]');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="confirmPassword"]'); // Add this line

    const passwordRegex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let valid = true;

        
        if (firstNameInput.value.trim() === '') {
            alert('Please enter your first name.');
            valid = false;
        }

        if (lastNameInput.value.trim() === '') {
            alert('Please enter your last name.');
            valid = false;
         
        }

        if (genderSelect.value === '') {
            alert('Please select your gender.');
            valid = false;
          
        }

        if (roleSelect.value === '') {        
            alert('Please select your role.');
            valid = false;
         
        }

        if (majorSelect.value === '') {
            alert('Please select your major.');
            valid = false;
           
        }

        if (yearGroupSelect.value === '') {
   
            alert('Please select your year group.');
            valid = false;
        
        }

        if (telephoneInput.value.trim() === '') {
            alert('Please enter your telephone number.');
            valid = false;
        
        }

        if (!emailRegex.test(emailInput.value)) {

            alert('Please enter a valid email address.');
            valid = false;

        }

        if (!passwordRegex.test(passwordInput.value) || passwordInput.value !== confirmPasswordInput.value) {
            alert('Please make sure your password meets the requirements and matches the confirm password.');
            valid = false;
        }
    
        return valid;
    });
});
