<?php
require_once('classes/Utilisateur.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $utilisateur = new Utilisateur;
    $utilisateur->delete('Utilisateur', $username);
    
    header('Location: utilisateur-index.php');
    exit;
}

?>