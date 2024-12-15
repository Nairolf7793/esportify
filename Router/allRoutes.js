import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.php"),
    new Route("/evenement", "Evenement", "/pages/evenement.php"),
    new Route("/contact", "Contact", "/pages/contact.php"),
    new Route("/connexion", "Connexion", "/pages/connexion.php"),
    new Route("/inscription", "Inscription", "/pages/inscription.php"),
];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Esportify";