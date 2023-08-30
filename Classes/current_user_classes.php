<?php
declare(strict_types=1);

require_once '../Classes/signup_classes.php';
class current_user_classes extends Dbh
{
    private int $userid;
    private string $username;
    private string $user_email;
   

    public function __construct()
    {
        $this->userid = $_SESSION['userid'];
        $this->user_email = $_SESSION['user_email'];
        $this->username = $_SESSION['user_name'];
        
    }

    public function updateUsername(string $username)
    {
        $stmt = $this->connect()->prepare('UPDATE users SET users_user_name = ? WHERE users_id = ?');
        try {
            $stmt->execute(array($username, $_SESSION['userid']));
        }
        catch (exception $exception)
        {
            echo "something went wrong.";
        }


    }

    public function changeUserData(string $username, string $user_email): int
    {
       
        return 0; 
    }

}