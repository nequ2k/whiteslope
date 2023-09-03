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
require_once '../Classes/signup_classes.php';
require_once '../Classes/current_user_classes.php';
$signup = new SignUp();
$current = new current_user_classes();

$path = "location: ../Views/current_user.php";

if($signup->checkUserName($_POST['usernamechange'])===true)
{
    // error: username taken
    $path .= "?username=taken";
}
else
{
    $current->updateUsername($_POST['usernamechange']);
    $_SESSION['user_name'] = $_POST['usernamechange'];
}

if($signup->checkEmail($_POST['emailchange'])===true)
{
    $path .= "?email=taken";
}
else
{
    $current->updateEmail($_POST['emailchange']);
    $_SESSION['user_email'] = $_POST['emailchange'];
}

if(!empty($_POST['hidden']))
{
    $userPreferences = new UserPreference($_SESSION['userid']);
    $userPreferences->saveUserPreferences($_SESSION['userid'], $_POST['hidden']);
}

if(!empty($_POST['Vegan']))
{
    $current->updateIsVegan((int)$_POST['Vegan']);
}
else
{
    $current->updateIsVegan(0); 
}

if(!empty($_POST['Spicy']))
{
    $current->updateIsSpicy((int)$_POST['Spicy']);
}
else 
{
    $current->updateIsSpicy(0); 
}

header($path); 
exit;
?>