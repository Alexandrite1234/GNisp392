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
                <a href="catalog.php">Каталог</a>
                <a href="aboutus.php">Где мы</a>
            <?php endif; ?>
            <?php if (isset($user['login'])) : ?>
                <!-- Вывод имени пользователя в шапке сайта -->
                <a class="welcome">Добро пожаловать: <?php echo $user['login']; ?></a>
            <?php endif; ?>
       
    </nav>
</header>


<div id="main">
        <div class="intro">
          <h2>Прекрасное ассорти пончиков!</h2>
          <img src="img/gleb3.jpg" alt="">
        </div>
        <div class="text">
          <span>Это идеальное сочетание пышности, мягкости, жирности.
Это выгодный размер самого пончика как для меня, чтобы я мог платить аренду, зарплату, другие расходы и быть в прибыли, так и для вас 
Пытался добиться пышности и мягкости. Чтобы Вы в любой момент могли приехать и пончик был идеальный. СЧИТАЮ У МЕНЯ ЭТО ПОЛУЧИЛИСЬ.</span>
        
        </div>
      </div>
    
      <div id="overview">
        <h2>С 19:00 до 20:00 </h2>
        <h4>пончики со скидкой</h4>
    
        <div class="img">
          <img src="img/p6.jpg" alt="">
          <span>Мягкие</span>
        </div>
        <div class="img">
          <img src="img/p5.jpg" alt="">
          <span>Вкусные</span>
        </div>
        <div class="img">
          <img src="img/42r.jpg" alt="">
          <span>Мороженное по 42р</span>
        </div>
        <div class="img">
          <img src="img/gleb.jpg" alt="">
          <span>Готовим сами</span>
        </div>
        <div class="img">
          <img src="img/p1.jpg" alt="">
          <span>Быстрая доставка</span>
        </div>
        <div class="img">
          <img src="img/p2.jpg" alt="">
          <span>Лучшее обслуживание</span>
        </div>
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

