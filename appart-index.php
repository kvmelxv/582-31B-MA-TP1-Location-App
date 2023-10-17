<?php

require('classes/appartement.php');
$appartement = new Appartement;
$appart = $appartement->select('appartement', 'prix')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Liste de client</title>
</head>
<body>
    <h1 class="titre-utilis">Liste des utilisateurs</h1>
    <table>
        <tr>
            <th>Description</th>
            <th>Adresse</th>
            <th>Nombre de chambre</th>
            <th>Nombre de salle de bain</th>
            <th>Surface</th>
            <th>Prix</th> 
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
                <td><?= $row['Prix']?></td>
                <td>
                    <div class="bloc-action">
                        <form class="form-action" action="utilisateur-supp.php" method="GET">
                            <input type="hidden" name="username" value="<?= $row['Username'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                        <form class="form-action" action="utilisateur-update.php" method="GET">
                            <input type="hidden" name="username" value="<?= $row['Username'] ?>">
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
    <button><a href="utilisateur-ajout.php">Ajouter un appartement</a></button>
 
</body>
</html>