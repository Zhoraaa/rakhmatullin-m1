<?php
$nav = [
    "" => "О нас",
    "catalogue.php" => "Каталог",
    "find-us.php" => "Где нас найти?",
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicHouse</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav>
        <div class="logo"></div>
        <div class="links">
        <?php 
            foreach ($nav as $link => $name) {
                ?>
                <a href="../<?=$link?>"><?=$name?></a>
                <?php
            }
            session_start();
            if ($_SESSION['role'] == 1) {
                ?>
                <a href="/admin">Админ-панель</a>
                <?php
            }
            ?>
        </div>
        <div class="authlinks">
            <?php
            if (!isset($_COOKIE['user'])) {
                ?>
                <a href="../account/signIn.php">Sign in</a>
                <a href="../account/signUp.php">Sign up</a>
                <?php
            } else {
                ?>
                <a href="../account/logOut.php">Log out</a>
                <?php
            }
            ?>
        </div>
    </nav>