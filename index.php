<?php
include("./pageBase.php");
include("./functions/connect.php");
include("./functions/alert.php");

$res = $con->query("SELECT * FROM `products` ORDER BY `cost` ASC LIMIT 5");
$sliderData = $res->fetch_all(MYSQLI_ASSOC);
?>
<main>
    <div id="slider">
        <div id="slider-line">
            <?php
            foreach ($sliderData as $product) {
            ?>
                <img src="../img/product/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
            <?php
            }
            ?>
        </div>
    </div>
</main>