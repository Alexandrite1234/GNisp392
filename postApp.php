<?php
session_start();
require "db.php";

// Проверяем, является ли пользователь администратором
$isAdministrator = isset($_SESSION['user']) && $_SESSION['user']['flag'] > 0;

if (!$isAdministrator) {
    // Редирект не администратора на другую страницу
    header("Location: some_other_page.php");
    exit();
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
                <a href="postApp.php">Добавление постов</a>
                <a href="kabinet.php">Личный кабинет</a>
                <a href="index.php">Главная</a>
                <a href="catalog.php">Каталог</a>
                <a href="basket.php">Корзина</a>
                <a href="aboutus.php">Где мы</a>
                <a href="exit.php">Выход</a>
    </nav>
</header>
<?php
$tovarquery = mysqli_query($link, "SELECT * FROM tovar");

// Добавление нового товара
mysqli_query($link, "SET FOREIGN_KEY_CHECKS=0");

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];

    // Подготовка и выполнение запроса на добавление товара
    $sql = "INSERT INTO tovar (name, description) VALUES ('$name', '$description')";
    if (mysqli_query($link, $sql)) {
        header("Location: index.php"); // Перенаправление на страницу с каталогом
        exit(); // Прекращение выполнения скрипта после перенаправления
    } else {
        echo "Ошибка при добавлении товара: " . mysqli_error($link);
    }
}

// Удаление товара
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Подготовка и выполнение запроса на удаление товара
    $sql = "DELETE FROM tovar WHERE id = $id";
    if (mysqli_query($link, $sql)) {
        echo "Товар успешно удален.";
    } else {
        echo "Ошибка при удалении товара: " . mysqli_error($link);
    }
}
?>




<!-- Форма для добавления нового товара -->
<div class="container form-container">
  <form class="form2" method="POST" action="">
  <h2>Добавить товар</h2>
    <div class="form-group">
      <label for="name">Название:</label>
      <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="description">Описание:</label>
      <input type="text" name="description" id="description">
    </div>
    <input type="submit" name="submit" value="Добавить товар" class="button">

  </form>
</div>


<div class="flex">
    <?php while ($tovar = mysqli_fetch_assoc($tovarquery)) : ?>
        <div class="tovar">
            <a href="tovar.php?id=<?= $tovar['id'] ?>"><?= $tovar['name'] ?> </a>
            <p>Описание - <?= $tovar['description'] ?></p>
            <p><a href="?delete=<?= $tovar['id'] ?>">Удалить</a></p>
        </div>
    <?php endwhile; ?>
</div>




</body>
</html>

