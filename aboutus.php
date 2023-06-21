<?php
session_start();
require "db.php";

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
    
    <div id="main">
        <div class="intro">
            <h2>Наш адресс!</h2>
            <img src="https://avatars.mds.yandex.net/get-altay/1899727/2a00000186b7f5b1e1da6507ab47cf7242f1/XXXL" alt="">
        </div>
        <div class="text">
            <span><p>Интернациональная улица, 10/2, Омск</span>
            <span><p>Открыто до 19:00</span>
            <span><p>+7 (913) 601-25-01</span>
        </div>
    </div>
    <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div style="position:relative; overflow:hidden;">
            <a href="https://yandex.ru/maps/org/ponchiki_ot_gleba/47836400324/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Пончики от Глеба</a>
            <a href="https://yandex.ru/maps/66/omsk/category/bakery/184106798/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Пекарня в Омске</a>
            <a href="https://yandex.ru/maps/66/omsk/category/confectionary/184108017/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:28px;">Кондитерская в Омске</a>
            <iframe src="https://yandex.ru/map-widget/v1/?ll=73.365701%2C54.991105&mode=search&oid=47836400324&ol=biz&z=15.33" width="1200" height="600" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
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
