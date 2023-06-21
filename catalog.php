
<?php
session_start();
require "db.php";

// Проверяем, является ли пользователь администратором
$isAdministrator = isset($_SESSION['user']) && $_SESSION['user']['flag'] > 0;

if ($isAdministrator) {
    // Редирект администратора на страницу администрирования
    header("Location: admin.php");
    exit();
}
// Проверяем, авторизован ли пользователь
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
$postquery = mysqli_query($link, "SELECT * FROM post INNER JOIN user ON `post`.`user_id` = `user`.`id`");
$tovarquery = mysqli_query($link, "SELECT * FROM tovar");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
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
                <a href="aboutus.php">Где мы</a>
                <a href="exit.php">Выход</a>
            <?php else : ?>
                <!-- Навигация для незарегистрированных пользователей -->
                <a href="index.php">Главная</a>
                <a href="auto.php">Авторизация</a>
                <a href="reg.php">Регистрация</a>
                <a href="aboutus.php">Где мы</a>
                <a href="index.php">Каталог</a>
            <?php endif; ?>
            <?php if (isset($user['login'])) : ?>
                <!-- Вывод имени пользователя в шапке сайта -->
                <a class="welcome">Добро пожаловать: <?php echo $user['login']; ?></a>
            <?php endif; ?>
       
    </nav>
</header>

<div class="wrapper">
<h1>Товары</h1>
<div class="flex">
    <?php while ($tovar = mysqli_fetch_assoc($tovarquery)) : ?>
        <div class="tovar">
            <img src="./img/3.jpg" alt="Product Image">
            <a href="tovar.php?id=<?= $tovar['id'] ?>" class="button"><?= $tovar['name'] ?></a>
            <p>Описание - <?= $tovar['description'] ?></p>
            <p class="price">Цена: 35 рублей</p>
        </div>
    <?php endwhile; ?>
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
</html>
