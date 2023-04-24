<?php

if(isset($_POST['submit-new-password']))
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["newPassword"];
    $password_repeat = $_POST["newPasswordRepeat"];




if($password!==$password_repeat)
{
    header("Location: ../create_new_password.php?message=password!match");
}
$currentDate=date("U");
require'dbh_classes.php';

$dbh = new Dbh();
;
$stmt = $dbh->connect()->prepare("SELECT * FROM password_reset WHERE password_reset_selector = ? AND password_reset_expires >= ?");
if(!stmt->execute(array[$selector, $currentDate]))
{

}






}
?>
