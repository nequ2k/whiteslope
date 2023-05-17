<?php
declare(strict_types=1);

require 'dbh_classes.php';
class ResetPassword extends Dbh
{

    protected string $token;
    protected string $password;


    public function __construct($token, $password)
    {

        $this->token = $token;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }


    public function resetPassword()
    {
        $time = (string)((int)date("U"));
        $stmt = $this->connect()->prepare(
            "SELECT * FROM password_reset WHERE  password_reset_token = ? AND password_reset_expires >= ?;"
        );
        if (!$stmt->execute(array($this->token, $time))) {
            $stmt = null;
            header("location: ../Views/create_new_password.php?message=stmtfailed");
            exit();
        }
        $email = $stmt->fetchAll(PDO::FETCH_ASSOC);



        if ($stmt->rowCount() == 0) {
            header("location: ../Views/create_new_password.php?message=resubmitErr");
            exit();
        } else {
            $stmt = $this->connect()->prepare("UPDATE users SET users_password=? WHERE users_email=?");
            $stmt->execute(array($this->password, $email[0]["password_reset_email"]));
            header("location: ../Views/create_new_password.php?message=passChanged");
        }
    }



}