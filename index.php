<?php require_once('view/base.view.php');
require_once('connect.php');

$sql = 'SELECT * FROM `products`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);
require_once('close.php');
?>

<?php require_once('view/footer.view.php') ?>