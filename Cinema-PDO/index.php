<?php

require_once "controller/FilmController.php";

require_once "controller/HomeController.php";


// Appel de la function autoload pour charger automatiquement tout les controllers crées
spl_autoload_register(function ($class_name) {
    require_once 'controller/' . $class_name . '.php';
});

// variable declaration

$ctrFilm = new FilmController();
$ctrHome = new HomeController();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "listFilms":
            $ctrFilm->listFilms();
            break;
        case "addFilm":
            $ctrFilm->ajouterFilm();
            break;
        case "detailsFilm":
            $ctrFilm->showFilmDetails($_GET['id']);
            break; 
        case "deleteFilm":
            $ctrFilm->deleteFilm();
            break;

        case "editFilm":
                $ctrFilm->editFilm();
                break;
        case "updateFilm":
                $ctrFilm->updateFilm();
                break;
    }
} else {
    $ctrHome->homePage();
}

