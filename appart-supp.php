<?php
require_once('classes/appartement.php');

if (isset($_GET['idAppartement'])) {
    $id = $_GET['idAppartement'];
    $appartement = new Appartement;
    $appartement->delete('appartement', $id);
    
    header('Location: appart-index.php');
    exit;
}

?>
