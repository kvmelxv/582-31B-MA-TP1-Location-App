<?php
require_once('classes/Utilisateur.php');
$utilisateur = new Utilisateur;
$type = $utilisateur->select('type', 'type');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/utilis-ajout.css">
    <title>Ajouter un client</title>
</head>
<body>
    <h1>Ajouter un nouveau utilisateur</h1>
    <form action="" method="post">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="adresse">
        <label>Téléphone</label>
        <input type="text" name="telephone">
        <label>Courriel</label>
        <input type="email" name="courriel">
        <label>Type d'utilisateur</label>
        <select name="nom_de_votre_select">
            <?php foreach ($type as $row) : ?>
            <option><?= $row['type'] ?></option>
            <?php endforeach; ?>
        </select>
        <input class="btn" type="submit" value="save">
    </form>
    <a href="utilisateur-index.php">Retourner a la liste des utilisaters</a>
    
</body>
</html>