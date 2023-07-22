function setErrorFor(input, message) {

    const formControl = input.parentElement;
    const small = formControl.querySelector('small');

    small.innerHTML = message;
    console.log(small);
    formControl.classList.add('failure');
    formControl.classList.remove('success');
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.classList.add('success');
    formControl.classList.remove('failure');
}


function validateName(input, errorMessage) {
    const inputValue = input.value.trim();
    console.log(inputValue);
    if (inputValue == '') {
        setErrorFor(input, errorMessage);
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

function validateEmail(input) {
    const inputValue = input.value.trim();
    if (inputValue == '') {
        setErrorFor(input, 'Email cannot be blank!');
        return false;
    } else if (!inputValue.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
        setErrorFor(input, 'Invalid email!');
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

function validatePassword(input) {
    const inputValue = input.value.trim();
    if (inputValue == '') {
        setErrorFor(input, 'Password cannot be blank!');
        return false;
    } else if (!inputValue.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/)) {
        setErrorFor(input, 'Invalid password! \nPassword must contain capital letter, small letter and number');
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}

function validateRepeatPassword(input, checkInput) {
    const inputValue = input.value.trim();
    const checkInputValue = checkInput.value.trim();
    if (inputValue != checkInputValue || inputValue == '') {
        setErrorFor(input, 'Passwords do not match');
        return false;
    } else {
        setSuccessFor(input);
        return true;
    }
}


function checkCheckbox(checkbox, message) {
    if (!checkbox.checked) {
        setErrorFor(checkbox, message);
        return false;
    } else {
        setSuccessFor(checkbox);
        return true;
    }
}


export { validateName, validateEmail, validatePassword, validateRepeatPassword, checkCheckbox };