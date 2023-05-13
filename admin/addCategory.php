<?php
include("../functions/connect.php");

$name = $_GET['name'];

if (empty($name)) {
    $_SESSION['result'] = "Введите название категории.";
} else {
    $query = "INSERT INTO `categories` (`id`, `name`) VALUES (NULL, '$name')";
    $res = $con->query($query);
    $_SESSION['result'] = "Категория добавлена!";
}
header("location: ./categories.php");
