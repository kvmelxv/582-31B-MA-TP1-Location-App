<?php

require_once('classes/appartement.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $appartement = new Appartement;

    $data = [
        'Description' => $_POST['description'], 
        'Adresse' => $_POST['adresse'],
        'NombreChambre' => $_POST['NombreChambre'],
        'NombreSalleDeBain' => $_POST['NombreSalleDeBain'],
        'Surface' => $_POST['surface'],
        'Prix' => $_POST['prix']
    ];

    $id = $_POST['idAppartement'];

    // Mettre à jour les données de l'appartement
    $appartement->update('appartement', $data, 'idAppartement');

    // Rediriger l'utilisateur vers la liste des appartements
    header('Location: appart-index.php');
    exit;
} else {
    // Si le formulaire n'a pas été soumis, redirigez vers une autre page
    header('Location: appart-update.php');
    exit;
}

?>