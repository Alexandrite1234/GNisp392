<?php
session_start();
require "db.php";
$basket = $_POST["basket_id"];
$delete = mysqli_query($link,"DELETE FROM basket WHERE basket_id = '$basket'");
header("Location: " . $_SERVER['HTTP_REFERER']);