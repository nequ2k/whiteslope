<?php
declare(strict_types=1);
class SignUpController extends \SignUp
{
    private string $user_name;
    private string $email;
    private string $password;
    private string $confirm_password;

    public function __construct(string $email, string $user_name, string $password, string $confirm_password)// :self
    {
        $this->email = $email;
        $this->user_name = $user_name;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }



    public function signUpUser()
    {
        $redirect = "location: ../Views/register.php?";
        if($this->emailTaken() == true)
        {
            if($redirect!="location: ../Views/register.php?") $redirect .= "&emailTakenErr=1";
            else $redirect .= "emailTakenErr=1";
           // exit();
        }
        if($this->usernameTaken() == true)
        {
            if($redirect!="location: ../Views/register.php?") $redirect .= "&usernameTakenErr=1";
            else $redirect .= "usernameTakenErr=1";
           // exit();
        }
        if($this->passwordMatch() == false)
        {
            if($redirect!="location: ../Views/register.php?") $redirect .= "&password!matchErr=1";
            else $redirect .= "password!matchErr=1";
          //  exit();
        }
        if($this->passwordIncorrect() == true)
        {
            if($redirect!="location: ../Views/register.php?") $redirect .= "&invalidpasswordErr=1";
            else $redirect .= "invalidpasswordErr=1";
           // exit();
        }
        if($redirect=="location: ../Views/register.php?")
        {
            $this->setUser($this->user_name, $this->password, $this->email);
        }
        else
        {
            header($redirect);
        }
    }



}