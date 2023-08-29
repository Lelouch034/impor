<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="index.php?action=updateFilm&id=<?= $film['id_film'] ?>" method="POST">
    <label for="title">Titre du film</label>
    <input type="text" name="title" value="<?= $film['title'] ?>">

    <label for="date_release">Date de sortie</label>
    <input type="date" name="date_release" value="<?= $film['date_release'] ?>">

    <label for="duree">Durée</label>
    <input type="number" name="duree" value="<?= $film['duration'] ?>">

    <label for="synopsis">Synopsis</label>
    <textarea name="synopsis"><?= $film['synopsis'] ?></textarea>

    <label for="note">Note</label>
    <input type="number" step="0.1" name="note" value="<?= $film['note'] ?>">

    <label for="realisateur">Réalisateur</label>
    <input type="text" name="realisateur" value="<?= $film['realisateur'] ?>">

    <button type="submit">Mettre à jour</button>
</form>


</body>
</html>