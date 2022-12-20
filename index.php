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
            <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Categorie</th>
                    <th>Quantitée</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($result as $produit){
                    ?>
                    <tr>
                        <td><?= $produit['id'] ?></td>
                        <td><?= $produit['name'] ?></td>
                        <td><?= $produit['description'] ?></td>
                        <td><?= $produit['price'] ?></td>
                        <td><?= $produit['category'] ?></td>
                        <td><?= $produit['quantity'] ?></td>
                        <td></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
    </section>
    </div>
</main>

<?php require_once('view/footer.view.php') ?>