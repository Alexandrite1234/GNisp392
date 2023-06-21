<? 
session_start();
require "db.php";
$id = $_SESSION['user']['id'];
$password = $_POST['password'];
$newpassword = $_POST['newpassword'];
$newrepassword = $_POST['newrepassword'];
$repassword = $_POST['repassword'];
$rerepassword = $_POST['rerepassword'];


if (isset($_POST['submit_password'])) {


    if($password == $repassword && $repassword == $rerepassword) {
    header("Location:update_password.php");
    }
else {
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

if(isset($_POST['update_password'])) {

if(($newpassword == $newrepassword)){
    $update = mysqli_query($link,"UPDATE `user` SET `password` = '$newpassword'  WHERE `id` = '$id'");
    header("Location:kabinet.php");
}
else {
    header("Location:".$_SERVER['HTTP_REFERER']);
}
}

