<?php
require_once 'app/DAO.php';

class FilmController {
    private $bdd;

    public function __construct() {
        $dao = new DAO();
        $this->bdd = $dao->getBDD();
    }

    public function listFilms() {
        $dao = new DAO();
        $sql = 'SELECT id_film, title, date_format(date_release, "%Y") year, duration, synopsis, note, picture 
                FROM film
                ORDER BY date_release DESC';

        $films = $dao->executeRequest($sql);
        require 'view/film/listFilms.php';
    }


    public function showFilmDetails($id) {
        $sql = "SELECT * FROM film WHERE id_film = ?";
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$id]);
        $film = $stmt->fetch();
    
        
        require 'view/film/detailsFilm.php';
    }
    
    

    public function ajouterFilm() {
        // Récupération des données du formulaire
        $title = $_POST['title'];
        $date_sortie = $_POST['date_sortie'];
        $duree = $_POST['duree'];
        $synopsis = $_POST['synopsis'];
        $note = $_POST['note'];
        $realisateur = $_POST['realisateur'];

        // Requête pour insérer les données dans la table film
        $sql = "INSERT INTO film (title, date_release, duration, synopsis, note, realisateur) VALUES (?, ?, ?, ?, ?, ?)";

        // Préparation et exécution de la requête
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([$title, $date_sortie, $duree, $synopsis, $note, $realisateur]);

        // 
        header('Location: index.php?action=listFilms');
    }


    public function deleteFilm() {
        if (isset($_GET['id'])) {
            $idFilm = $_GET['id'];
            $sql = "DELETE FROM film WHERE id_film = ?";
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute([$idFilm]);
        }
        header('Location: index.php?action=listFilms'); // Redirection vers la liste des films
    }
    
    

    public function editFilm() {
        if (isset($_GET['id'])) {
            $idFilm = $_GET['id'];
            $sql = "SELECT * FROM film WHERE id_film = ?";
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute([$idFilm]);
            $film = $stmt->fetch();
            
            require 'view/film/editFilm.php';
        } else {
            // Redirection  si l'ID n'est pas troiuver
            header('Location: index.php?action=listFilms');
        }
    }
    

    public function updateFilm() {
        if (isset($_GET['id'])) {
            $idFilm = $_GET['id'];
    
            // Récupération des données du formulaire
            $title = $_POST['title'];
            $date_sortie = $_POST['date_sortie'];
            $duree = $_POST['duree'];
            $synopsis = $_POST['synopsis'];
            $note = $_POST['note'];
            $realisateur = $_POST['realisateur'];
    
            // Requête pour mettre à jour les données dans la table film
            $sql = "UPDATE film SET title = ?, date_release = ?, duration = ?, synopsis = ?, note = ?, realisateur = ? WHERE id_film = ?";
            
            // Préparation et exécution de la requête
            $stmt = $this->bdd->prepare($sql);
            $stmt->execute([$title, $date_sortie, $duree, $synopsis, $note, $realisateur, $idFilm]);
            
            header('Location: index.php?action=detailsFilm&id=' . $idFilm);
        } 
    }
    
    

    
}
