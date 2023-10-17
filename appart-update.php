<?php

require_once('classes/appartement.php');

if (isset($_GET['idAppartement'])) {
    $id = $_GET['idAppartement'];

    $appartement = new Appartement;
    $appartUpDate = $appartement->selectId('appartement', $id, 'idAppartement');

    if (!empty($appartUpDate)) {
        $description = $appartUpDate['Description'];
        $adresse = $appartUpDate['Adresse'];
        $NombreChambre = $appartUpDate['NombreChambre'];
        $NombreSalleDeBain = $appartUpDate['NombreSalleDeBain'];
        $surface = $appartUpDate['Surface'];
        $prix = $appartUpDate['Prix'];
    } else {

        header('Location: appart-index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Modifier un appartement</title>
</head>
<body>
    <h1>Modifier un appartement</h1>

    <form action="appart-update-trait.php" method="post">
        <label>Description</label>
        <input type="text" name="description" value="<?= $description ?>">
        <label>Adresse</label>
        <input type="text" name="adresse" value="<?= $adresse ?>">
        <label>Nombre de chambre</label>
        <input type="number" name="NombreDeChambre" value="<?= $NombreChambre ?>">
        <label>Nombre de salle de bain</label>
        <input type="number" name="NombreDeSalleDeBain" value="<?= $NombreSalleDeBain ?>">
        <label>Surface</label>
        <input type="number" name="surface" value="<?= $surface ?>">
        <label>Prix</label>
        <input type="number" name="prix" value="<?= $prix ?>">
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="appart-index.php">Retourner a la liste des appartements</a></button>
     
</body>
</html>