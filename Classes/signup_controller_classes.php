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

    private function emailTaken(): bool
    {
        if($this->checkEmail($this->email))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }
    private function usernameTaken(): bool
    {
        if($this->checkUserName($this->user_name))
        {
            $result = true;
        }
        else
        {
            $result = false;
        }

        return $result;
    }
    private function passwordIncorrect(): bool
    {
        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);
        $specialChars = preg_match('@[^\w]@', $this->password);
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($this->password) < 8)
        {
            $result = true;
        }
        else
        {
            $result = false;
        }
        return $result;
    }
    private function passwordMatch(): bool
    {
        if($this->password !== $this->confirm_password)
        {
            $result = false;
        }
        else
        {
            $result = true;
        }

        return $result;
    }

}