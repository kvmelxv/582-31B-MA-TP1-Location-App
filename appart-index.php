<?php

require('classe/CRUD.php');
$crud = new Crud;
$appart = $crud->select('appartement', 'prix', 'ASC')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Liste d'appartement</title>
</head>
<body>
    <h1 class="titre-utilis">Liste des appartements</h1>
    <table>
        <tr>
            <th>Description</th>
            <th>Adresse</th>
            <th>Nombre de chambre</th>
            <th>Nombre de salle de bain</th>
            <th>Surface</th>
            <th>Prix/ mois</th> 
            <th>Propriétaire</th>
            <th>Action</th>
        </tr>

        <?php
        foreach($appart as $row){
        ?>
            <tr>
                <td><?= $row['Description']?></a></td>
                <td><?= $row['Adresse']?></td>
                <td><?= $row['NombreChambre']?></a></td>
                <td><?= $row['NombreSalleDeBain']?></td>
                <td><?= $row['Surface']?></td>
                <td><?= $row['Prix']?> $</td>
                <td><?= $row['Utilisateur_Username']?></td>
                <td>
                    <div class="bloc-action">
                        <form class="form-action" action="appart-supp.php" method="GET">
                            <input type="hidden" name="idAppartement" value="<?= $row['idAppartement'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                        <form class="form-action" action="appart-update.php" method="GET">
                            <input type="hidden" name="idAppartement" value="<?= $row['idAppartement'] ?>">
                            <input type="submit" value="Modifier">
                        </form>
                    </div>   
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <div>
    <button><a href="index.php">Page d'acceuil</a></button>
    <button><a href="appart-ajout.php">Ajouter un appartement</a></button>
    </div>
 
</body>
</html>