//fonction pour valider tous les champs requis

const inputPseudo = document.getElementById("pseudoInscription");
const inputPassword = document.getElementById("passwordInscription");
const inputEmail = document.getElementById("email");
const inputAge = document.getElementById("age");

inputPseudo.addEventListener("keyup", validateInscription);
inputPassword.addEventListener("keyup", validateInscription);
inputEmail.addEventListener("keyup", validateInscription);
inputAge.addEventListener("keyup", validateInscription);

function validateInscription(){
    validateRequired(inputPseudo);
    validateRequired(inputPassword);
    validateRequired(inputEmail);
    validateRequired(inputAge);
    const passwordOk = validatePassword(inputPassword);
    
}

function validateRequired(input){
    if(input.value != ''){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }
    else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}

function validatePassword(input){
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    const passwordUser = input.value;

    if(passwordUser.match(passwordRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }
    else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
    }
}
