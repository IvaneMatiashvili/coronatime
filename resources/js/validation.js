const username = document.getElementsByName('name')[0];
const email = document.getElementsByName('email')[0];
const password = document.querySelector('.password');
const passwordConfirmation = document.getElementsByName('password_confirmation')[0];
const loginPassword = document.querySelector('.login-password');

const nameError = document.querySelector('.name-error');
const emailError = document.querySelector('.email-error');
const passwordError = document.querySelector('.password-error');

function validateUsername() {
    if(username) {
        username.addEventListener('input', () => {
            if (username.value.trim().length >= 3) {
                username.style.borderColor = '#249E2C';
                username.nextElementSibling.style.display = 'block';
                if(nameError) {
                    nameError.style.display = 'none';
                }
            } else {
                username.style.borderColor = '#E6E6E7';
                username.nextElementSibling.style.display = 'none';
                if(nameError) {
                    nameError.style.display = 'none';
                }
            }
        })
    }
}

validateUsername();

function validateEmail() {
    if(email) {
        email.addEventListener('input', () => {
            const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (re.test(String(email.value.trim()).toLowerCase())) {
                email.style.borderColor = '#249E2C';
                email.nextElementSibling.style.display = 'block';
                if(emailError) {
                    emailError.style.display = 'none';
                }
            } else {
                email.style.borderColor = '#E6E6E7';
                email.nextElementSibling.style.display = 'none';
                if(emailError) {
                    emailError.style.display = 'none';
                }
            }
        })
    }
}

validateEmail();

function validatePassword() {
    if(password && passwordConfirmation) {
        password.addEventListener('input', () => {
            if (password.value.trim().length >= 3) {
                password.style.borderColor = '#249E2C';
                password.nextElementSibling.style.display = 'block';
                if(passwordError) {
                    passwordError.style.display = 'none';
                }
                if ((passwordConfirmation.value.trim() === password.value.trim()) && password.value.trim().length >= 3) {
                    passwordConfirmation.style.borderColor = '#249E2C';
                    passwordConfirmation.nextElementSibling.style.display = 'block';
                    if(passwordError) {
                        passwordError.style.display = 'none';
                    }
                } else {
                    passwordConfirmation.style.borderColor = '#E6E6E7';
                    passwordConfirmation.nextElementSibling.style.display = 'none';
                    if(passwordError) {
                        passwordError.style.display = 'none';
                    }
                }
            } else {
                password.style.borderColor = '#E6E6E7';
                password.nextElementSibling.style.display = 'none';
                if(passwordError) {
                    passwordError.style.display = 'none';
                }
            }
        })
        passwordConfirmation.addEventListener('input', () => {
            if ((passwordConfirmation.value.trim() === password.value.trim()) && password.value.trim().length >= 3) {
                passwordConfirmation.style.borderColor = '#249E2C';
                passwordConfirmation.nextElementSibling.style.display = 'block';
            } else {
                passwordConfirmation.style.borderColor = '#E6E6E7';
                passwordConfirmation.nextElementSibling.style.display = 'none';
            }
        })
    }

    if(loginPassword) {
        loginPassword.addEventListener('input', () => {
            if (loginPassword.value.trim().length >= 1) {
                loginPassword.style.borderColor = '#249E2C';
                loginPassword.nextElementSibling.style.display = 'block';
                if(passwordError) {
                    passwordError.style.display = 'none';
                }
            } else {
                loginPassword.style.borderColor = '#E6E6E7';
                loginPassword.nextElementSibling.style.display = 'none';
                if(passwordError) {
                    passwordError.style.display = 'none';
                }
            }
        })
    }
}

validatePassword();