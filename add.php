<?php
session_start();

if($_POST){
    if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price']) && isset($_POST['category']) && !empty($_POST['category']) && isset($_POST['quantity']) && !empty($_POST['quantity'])){
        require_once('connect.php');
        $name = strip_tags($_POST['name']);
        $price = strip_tags($_POST['price']);
        $category = strip_tags($_POST['category']);
        $quantity = strip_tags($_POST['quantity']);

        $sql = 'INSERT INTO `products` (`name`, `price`, `category`, `quantity`) VALUES (:nom, :prix, :categorie :quantite);';

        $query = $db->prepare($sql);

        $query->bindValue(':nom', $name, PDO::PARAM_STR);
        $query->bindValue(':prix', $price, PDO::PARAM_INT);
        $query->bindValue(':categorie', $category, PDO::PARAM_STR);
        $query->bindValue(':quantite', $quantity, PDO::PARAM_INT);

        $query->execute();

        $_SESSION['message'] = "Produit ajouté";
        require_once('close.php');

        header('Location: index.php');
    }else{
        $_SESSION['erreur'] = "Le formulaire est incomplet";
    }
}

require_once('view/base.view.php');
?>

<main class="contrainer">
    <div class="row">
        <section class="col-12">
        <?php
                if(!empty($_SESSION['erreur'])){
                    echo '<div class="alert alert-danger" role="alert">'
                    . $_SESSION['erreur'] .
                  '</div>';
                  $_SESSION['erreur'] = "";
                }
            ?>
            <h1>Ajouter un produit</h1>
            <form method="POST">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="number" id="price" name="price" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">Catégorie</label>
                    <input type="text" id="category" name="category" class="form-control">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantitée</label>
                    <input type="number" id="quantity" name="quantity" class="form-control">
                </div>
                <button class="btn btn-primary">Ajouter</button>
            </form>
        </section>
    </div>
</main>