function validation() {
    const login_email = document.getElementById('login_email');
    const login_pass = document.getElementById('login_pass');
    const login_pass_confirm = document.getElementById('login_pass_confirm');

    const email_format = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/;
    const pass_format = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

    if (login_email.value === '') {
        alert("Enter an email!!");
        return false;
    }
    if (!email_format.test(login_email.value)) {
        alert("Invalid Email!!");
        return false;
    }
    if (login_pass.value === '' || login_pass_confirm.value === '') {
        alert("Enter a password!!");
        return false;
    }
    if (login_pass.value !== login_pass_confirm.value) {
        alert("Passwords do not match!!");
        return false;
    }
    if (!pass_format.test(login_pass.value)) {
        alert("Invalid Password!! Password must contain at least 8 characters, including uppercase, lowercase, digit, and special character.");
        return false;
    } else {
        
        return true; // Form is valid
    }
    
}