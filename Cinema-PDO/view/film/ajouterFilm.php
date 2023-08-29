<?php
ob_start();
?>

<div>
    <div>
        <div>
            <form action="http://localhost/Cinema-PDO/index.php/index.php?action=addFilm" method="POST" enctype="multipart/form-data">
                <div>
                    <label for="filmTitle">Titre du film</label>
                    <input type="text" id="filmTitle" name='title'>
                </div>
                <div>
                    <label for="filmDate">Date de sortie du film</label>
                    <input type="date" id="filmDate" name='date_sortie'>
                </div>
                <div>
                    <label for="filmDuration">Durée du film</label>
                    <input type="number" id="filmDuration" name='duree'>
                </div>
                <div>
                    <label for="filmSynopsis">Synopsis du film</label>
                    <input type="text" id="filmSynopsis" name='synopsis'>
                </div>
                <div>
                    <label for="filmNote">Note du film</label>
                    <input type="number" id="filmNote" name='note' step=".01">
                </div>
                <div>
                    <label for="filmDirector">Réalisateur du film</label>
                    <input id="filmDirector" name='realisateur'>
                    
                </div>
                <button type="submit">Ajouter</button>
            </form>
        </div>
    </div>
</div>
