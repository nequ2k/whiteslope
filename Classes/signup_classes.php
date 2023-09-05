<?php

declare(strict_types=1);
class SignUp extends Dbh
{
    protected function setUser($user_name, $password, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO users (users_user_name, users_password, users_email, isSpicy, isVegan) VALUES (?,?,?,?,?);');

        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);


        if (!$stmt->execute(array($user_name, $hashedPwd,  $email, 0, 0))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
        $stmt = null;
    }


    public function checkUserName($user_name): bool
    {
        $stmt = $this->connect()->prepare('SELECT users_user_name FROM users WHERE users_user_name = ?');
        if (!$stmt->execute(array($user_name))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
    public function checkEmail($email): bool
    {
        $stmt = $this->connect()->prepare('SELECT users_user_name FROM users WHERE users_email = ?');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../register.php?error=stmtfailed");
            exit();
        }
        if ($stmt->rowCount() > 0) {
            $result = true;
        } else {
            $result = false;
        }

        return $result;
    }
}
