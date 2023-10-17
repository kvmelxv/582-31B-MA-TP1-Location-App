<?php
require_once('classes/reservation.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $reservation = new Reservation;
    $reservation->delete('reservation', $id);
    
    header('Location: reserv-index.php');
    exit;
}

?>