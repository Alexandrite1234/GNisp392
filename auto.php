<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Мой сайт</title>
    <link rel="stylesheet" href="style3.css">
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
<a href="catalog.html">Каталог</a> |
    <a href="exit.php">Выход</a>
<?endif ?>
            
        </nav>
    </header>
    
    <form action="loginAction.php" method="POST">
      <h2>Регистрация</h2>
      <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" name = "login"required placeholder="Введите логин или e-mail">
      </div>
    
      </div>
      <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" name ="password" required placeholder="Введите пароль">
      </div>
    
      </div>
      <button type="submit" name="submit_login">Войти</button>
    </form>
      

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