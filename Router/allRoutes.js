import Route from "./Route.js";

//Définir ici vos routes
export const allRoutes = [
    new Route("/", "Accueil", "/pages/home.php", "/js/deconnexion.js"),
    new Route("/evenement", "Evenement", "/pages/evenement.php"),
    new Route("/contact", "Contact", "/pages/contact.php"),
    new Route("/account", "Mon espace", "/pages/account.php"),
    new Route("/connexion", "Connexion", "/pages/connexion.php" , "/js/valideForm.js" ),
    new Route("/create_event", "Création evenement", "/pages/create_event.php"),
    new Route("/validation_event", "validation event", "/pages/validation_event.php"),
];

//Le titre s'affiche comme ceci : Route.titre - websitename
export const websiteName = "Esportify";