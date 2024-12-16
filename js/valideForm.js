//fonction pour valider tous les champs requis

const inputPseudo = document.getElementById("pseudoInscription");
const inputPassword = document.getElementById("passwordInscription");
const inputPasswordValidation = document.getElementById("passwordValidationOk");
const inputEmail = document.getElementById("email");
const inputAge = document.getElementById("age");
const btnValidation = document.getElementById("btn-validate");

inputPseudo.addEventListener("keyup", validateInscription);
inputPassword.addEventListener("keyup", validateInscription);
inputEmail.addEventListener("keyup", validateInscription);
inputAge.addEventListener("keyup", validateInscription);

function validateInscription(){
    const pseudoOk = validateRequired(inputPseudo);
    const passwordOk = validateRequired(inputPassword);
    const emailOk = validateRequired(inputEmail);
    const ageOk = validateRequired(inputAge);
    validateMail(inputEmail);
    validatePassword(inputPassword);
    validatePasswordValidation(inputPassword, inputPasswordValidation);

    //faire booleen pour valider que tous les champs sont remplis pour afficher le bouton inscription
    if(pseudoOk && passwordOk && emailOk && ageOk){
        btnValidation.disabled = false;
    }
    else ("") {
        btnValidation.disabled = true;
    }
     
}

function validateRequired(input){
    if(input.value != ''){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    }
    else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

//fonction pour valider le mail

function validateMail(input){
    const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const mailUser = input.value;

    if(mailUser.match(mailRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    }
    else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}


//fonction pour sécurisé le password d'inscription
function validatePassword(input){
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
    const passwordUser = input.value;

    if(passwordUser.match(passwordRegex)){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
        return true;
    }
    else {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        return false;
    }
}

//fonction pour confirmer le password dans inscription
function validatePasswordValidation (inputPassword, inputPasswordValidation){
    if(inputPassword.value == inputPasswordValidation.value){
        inputPasswordValidation.classList.add("is-valid");
        inputPasswordValidation.classList.remove("is-invalid");
        return true;
    } 
    else {
        inputPasswordValidation.classList.remove("is-valid");
        inputPasswordValidation.classList.add("is-invalid");
        return false;
    }

}

