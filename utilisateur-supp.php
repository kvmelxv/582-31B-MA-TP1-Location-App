<?php
require_once('classe/CRUD.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $crud = new Crud;

    // Désactive temporairement les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 0;";
    $crud->exec($sql);

    // Effectue la suppression
    $crud->delete('Utilisateur', $username, 'Username');

    // Réactive les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 1;";
    $crud->exec($sql);
    
    header('Location: utilisateur-index.php');
    exit;
}

?>