<?php
include("../functions/connect.php");

// Проверка категории
$query = "SELECT * FROM `products` WHERE `type`=" . $_GET['category'];
$res = $con->query($query);
$check = $res->fetch_all(MYSQLI_ASSOC);

if (empty($check)) :

  $res = $con->query("DELETE FROM categories WHERE `categories`.`id`=" . $_GET['category']);
  $_SESSION['result'] = "Категория удалена.";

else :

  $_SESSION['result'] = "Категория не может быть удалена, пока она задействована в товарах.<br><br>Категория задействована в товарах:";

  foreach ($check as $haveCategory) {
    $_SESSION['result'] .= "<br>- ".$haveCategory['name'].";";
  }

endif;
header("location: ./categories.php");
