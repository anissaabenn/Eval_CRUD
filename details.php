<?php
//Démarrer une session
session_start();

//Est-ce que l'ID existe & n'est pas vide dans l'URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    require_once('connect.php');
    //on nettoie l'id envoyé
    $id = strip_tags($_GET['id']);
    $sql = 'SELECT * `products` WHERE `id` = :id;';

    //on prépare la requête
    $query = $db->prepare($sql);

    //on accroche les paramètres
    $query->bindValue(':id', $id, PDO::PARAM_INT);

    //on exécute la requête
    $query->execute();

    //on recup le produit
    $produit = $query->fetch();

    //verifie si produit existe FONCTIONNE PAS
    // if (!$produit) {
    //     $_SESSION['erreur'] = "Cet id n'existe pas";
    //     header('Location: index.php');
    // }
} else {
    $_SESSION['erreur'] = "URL invalide";
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>

<body>
                <h1>Détails du produit <?= $products['name'] == true ?> </h1>
</body>

</html>