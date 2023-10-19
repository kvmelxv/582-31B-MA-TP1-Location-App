<?php
require_once('classe/CRUD.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $crud = new Crud;

    // Désactive temporairement les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 0;";
    $crud->exec($sql);

    // Effectue la suppression
    $crud->delete('Reservation', $id, 'id');

    // Réactive les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 1;";
    $crud->exec($sql);
    
    header('Location: reserv-index.php');
    exit;
}

?>