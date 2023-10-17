<?php

require_once('classes/reservation.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reservation = new Reservation;

    $data = [
        'DateDebut' => $_POST['DateDebut'], 
        'DateFin' => $_POST['DateFin'],
        'id' => $_POST['id'] // Ajoutez 'id' à $data
    ];

    // Mettre à jour les données de la réservation
    $reservation->update('reservation', $data, 'id'); // Correction de 'resevation' à 'reservation'

    // Rediriger l'utilisateur vers la liste des réservations
    header('Location: reserv-index.php');
    exit;
} else {
    // Si le formulaire n'a pas été soumis, redirigez vers une autre page
    header('Location: reserv-update.php');
    exit;
}
?>