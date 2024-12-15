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
