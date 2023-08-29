

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1><?php echo $film['title']; ?></h1>
<img src="path_to_image/<?php echo $film['picture']; ?>" alt="<?php echo $film['title']; ?>">
<p>Date de sortie: <?php echo $film['date_release']; ?></p>
<p>Durée: <?php echo $film['duration']; ?> minutes</p>
<p>Synopsis: <?php echo $film['synopsis']; ?></p>



<!--modif-->
<a href="index.php?action=editFilm&id=<?= $film['id_film'] ?>"><button>Modifier le film</button></a>

<!---suprimer-->
<a href="index.php?action=deleteFilm&id=<?= $film['id_film'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce film ?');" class="btn btn-danger"><button>Supprimer le film</button></a>

</body>
</html>


