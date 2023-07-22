import { validateName, validateEmail, validatePassword } from './formValidationHelpers.js';


const form = document.getElementById("form");
const fName = document.getElementById("f_name");
const lName = document.getElementById("l_name");
const email = document.getElementById("email");
const password = document.getElementById("oldpassword");

const submit = document.getElementById("save");


console.log("Loaded Profile Validation");

form.addEventListener('submit', (e) => {
    e.preventDefault();

    if(validateInputs())
    {
        form.submit();
    }
})


function validateInputs() {
    console.log("Validating Input");
    var f_check=true;
    f_check=f_check &&validateName(fName, 'name cannot be blank!');
    f_check=f_check &&validateEmail(email);
    f_check=f_check &&validatePassword(password);
    return f_check;

}