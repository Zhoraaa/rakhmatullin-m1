<?php
include("../pageBase.php");
include("../functions/connect.php");
include("../functions/alert.php");

// Дополнительная мера безопасности 
if ($user['role'] != 1) {
    $_SESSION['result'] = "Вы не являетесь администратором.";
    header('Location: /');
}
$admNav = [
    "" => "Товары",
    "categories.php" => "Категории",
    "orders.php" => "Заказы",
];
?>
<nav id="admNav">
    <?php
    foreach ($admNav as $link => $name) {
    ?>
        <a href="./<?= $link ?>"><?= $name ?></a>
    <?
    }
    ?>
</nav>