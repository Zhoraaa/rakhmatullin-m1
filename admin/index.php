<?php
include("../functions/admNav.php");

include("../functions/getProducts.php");
include("../functions/getCategories.php");

// Подготовка данных для редактирования
if (!empty($_GET['edit'])) {
    $query = "SELECT * FROM `products` WHERE `id`=" . $_GET['edit'];
    $res = $con->query($query);
    $edit = $res->fetch_assoc();
}

// Уточнение инструмента
$toolOf = (!empty($_GET['edit'])) ? "редактирования" : "добавления";
?>
<main id="admTool">
    <!-- Инструментарий добавления товаров -->
    <div id="form-product">
        <form action="./addProduct.php" enctype="multipart/form-data" method="post">
            <h2>Инструмент <?= $toolOf ?></h2>
            <div><input type="text" name="name" placeholder="Наименование" value="<?= $edit['name'] ?>" required></div>
            <div><input type="file" name="img"></div>
            <div><input type="text" name="color" placeholder="Цвет" value="<?= $edit['color'] ?>" required></div>
            <div><input type="text" name="country" placeholder="Страна-производитель" value="<?= $edit['country'] ?>" required></div>
            <div><input type="number" name="cost" min="25" max="15000" placeholder="Цена" value="<?= $edit['cost'] ?>" required></div>
            <div><select name="type" id="" required>
                    <?php
                    foreach ($categories as $category) {
                        $isSelected = ($edit['type'] = $category) ? "selected" : null;
                    ?>
                        <option value="<?= $category['id'] ?>" <?= $isSelected ?>><?= $category['name'] ?></option>
                    <?php
                    }
                    ?>
                </select></div>
            <input type="text" style="display: none" value="<?= $edit['id'] ?>" name="id" id="">
            <input type="submit" value="Сохранить">
            <?php
            if (!empty($_GET['edit'])) { ?>
            <a href="./" class="white-btn">Отмена</a>
            <?php
            }
            ?>
        </form>
    </div>
    <!-- Все товары -->
    <div id="list">
        <?php
        if (empty($products)) {
            echo "У вас ещё нет товаров, используйте панель справа для их добавления.";
        }
        foreach ($products as $product) {
        ?>
            <div>
                <span><?= $product['name'] ?></span>
                <a href="?edit=<?= $product['id'] ?>">🖍</a>
                <a href="./delProduct.php?product=<?= $product['id'] ?>">×</a>
            </div>
        <?php
        }
        ?>
    </div>
</main>