<?php
include("../functions/connect.php");

$name = $_POST['name'];
$img = $_FILES['img']['name'];
$color = $_POST['color'];
$country = $_POST['country'];
$cost = $_POST['cost'];
$type = $_POST['type'];

$moveTo = "../img/product/" . $img;

if (empty($_POST['id'])) {
  if (!empty($img)) {
    // Добавляем изображение
    move_uploaded_file($_FILES['img']['tmp_name'], $moveTo);

    // Запрос на добавление нового товара
    $query = "INSERT INTO `products` (`id`, `name`, `img`, `color`, `country`, `cost`, `type`) 
    VALUES (NULL, '$name', '$img', '$color', '$country', '$cost', '$type')";
    $res = $con->query($query);
    $_SESSION['result'] = "Товар добавлен.";
  } else {
    $_SESSION['result'] = "Добавьте фото!";
  }
} else {
  // Проверка того, насколько нова фотка
  $query = "SELECT * FROM `products`";
  $res = $con->query($query);
  $check = $res->fetch_assoc();

  $changeImg = ($img != $check['img'] && !empty($img)) ? "`img` = '$img'," : null;
  if ($changeImg) {
    move_uploaded_file($_FILES['img']['tmp_name'], $moveTo);
  }

  // Запрос на обновление данных о товаре
  $query = "UPDATE `products` SET  
  `name` = '$name', 
  $changeImg
  `color` = '$color', 
  `country` = '$country', 
  `cost` = '$cost', 
  `type` = '$type' 
  WHERE `products`.`id` = " . $_POST['id'];
  echo $query;

  $res = $con->query($query);
  $_SESSION['result'] = "Товар изменён.";
}

header("location: /admin");
