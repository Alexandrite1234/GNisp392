<?
session_start();
require "db.php";
$id = $_POST['id'];
$status = $_POST['status'];
$newstatus = 0;


if(isset($_POST['button_up']) && $status < 3 && $newstatus <3){
    $status++;
    $newstatus = $status;
}
else {
    $newstatus = 0;
}

$statusquery = mysqli_query ($link,"UPDATE `basket` SET `status` = '$newstatus' WHERE `basket_id` = $id");
header("Location: " . $_SERVER['HTTP_REFERER']);
   
