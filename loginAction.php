<?php
session_start();
require "db.php";
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
if (isset($_POST['submit_login'])) {
    $resultlogin = mysqli_query($link, "SELECT * FROM `user` WHERE (`login` = '$login' OR `email`='$login') AND `password` = '$password'");
    if (mysqli_num_rows($resultlogin) > 0) {
        $user = mysqli_fetch_assoc($resultlogin);
        $_SESSION['user'] = [
            'id' => $user['id'],
            'login' => $user['login'],
            'password' => $user['password'],
            'email' => $user['email'],
            'flag' => $user['flag']
        ];

        header("Location: index.php");
    } else {
        $_SESSION['message'] = "Не правильный логин или пароль";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
}


if (isset($_POST['submit_reg'])) {

    $checkuser = mysqli_query($link, "SELECT * FROM `user` WHERE `login` = '$login' OR `email`='$email'");

    if ($password !== $repassword) {
        $_SESSION['message'] = "Пароли не совпадают";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else if (mysqli_num_rows($checkuser) > 0) {
        $_SESSION['message'] = "Пользователь с таким логином или email существует";
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $adduser = mysqli_query($link, "INSERT INTO `user` ( `login`, `password`, `email`) VALUES ('$login','$password','$email')");
        if ($adduser) {
            $_SESSION['message'] = "Пользователь успешно зарегистрирован!";
            header("Location: index.php");

        }
    }
}

