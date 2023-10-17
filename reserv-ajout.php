<?php

require_once('classes/reservation.php');
require_once('classes/appartement.php');
require_once('classes/utilisateur.php');

$reservation = new Reservation;
$appartement = new Appartement;
$utilisateur = new Utilisateur;

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = array(
        'DateDebut' => $_POST['DateDebut'],
        'DateFin' => $_POST['DateFin'],
        'Utilisateur_Username' => $_POST['Utilisateur_Username'],
        'Appartement_idAppartement' => $_POST['Appartement_idAppartement'],
    
    );

    if ($reservation->validateFormData($data)) {
        if ($reservation->insert('reservation', $data)) {
            header('Location: reserv-index.php');
            exit;
        } else {
            $errorMessage = "Erreur lors de l'insertion en base de données.";
        }
    } else {
        $errorMessage = "Tous les champs obligatoires doivent être remplis.";
    }
}

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
    <h1>Ajouter une nouvelle réservation</h1>
    <?php if (isset($errorMessage)) : ?>
        <div class="error-message">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <label>Date de début</label>
        <input type="date" name="DateDebut">
        <label>Date de fin</label>
        <input type="date" name="DateFin">
        <label>Locataire</label>
        <select name="Utilisateur_Username">
        <?php
        $usersWithType1 = $utilisateur->selectUsersWithType(1);
        foreach ($usersWithType1 as $row) {
            $username = $row['Username'];
            echo "<option value='$username'>$username</option>";
        }
        ?>
        </select>
        <label>Appartement</label>
        <select name="Appartement_idAppartement">
            <?php 
            $appartements = $appartement->select('appartement', 'Description');
            foreach ($appartements as $row) {
                $description = $row['Description'];
                $idAppartement = $row['idAppartement'];
                echo "<option value='$idAppartement'>$description</option>";
            }
            ?>
        </select>
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="reserv-index.php">Retourner a la liste des réservation</a></button>
     
</body>
</html>