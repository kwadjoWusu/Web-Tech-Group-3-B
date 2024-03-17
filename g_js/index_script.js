document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('login-form');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');
    const messageDiv = document.getElementById('message');

    function login() {
        var formData = new FormData(form); 
        var xhr = new XMLHttpRequest();
    
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    messageDiv.innerHTML = xhr.responseText; 
                } else {
                    messageDiv.innerHTML = 'An error occurred'; 
                }
            }
        };
    
        xhr.open('POST', './action/login_action.php'); 
        xhr.send(formData); 
    }

    const emailRegex = /^[^\s@]+@ashesi\.edu\.gh$/;
    const passwordRegex = /^(?=.*[!@#$%^&*])(?=.*[0-9])(?=.*[A-Z]).{8,}$/;

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        let valid = true;

        if (!emailRegex.test(emailInput.value)) {
            valid = false;
            alert('Please enter a valid email address');
        }

        if (!passwordRegex.test(passwordInput.value)) {
            valid = false;
            alert('Please enter a valid password. It must contain at least one lowercase letter, one uppercase letter, one numeric digit, and be at least 8 characters long.');
        }

        if (valid) {
            login();
        }
    });
});
