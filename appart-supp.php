<?php
require_once('classe/CRUD.php');

if (isset($_GET['idAppartement'])) {
    $id = $_GET['idAppartement'];
    $crud = new Crud;

    // Désactive temporairement les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 0;";
    $crud->exec($sql);

    // Effectue la suppression
    $crud->delete('Appartement', $id, 'idAppartement');

    // Réactive les contraintes de clé étrangère
    $sql = "SET FOREIGN_KEY_CHECKS = 1;";
    $crud->exec($sql);
    
    header('Location: appart-index.php');
    exit;
}

?>
