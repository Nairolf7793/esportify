//fonction message deconnexion
function afficherDeconnexion(message){
    const deco = document.getElementById('messageDeconnexion');
    if(deco){
    deco.textContent = message;
    deco.style.display="block";
    }
}
    