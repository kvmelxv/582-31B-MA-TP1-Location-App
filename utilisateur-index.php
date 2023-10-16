<?php

require('classes/utilisateur.php');
$utilisateur = new utilisateur;
$client = $utilisateur->select('utilisateur', 'Nom')

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
            <th>Nom</th>
            <th>Prénom</th>
            <th>Username</th>
            <th>Téléphone</th>
            <th>Courriel</th>
            <th>Type d'utilisateur</th>
            <th>Action</th>    
        </tr>

        <?php
        foreach($client as $row){
        ?>
            <tr>
                <td><?= $row['Nom']?></a></td>
                <td><?= $row['Prenom']?></td>
                <td><?= $row['Username']?></a></td>
                <td><?= $row['Courriel']?></td>
                <td><?= $row['Telephone']?></td>
                <td><?= $row['Type_idType']?></td>
                <td>
                    <form class="form-action" action="utilisateur-supp.php" method="GET">
                        <input type="hidden" name="username" value="<?= $row['Username'] ?>">
                        <input type="submit" value="Supprimer">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <br><br>
    <button><a href="utilisateur-ajout.php">Ajouter un utilisateur</a></button>
 
</body>
</html>


