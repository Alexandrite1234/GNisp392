<?
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$idtovar = $_POST['id'];
$text = $_POST['text'];
$description = $_POST['description'];

if (isset($_POST['Post_sub'])) {
    $post = mysqli_query($link, "INSERT INTO `post` (`user_id`, `tovar_id`,`post_text`, `post_description`) VALUES ('$id','$idtovar','$text','$description')");
    if ($post) {
        $_SESSION['message'] = "Пользователь успешно зарегистрирован!";
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
}

