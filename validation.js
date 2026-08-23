document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Name validation
            const name = document.getElementById('name');
            if (name.value.trim() === '') {
                showError(name, 'Name is required');
                isValid = false;
            } else if (name.value.trim().length < 2) {
                showError(name, 'Name must be at least 2 characters');
                isValid = false;
            } else {
                clearError(name);
            }
            
            // Email validation
            const email = document.getElementById('email');
            const emailPattern = /^[^\s@]+@([^\s@]+\.)+[^\s@]+$/;
            if (!emailPattern.test(email.value)) {
                showError(email, 'Enter a valid email address');
                isValid = false;
            } else {
                clearError(email);
            }
            
            // Phone validation
            const phone = document.getElementById('phone');
            const phonePattern = /^[0-9]{10}$/;
            if (!phonePattern.test(phone.value)) {
                showError(phone, 'Phone must be 10 digits');
                isValid = false;
            } else {
                clearError(phone);
            }
            
            // Age validation
            const age = document.getElementById('age');
            if (age.value < 5 || age.value > 100) {
                showError(age, 'Age must be between 5 and 100');
                isValid = false;
            } else {
                clearError(age);
            }
            
            if (!isValid) {
                e.preventDefault();
            }
        });
    }
    
    function showError(input, message) {
        const formGroup = input.parentElement;
        let error = formGroup.querySelector('.error-message');
        if (!error) {
            error = document.createElement('div');
            error.className = 'error-message text-danger';
            formGroup.appendChild(error);
        }
        error.innerText = message;
        input.classList.add('is-invalid');
    }
    
    function clearError(input) {
        const formGroup = input.parentElement;
        const error = formGroup.querySelector('.error-message');
        if (error) error.remove();
        input.classList.remove('is-invalid');
    }
});