<?php

require_once('classes/Utilisateur.php');

if (isset($_GET['username'])) {
    $username = $_GET['username'];

    $utilisateur = new Utilisateur;
    $types = $utilisateur->select('type', 'type');
    $user = $utilisateur->selectId('Utilisateur', $username, 'Username');

    if (!empty($user)) {
        $nom = $user['Nom'];
        $prenom = $user['Prenom'];
        $telephone = $user['Telephone'];
        $courriel = $user['Courriel'];
        $type = $user['Type_idType'];
    } else {

        header('Location: utilisateur-index.php');
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
    <title>Modifier un utilisateur</title>
</head>
<body>
    <h1>Modifier un utilisateur</h1>

    <form action="utilis-update-trait.php" method="post">
        <label>Username</label>
        <input type="text" name="username" value="<?= $username ?>">
        <label>Nom</label>
        <input type="text" name="nom" value="<?= $nom ?>">
        <label>Prénom</label>
        <input type="text" name="prenom" value="<?= $prenom ?>">
        <label>Téléphone</label>
        <input type="text" name="telephone" value="<?= $telephone ?>">
        <label>Courriel</label>
        <input type="email" name="courriel" value="<?= $courriel ?>">
        <label>Type d'utilisateur</label>
        <select name="Type_idType">
            <?php foreach ($types as $row) : ?>
                <option value="<?php echo $row['idType']; ?>" <?php if ($row['idType'] == $type) echo 'selected="selected"'; ?>><?php echo $row['type']; ?></option>
            <?php endforeach; ?>
        </select>
        <input class="btn" type="submit" value="save">
    </form>
    <button><a href="utilisateur-index.php">Retourner a la liste des utilisateurs</a></button>
     
</body>
</html>