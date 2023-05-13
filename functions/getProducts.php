<?php
// Достаём товары из БД
$query = "SELECT * FROM `products`";
$res = $con->query($query);
$products = $res->fetch_all(MYSQLI_ASSOC);

return $products;