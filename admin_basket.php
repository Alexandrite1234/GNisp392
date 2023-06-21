<?
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$admin_basketquery = mysqli_query($link,"SELECT * FROM basket");
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
<body>
<a class="atext" href="admin.php">Назад</a>
<div class="admin">
  <?php while($admin_basket = mysqli_fetch_assoc($admin_basketquery)): ?>
    <div class="admin_form2">
      <form class="form1" action="statusAction.php" method="POST">
        <input type="hidden" name="id" value="<?=$admin_basket['basket_id']?>">
        <p>id заказа: <?=$admin_basket['basket_id']?></p>
        <p>id клиента: <?=$admin_basket['id_user']?></p>
        <p>id товара: <?=$admin_basket['id_tovar']?></p>
        <div class="status">
          <p>Статус: </p>
          <?php if($admin_basket['status'] == 0): ?>
            <input type="hidden" name="status" value="<?=$admin_basket['status']?>">
            <font color="orange"><p>в очереди</p></font> <br>
          <?php elseif($admin_basket['status'] == 1): ?>
            <input type="hidden" name="status" value="<?=$admin_basket['status']?>">
            <font color="blue"><p>принят в обработку</p></font> <br>
          <?php elseif($admin_basket['status'] == 2): ?>
            <input type="hidden" name="status" value="<?=$admin_basket['status']?>">
            <font color="green"><p>готов</p></font> <br>
          <?php elseif($admin_basket['status'] == 3): ?>
            <input type="hidden" name="status" value="<?=$admin_basket['status']?>">
            <font color="red"><p>отмена</p></font> <br>
          <?php endif; ?>
        </div>
        <input type="submit" name="button_up" value="изменить статус" id="up">
      </form>
    </div>
  <?php endwhile ?>
</div>







</body>
<script src="mail.js"></script>
</html>