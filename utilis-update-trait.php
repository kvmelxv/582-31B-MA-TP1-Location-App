<?php

require_once('classe/CRUD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new Crud;

    $data = [
        'Username' => $_POST['username'], 
        'Nom' => $_POST['nom'],
        'Prenom' => $_POST['prenom'],
        'Telephone' => $_POST['telephone'],
        'Courriel' => $_POST['courriel'],
        'Type_idType' => $_POST['Type_idType']
    ];

    $username = $_POST['username'];

    // Mettre à jour les données de l'utilisateur
    $crud->update('Utilisateur', $data, 'Username');

    // Rediriger l'utilisateur vers la liste des utilisateurs
    header('Location: utilisateur-index.php');
    exit;
} else {
    // Si le formulaire n'a pas été soumis, redirigez vers une autre page
    header('Location: modifier-utilisateur.php');
    exit;
}

?>