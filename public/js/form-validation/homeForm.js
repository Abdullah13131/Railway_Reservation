import { validateName } from './formValidationHelpers.js';

function tripFormValidation() {


    const submit = document.getElementById('submit');
    var formValid = true;

    console.log(form);


    console.log("Loaded Trip Validation");

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        var form = document.getElementById("form");
        var fromS = document.getElementById("from_station");
        var toS = document.getElementById("to_station");


        console.log("Validating Input");
        formValid = formValid && validateName(fromS, 'Station cannot be empty!');
        formValid = formValid && validateName(toS, 'Station cannot be empty!');
        console.log(formValid);
        if (formValid) {
            form.submit();
        } else {
            formValid = true;
        }
    })



}


tripFormValidation();