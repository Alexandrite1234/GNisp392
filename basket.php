<?
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$idtovar = $_GET['id'];
$basketquery = mysqli_query($link,"SELECT * FROM basket INNER JOIN user ON basket.id_user = user.id
INNER JOIN tovar ON basket.id_tovar = tovar.id
WHERE id_user = '$id'  ORDER BY basket_id DESC");


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
  
<h1 align="center"> Корзина пользователя</h1>
<div class="basket">
  <?php while($basket = mysqli_fetch_assoc($basketquery)) : ?>
    <div class="item">
      <form action="deleteBasket.php" method="POST">
        <input type="hidden" name="basket_id" value="<?=$basket['basket_id']?>">
        <p>Наименование товара: <?=$basket['name']?></p>
        <div class="status">
          <p>Статус: </p>
          <?php if($basket['status'] == 0): ?>
            <font color="orange"><p>в очереди</p></font> <br>
          <?php elseif($basket['status'] == 1): ?>
            <font color="blue"><p>принят в обработку</p></font> <br>
          <?php elseif($basket['status'] == 2): ?>
            <font color="green"><p>готов</p></font> <br>
          <?php elseif($basket['status'] == 3): ?>
            <font color="red"><p>отмена</p></font> <br>
          <?php endif; ?>
        </div>
        <button type="submit" name="delete_submit">Удалить</button>
      </form>
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