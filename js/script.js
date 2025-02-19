//suppression des alert message
setTimeout(function(){
    let alertMessage = document.getElementById("message-alert");
        if(alertMessage) {
            setTimeout(() =>alertMessage.remove(),500);
        }
    },3000);


//gestion des avis / etoiles 

window.onload =() => {
    //chercher toutes les etoiels 
    const stars = document.querySelectorAll(".interactive-star");
    
    //cherche l'input
    const note = document.querySelector("#note");

    //on boucle sur les etoiles pour ajouter les écouteurs d'évenements

    for(star of stars){
        //on écoute le survol
        star.addEventListener("mouseover", function(){
            resetStars();
            this.style.color="yellow";
            this.classList.add("fa-solid");
            this.classList.remove("fa-regular");
            //element précédent de même niveau dans le DOM
            let previousStar = this.previousElementSibling;

            while(previousStar){
                previousStar.style.color="yellow";
                previousStar.classList.add("fa-solid");
                previousStar.classList.remove("fa-regular");
                previousStar = previousStar.previousElementSibling;
            }
            
        });

        //evenement sur le click de validation
        star.addEventListener("click", function(){
            note.value= this.dataset.value;
        });

        //repasse les étoiles en noir quand on ne survol plus, priorité au click
        star.addEventListener("mouseout", function(){
            resetStars(note.value);
        })
    }

    //fonction pour cocher les etoiles précédentes
    function resetStars(note = 0){
        for(star of stars){
            if(star.dataset.value > note){
                star.style.color="black";
                star.classList.add("fa-regular");
                star.classList.remove("fa-solid");
                
            }
            else {
                star.style.color ="yellow";
                star.classList.add("fa-solid");
                star.classList.remove("fa-regular");
            }
        }
    }
}
