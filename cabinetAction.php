<?php
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$login = $_POST['login'];
$password = $_POST['password'];
$repassword = $_POST['password'];
$email = $_POST['email'];
$flag = 0;
if(isset($_POST['submit_update'])) {
     
$updatequery = mysqli_query($link,"UPDATE `user` SET `login` = '$login', `email` = '$email' WHERE `id` = '$id'");

if ($updatequery) {
    $_SESSION['message'] = "Пользователь успешно зарегистрирован!";
    header("Location: kabinet.php");
}

}
