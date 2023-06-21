

<?php
session_start();
require "db.php";
$idtovar = $_GET['id'];
$tovarquery = mysqli_query($link, "SELECT * FROM tovar WHERE id = '$idtovar'");
$tovar = mysqli_fetch_assoc($tovarquery);
$postquery = mysqli_query($link,"SELECT * FROM post INNER JOIN tovar ON post.tovar_id = tovar.id WHERE tovar.id = '$idtovar'");
// Проверяем, авторизован ли пользователь
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Пончики - Главная</title>
</head>
<body>
<header>
    <div class="logo">ПОНЧИКИотГЛЕБА</div>
    <nav>
        <?php if (isset($user)) : ?>
            <!-- Навигация для зарегистрированных пользователей -->
            <a href="kabinet.php">Личный кабинет</a>
            <a href="index.php">Главная</a>
            <a href="catalog.php">Каталог</a>
            <a href="basket.php">Корзина</a>
            <a href="exit.php">Выход</a>
        <?php else : ?>
            <!-- Навигация для незарегистрированных пользователей -->
            <a href="auto.php">Авторизация</a>
            <a href="reg.php">Регистрация</a>
            <a href="catalog.php">Каталог</a>
            <a href="aboutus.php">Где мы</a>
        <?php endif; ?>
        <?php if (isset($user['login'])) : ?>
            <!-- Вывод имени пользователя в шапке сайта -->
            <a class="welcome">Добро пожаловать: <?php echo $user['login']; ?></a>
        <?php endif; ?>
    </nav>
</header>
<body>
    
<div class="wrapper">
    <div class="one_tovar">
        <h1 align="center"><?=$tovar['name']?></h1>
        <h4>Описание товара:</h4>
        <p id="description"><?=$tovar['description']?></p>
        <form action="basketAction.php" method="POST">
            <input type="hidden" value="<?=$tovar['id']?>" name="id">
            <button type="submit" name="submit_basket" id="basket_submit">В корзину</button>
        </form>
    </div>

    <div class="postt">
        <?php while($post = mysqli_fetch_assoc($postquery)): ?>
            <p>Название поста: <?=$post['post_text']  ?></p>
            <p>Содержание поста: <?=$post['post_description']  ?></p> <br>
        <?php endwhile ?>
    </div>
    <div class="post_create">
        <?php require "post.php" ?>
    </div>
</div>

<footer>
    <p>Номер телефона: +7 (123) 456-78-90</p>
    <div class="social-icons">
        <a href="#"><img src="img/vk.png" alt="Facebook"></a>
        <a href="#"><img src="img/inst.png" alt="Twitter"></a>
        <a href="#"><img src="img/odnoklassniki.png" alt="Instagram"></a>
    </div>
</footer>
</body>
<script src="mail.js"></script>
</html>
