<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("location: ../Views/mainpage.php");
    exit;
}
?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
require_once '../Classes/user_recipe_preferences_classes.php';

$userPreferences = new UserPreference($_SESSION['userid']);
$userPreferences->saveUserPreferences($_SESSION['userid'], $_POST['hidden']);


header("location: ../Views/current_user.php");
exit;
?>