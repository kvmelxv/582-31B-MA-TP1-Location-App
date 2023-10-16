<?php
require_once('classes/Utilisateur.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $utilisateur = new Utilisateur;
    $utilisateur->delete('Utilisateur', $username);
    
    // Redirigez l'utilisateur vers une autre page après la suppression
    header('Location: utilisateur-index.php');
    exit;
} else {
    echo "Username de l'utilisateur est manquant. Impossible de supprimer.";
}
?>