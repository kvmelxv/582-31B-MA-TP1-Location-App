<?php

require_once('classes/reservation.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $reservation = new Reservation;
    $reservationUpDate = $reservation->selectId('reservation', $id, 'id');

    if (!empty($reservationUpDate)) {
        $dateDebut = $reservationUpDate['DateDebut'];
        $dateFin = $reservationUpDate['DateFin'];
    } else {

        header('Location: appart-index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Modification d'une réservation</title>
</head>
<body>
    <h1>Modifier une réservation</h1>

    <form action="reserv-update-trait.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label>Date de début</label>
        <input type="date" name="DateDebut" value="<?= $dateDebut ?>">
        <label>Date de fin</label>
        <input type="date" name="DateFin" value="<?= $dateFin ?>">
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="reserv-index.php">Retourner a la liste des réservation</a></button>
     
</body>
</html>