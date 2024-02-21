document.addEventListener("DOMContentLoaded", function() {
    const form = document.querySelector('.form');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');

    const emailRegex = /[a-zA-Z0-9._]+@[a-zA-Z0-9.]+\.[a-zA-Z]{2,}$/;
    const passwordRegex = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z]).{8,}/;

    form.addEventListener('submit', function(event) {
        let valid = true;

        if (!emailRegex.test(emailInput.value)) {
            valid = false;
            alert('Please enter a valid email address');
        }

        if (!passwordRegex.test(passwordInput.value)) {
            valid = false;
            alert('Please enter a valid password. It must contain at least one lowercase letter, one uppercase letter, one numeric digit, and be at least 8 characters long.');
        }

        return valid; // Return the value of valid
    });
});
