<?php
declare(strict_types=1);

require 'dbh_classes.php';
class ResetPassword extends Dbh
{

    protected string $token;
    protected string $url;
    protected string $expires;

    protected string $user_email;
    public function __construct($user_email)
    {

        $this->token = random_bytes(32);
        $this->url = "our.url.here/forgotpassword/create_new_password.php?validator=".$this->token;
        $this->expires =(string)(900 + (int)date("U"));
        $this->user_email = $user_email;
    }

    public function resetPasswordRequest()
    {
        $stmt = $this->connect()->prepare("DELETE FROM password_reset WHERE password_reset_email = ?");
        if (!$stmt->execute(array($this->user_email))) {
            $stmt = null;
            header("location: ../Views/password_reset.php?error=stmtfailed");
            exit();
        }
        $stmt = $this->connect()->prepare(
            "INSERT INTO password_reset (password_reset_email,  password_reset_token, password_reset_expires) VALUES (?,?,?);"
        );


        if (!$stmt->execute(array($this->user_email, password_hash($this->token, PASSWORD_DEFAULT), $this->expires))) {
            $stmt = null;
            header("location: ../Views/password_reset.php?error=stmtfailed");
            exit();
        } else {
            $subject = "Reset your password for Recipello";

            $message = '<p> We have recieved a password reset request for your account. The link to reset your password will be shown below. If you did not make this request, you can ignore this email. </p> <br> <p> Here is your password reset link: <a href ="' . $this->url . '">' . $this->url . '</a> </p>';

            $headers = "From: recipello <testmail@nequ2137.webd.pro> \r\n";
            $headers .= "Reply-To: testmail@nequ2137.webd.pro \r\n";
            $headers .= "Content-type: text/html\r\n";
            mail($this->user_email, $subject, $message, $headers);
            header("location: ../Views/password_reset.php?message=checkEmail");
            $stmt = null;
            exit();
        }
    }
        public function resetPassword($token, $password, $passwordRepeat, $expires)
        {
            $stmt = $this->connect()->prepare("SELECT * FROM password_reset WHERE password_reset_token = ? AND password_reset_expires >= ?");
            if(!$stmt->execute(array($token, $expires)))
            {
                $stmt = null;
                header("location: ../Views/create_new_password.php?message=stmtfailed");
                exit();
            }
           if(!$row = $stmt->fetchAll(PDO::FETCH_ASSOC))
           {
               header("location: ../Views/create_new_password.php?message=resubmitErr");
               exit();
           }
           else
           {

               $tokenCheck = password_verify($token,$row['password_reset_token']);
               if($tokenCheck===false)
               {
                   header("location: ../Views/create_new_password.php?message=resubmitErr");
                   exit();
               }
               else
               {
                   $tokenEmail = $row['password_reset_email'];
                   $stmt = $this->connect()->prepare("SELECT * FROM users WHERE users_email=?;");

                   if(!$stmt->execute(array($row['password_reset_token'])))
                   {
                       $stmt = null;
                       header("location: ../create_new_password.php?error=stmtfailed");
                       exit();
                   }
                   if($stmt->rowCount()<1)
                   {
                       header("location: ../create_new_password.php?message=resubmit");
                   }
                   else {
                       $stmt = $this->connect()->prepare("UPDATE users SET users_password=? WHERE users_email=?");
                       $stmt->execute(array($password, $tokenEmail));

                   }




               }

           }



        }







}