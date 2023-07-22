// created an object of regex expressions for sign up form validation

const patterns = {
    firstName: /^[a-zA-Z]{3,10}$/i,
    lastName: /^[a-zA-Z]{3,10}$/i,
    username: /^[a-zA-z0-9]{5,12}$/i,
    email: /^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    password: /^[a-zA-Z0-9@\-#$]{8,20}$/i
};

// this function is used to validate the specific field of the form
function validate(field) {
    if (patterns[field.name].test(field.value)) {
        field.className = "valid-field";
    } else {
        field.className = "invalid-field";
    }
}