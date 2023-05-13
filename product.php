<?php
include("./pageBase.php");
include("./functions/connect.php");

$res = $con->query("SELECT * FROM `products` WHERE `id`=" . $_GET['product']);
$product = mysqli_fetch_assoc($res);
?>

<main>
  <div id="productImg">
    <img src="../img/product/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
  </div>
  <div id="productInfo">
    <h3><?= $product['name'] ?></h3>
    <p>Цвет: <?= $product['color'] ?></p>
    <p>Производство: <?= $product['country'] ?></p>
    <p><?= $product['cost'] ?> ₽</p>
  </div>
</main>