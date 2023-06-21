<?php
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$idtovar = $_POST['id'];
$basketquery_insert = mysqli_query($link,"INSERT INTO basket (`id_user`, `id_tovar`, `status`) VALUES('$id','$idtovar','0')");
if(isset($basketquery_insert)) {
    header("location: basket.php");
    exit($basketquery_insert);
}