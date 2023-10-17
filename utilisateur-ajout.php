<?php

require_once('classes/Utilisateur.php');
$utilisateur = new Utilisateur;
$type = $utilisateur->select('type', 'type');

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $data = array(
        'username' => $_POST['username'],
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'telephone' => $_POST['telephone'],
        'courriel' => $_POST['courriel'],
        'Type_idType' => $_POST['Type_idType']
    );

    if ($utilisateur->validateFormData($data)) {
        if ($utilisateur->insert('utilisateur', $data)) {
            header('Location: utilisateur-index.php');
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
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <h1>Ajouter un nouvel utilisateur</h1>
    <?php if (isset($errorMessage)) : ?>
        <div class="error-message">
            <?= $errorMessage ?>
        </div>
    <?php endif; ?>
    <form action="" method="post">
        <label>Username</label>
        <input type="text" name="username">
        <label>Nom</label>
        <input type="text" name="nom">
        <label>Prénom</label>
        <input type="text" name="prenom">
        <label>Téléphone</label>
        <input type="text" name="telephone">
        <label>Courriel</label>
        <input type="email" name="courriel">
        <label>Type d'utilisateur</label>
        <select name="Type_idType">
            <?php foreach ($type as $row) : ?>
            <option value="<?php echo $row['idType']; ?>"><?php echo $row['type']; ?></option>
            <?php endforeach; ?>
        </select>
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="utilisateur-index.php">Retourner a la liste des utilisaters</a></button>
     
</body>
</html>