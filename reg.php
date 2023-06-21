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
    <link rel="stylesheet" href="style3.css">
    <title>Пончики - Главная</title>
</head>
<body>
<header>
    <div class="logo">ПОНЧИКИотГЛЕБА</div>
    <nav>
        
            <?php if (isset($user)) : ?>
                <!-- Навигация для зарегистрированных пользователей -->
                <a href="kabinet.php">Личный кабинет</a>
                <a href="index.php">Каталог</a>
                <a href="basket.php">Корзина</a>
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
<body>

<form action="loginAction.php" method="POST">
    <h2>Регистрация</h2>
    <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" name="login" required placeholder="Введите логин">
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" required placeholder="Введите e-mail">
    </div>
    <div class="form-group">
        <label for="password">Пароль:</label>
        <input type="password" name="password" required placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <label for="confirm-password">Подтвердите пароль:</label>
        <input type="password" name="repassword" required placeholder="Подтвердите пароль">
    </div>
    <button type="submit" name="submit_reg">Зарегистрировать</button>
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