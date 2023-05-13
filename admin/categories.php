<?php
include("../functions/admNav.php");

include("../functions/getCategories.php");
?>
<main id="admTool">
    <div id="form-category">
        <form action="./addCategory.php">
            <h2>Инструмент редактирования</h2>
            <div><input type="text" name="name" placeholder="Имя категории" required></div>
            <input type="submit" value="Сохранить">
        </form>
    </div>
    <div id="list">
        <?php
        if (empty($categories)) {
            echo "У вас ещё нет категорий товаров, используйте панель справа для их добавления.";
        }
        foreach ($categories as $category) {
        ?>
            <div><span><?= $category['name'] ?></span><a href="./delCategory.php?category=<?= $category['id'] ?>">×</a></div>
        <?php
        }
        ?>
    </div>
</main>