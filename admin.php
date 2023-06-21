<?php 
session_start();
if($_SESSION['user']['flag']==0 ){
    header("Location: index.php");
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
    <div class="logo">АДМИНКА</div>
    <nav>
                <!-- Навигация для зарегистрированных пользователей -->
                <a href="admin_basket.php">Просмотр заказов</a>
                <a href="postApp.php">Управление каталогом</a>
                <a href="kabinet.php">Личный кабинет</a>
                <a href="index.php">Главная</a>
                <a href="catalog.php">Каталог</a>
                <a href="basket.php">Корзина</a>
                <a href="aboutus.php">Где мы</a>
                <a href="exit.php">Выход</a>
    </nav>
</header>
<div class="wrapper">
    <h1>Добропожаловать в панель администратора</h1>
</div>
<footer>
        <p>Номер телефона: +7 (913) 601-25-01</p>
        <div class="social-icons">
            <a href="https://vk.com/club218529547"><img src="img/vk.png" alt="vk"></a>
            <a href="#"><img src="img/inst.png" alt="Twitter"></a>
            <a href="#"><img src="img/odnoklassniki.png" alt="Instagram"></a>
        </div>
    </footer>
    
</body>
</html>
