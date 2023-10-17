<?php

require_once('classe/CRUD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new Crud;

    $data = [
        'DateDebut' => $_POST['DateDebut'], 
        'DateFin' => $_POST['DateFin'],
        'id' => $_POST['id']
    ];

    // Mettre à jour les données de la réservation
    $crud->update('reservation', $data, 'id');

    // Rediriger l'utilisateur vers la liste des réservations
    header('Location: reserv-index.php');
    exit;
} else {
    // Si le formulaire n'a pas été soumis, redirigez vers une autre page
    header('Location: reserv-update.php');
    exit;
}
?>