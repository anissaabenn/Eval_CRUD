<?php require_once('view/base.view.php');
require_once('connect.php');

$sql = 'SELECT * FROM `products`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);
require_once('close.php');
?>

<main class="contrainer">
    <div class="row">
        <section class="col-12">
            <h1>Liste des produits</h1>
            <table class="table text-center">
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Quantitée</th>
                    <th colspan="2">Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $produit){
                    ?>
                    <tr>
                        <td><?= $produit['id'] ?></td>
                        <td><?= $produit['name'] ?></td>
                        <td><?= $produit['price'] ?></td>
                        <td><?= $produit['category'] ?></td>
                        <td><?= $produit['quantity'] ?></td>
                        <td><a href="details.php?id=<?= $produit['id'] ?>">Voir</a></td>
                        <td><a href="update.php?id=<?= $produit['id'] ?>">Modifier</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            <a href="add.php" class="btn btn-secondary">Ajouter un produit</a>
    </section>
    </div>
</main>

<?php require_once('view/footer.view.php') ?>