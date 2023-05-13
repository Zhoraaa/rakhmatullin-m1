<?php
include("./functions/alert.php");
include("./functions/connect.php");
include("./pageBase.php");

// Достаём товары из БД
$query = "SELECT * FROM `products`";
// Применение фильтров
if (!empty($_GET) && $_GET['category'] != "all") {
    $query .= "WHERE `type`=" . $_GET['category'];
}
$res = $con->query($query);
$products = $res->fetch_all(MYSQLI_ASSOC);

// Достаём категории из БД
include("./functions/getCategories.php");
?>

</nav>
<!-- Фильтры -->
<main>
    <form action="#" class="filter">
        <div><select name="category" id="">
                <option value="all">Все</option>
                <?php
                foreach ($categories as $category) {
                    $isSelected = ($_GET['category'] == $category['id']) ? "selected" : null;
                ?>
                    <option value="<?= $category['id'] ?>" <?= $isSelected ?>>
                        <?= $category['name'] ?>
                    </option>
                <?php
                }
                ?>
            </select></div>
        <input type="submit" value="Применить">
    </form>
    <div id="productList">
        <?php
        foreach ($products as $product) {
        ?>
            <div class="productCard">
                <div class="imgWrapper">
                    <img src="../img/product/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
                </div>
                <div class="descProduct">
                    <h3><?= $product['name'] ?></h3>
                    <p><?= $product['cost']?> ₽</p>
                    <a href="product.php?product=<?= $product['id'] ?>">Подробнее →</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</main>