<?php
require "db.php";
session_start();
$id = $_SESSION['user']['id'];
$userquery = mysqli_query($link, "SELECT * FROM user WHERE user.id = '$id'");

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
<div class="wrapper">
    <div class="container">
        <?php if (isset($_SESSION['user'])) : ?>
            <?php while ($user = mysqli_fetch_assoc($userquery)) : ?>
                <form action="cabinetAction.php" method="POST">
                    <h2>Личный кабинет</h2>
                    <div class="form-group">
                        <input type="hidden" id="id" name="id" value="<?=$user['id']?>">
                        <div class="form-group">
                            <label for="email">Имя пользователя:</label>
                            <input type="text" id="login" name="login" value="<?=$user['login']?>" disabled>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="password" id="password" name="password" value="<?=$user['password']?>" disabled>
                        </div>
                        <div class="form-group">   
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?=$user['email']?>" disabled>
                        </div>
                        <div class="form-actions">
                            <button type="button" onclick="location.href='password.php'" class="password-button">Сменить пароль</button>
                            <button type="button" id="update" onclick="re()" class="edit-button">Редактировать данные</button>
                            <button type="submit" name="submit_update" id="save" class="save-button">Сохранить</button>
                            <button type="button" onclick="window.location.href = 'kabinet.php'" class="password-button">Отмена</button>
                        </div>
                    </div>
                </form>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
</div>


<script src="mail.js"></script>
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

