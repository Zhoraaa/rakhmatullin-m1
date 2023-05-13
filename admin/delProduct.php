<?php
include("../functions/connect.php");

$res = $con->query("DELETE FROM products WHERE `products`.`id`=" . $_GET['product']);
$_SESSION['result'] = "Товар удалён.";
header("location: ./");
