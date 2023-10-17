<?php

require('classes/reservation.php');
$reservation = new Reservation;
$Booking = $reservation->select('reservation', 'DateDebut')

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Reservation</title>
</head>
<body>
    <h1 class="titre-utilis">Liste des reservations</h1>
    <table>
        <tr>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Locataire</th>
            <th>Appartement</th>
            <th>Action</th>
        </tr>

        <?php
        foreach($Booking as $row){
        ?>
            <tr>
                <td><?= $row['DateDebut']?></a></td>
                <td><?= $row['DateFin']?></td>
                <td><?= $row['Utilisateur_Username']?></a></td>
                <td><?= $row['Appartement_idAppartement']?></td>
                <td>
                    <div class="bloc-action">
                        <form class="form-action" action="reserv-supp.php" method="GET">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
                            <input type="submit" value="Supprimer">
                        </form>
                        <form class="form-action" action="reserv-update.php" method="GET">
                            <input type="hidden" name="id" value="<?= $row['id'] ?>">
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
    <button><a href="reserv-ajout.php">Ajouter une reservation</a></button>
    </div>
 
</body>
</html>