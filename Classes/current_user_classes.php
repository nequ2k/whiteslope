<?php
declare(strict_types=1); 
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

 
    public function changeUserData(string $username, string $user_email): int
    {
       
        return 0; 
    }

}