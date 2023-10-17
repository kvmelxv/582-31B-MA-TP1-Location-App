<?php

require_once('classe/CRUD.php');
$crud = new Crud;

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = array(
        'description' => $_POST['description'],
        'adresse' => $_POST['adresse'],
        'NombreChambre' => $_POST['NombreChambre'],
        'NombreSalleDeBain' => $_POST['NombreSalleDeBain'],
        'surface' => $_POST['surface'],
        'prix' => $_POST['prix'],
        'Utilisateur_Username' => $_POST['Utilisateur_Username'],

    );

    if ($crud->validateFormDataApp($data)) {
        if ($crud->insert('appartement', $data)) {
            header('Location: appart-index.php');
            exit;
        } else {
            $errorMessage = "Erreur lors de l'insertion en base de données.";
        }
    } else {
        $errorMessage = "Tous les champs obligatoires doivent être remplis.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Ajouter un appartement</title>
</head>
<body>
    <h1>Ajouter un nouvel appartement</h1>
    <?php if (isset($errorMessage)) : ?>
        <div class="error-message">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <form action="" method="POST">
        <label>Description</label>
        <input type="text" name="description">
        <label>Adresse</label>
        <input type="text" name="adresse">
        <label>Nombre de chambre</label>
        <input type="number" name="NombreChambre">
        <label>Nombre de salle de bain</label>
        <input type="number" name="NombreSalleDeBain">
        <label>surface</label>
        <input type="number" name="surface">
        <label>Prix</label>
        <input type="number" name="prix">
        <label>Propriétaire</label>
        <input type="text" name="Utilisateur_Username">
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="appart-index.php">Retourner a la liste des appartements</a></button>
     
</body>
</html>