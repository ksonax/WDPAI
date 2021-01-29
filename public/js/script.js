const form = document.querySelector("form");
const messages = document.querySelector("messages");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="confirmedPassword"]');
const passwordInput = form.querySelector('input[name="password"]');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}
function isPasswordStrong() {
    if (passwordInput.value.length >= 8)
        return true
    else
        return false
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value));
        },
        1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                passwordInput.value,
                confirmedPasswordInput.value
            );
            const condition2 = isPasswordStrong();
            markValidation(confirmedPasswordInput, condition);
            markValidation(passwordInput, condition2);
        },
        1000
    );
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);