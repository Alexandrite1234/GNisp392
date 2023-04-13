<?php
session_start();
require "db.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">DONUTUS</div>
        <nav>
            <a href="index.php">О нас</a> |
            <? if(!isset($_SESSION['user'])):?>
    <a href="auto.php">Авторизация</a>
    <a href="reg.php">Регистрация</a>
<? else:?>
<a href="catalog.php">Каталог</a> |
    <a href="exit.php">Выход</a>
<?endif ?>
            
        </nav>
    </header>
    
    <div id="main">
        <div class="intro">
          <h2>Наши услуги помогут вам!</h2>
          <span>Большой выбор пончиков, с разными вкусами</span>
        </div>
        <div class="text">
          <span>Пончики - это популярное лакомство, которое любят многие. Они могут быть различных форм и размеров, с разнообразными начинками и глазурями. Пончики идеально подходят для завтрака или перекуса в течение дня. Они могут быть как сладкими, так и солеными, и подходят для любого случая.</span>
          <img src="img/4.jpg" alt="">
        </div>
      </div>
    
      <div id="overview">
        <h2>Преимущества</h2>
        <h4>с нами все проще</h4>
    
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Отлчиное обслуживание</span>
        </div>
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Быстрая доставка</span>
        </div>
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Отлчиное обслуживание</span>
        </div>
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Отлчиное обслуживание</span>
        </div>
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Отлчиное обслуживание</span>
        </div>
        <div class="img">
          <img src="img/2.jpg" alt="">
          <span>Отлчиное обслуживание</span>
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