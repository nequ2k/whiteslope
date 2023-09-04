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
            $stmt->execute(array($username, $this->userid));
        }
        catch (exception $exception)
        {
            echo "something went wrong.";
        }
    }

    public function updateEmail(string $email)
    {
        $stmt = $this->connect()->prepare('UPDATE users SET users_email = ? WHERE users_id = ?');
        try {
            $stmt->execute(array($email, $this->userid));
        }
        catch (exception $exception)
        {
            echo "something went wrong.";
        }
    }

   public function updateIsSpicy(int $value) 
   {
    $stmt = $this->connect()->prepare('UPDATE users SET isSpicy = ? WHERE users_id = ?'); 
    try {
        $stmt->execute(array($value, $this->userid));
    }
    catch (exception $exception)
    {
        echo "something went wrong.";
    }
   }

   public function updateIsVegan(int $value) 
   {
    $stmt = $this->connect()->prepare('UPDATE users SET isVegan = ? WHERE users_id = ?'); 
    try {
        $stmt->execute(array($value, $this->userid));
    }
    catch (exception $exception)
    {
        echo "something went wrong.";
    }
   }
   



}