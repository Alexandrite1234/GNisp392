<? 
session_start();
require "db.php";
$idtovar = $_GET['id'];
$tovarquery = mysqli_query($link, "SELECT * FROM tovar WHERE id = '$idtovar'");
$tovar = mysqli_fetch_assoc($tovarquery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="post">
    <form action="PostAction.php" method="POST">
    <input type="hidden" name = "id" value="<?=$tovar['id']?>" required placeholder="Введите название" >
    <input type="text" name = "text" required placeholder="Введите название">
    <input type="text" name = "description" required placeholder="Введите описание">
    <button type="submit" name="Post_sub">Добавить отзыв</button>
    <br>
    </form>
</div>
<script src="mail.js"></script>
</body>
</html>