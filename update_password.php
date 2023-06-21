<? 
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
<body>





<div class="wrapper">
        <div class="container">
        <? if (isset($_SESSION['user'])) {?>
            <?php while($user = mysqli_fetch_assoc($userquery)) {   ?>  
                <form action="passwordAction.php" method="POST">
                <h2>Введите новый пароль</h2>
                <div class="form-group">
                <input type="hidden" name="password" value="<?=$user['password'] ?>">
                        <div class="form-group">
                            <label for="email">Введите новый пароль</label>
                            <input type="number" name="newpassword" value="">
                        </div>
                    
                        <div class="form-group">
                            <label for="password">Подтвердите новый пароль</label>
                            <input type="number" name="newrepassword" value="">
                        </div>
                        
                        <button type="update_password" name="update_password">Обновить</button>
                        <button type="button" onclick="window.location.href = 'kabinet.php'" class="password-button">Отмена</button>
                </form>
                <? } ?>
            <?}?>
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