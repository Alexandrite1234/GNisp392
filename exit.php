<? 
session_start();
if($_SESSION['user']) {
    session_unset();
    header('Location: index.php');
}
