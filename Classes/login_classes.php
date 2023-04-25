<?php

declare(strict_types=1);

require_once ('dbh_classes.php');

class Login extends Dbh
{
    protected function getUser($user_name, $password)
    {
        $stmt = $this->connect()->prepare(
            'SELECT users_password FROM users WHERE users_user_name = ? OR users_email = ?;'
        );
        if (!$stmt->execute(array($user_name, $user_name))) {
            $stmt = null;
            header("location: ../Views/login.php?error=stmtfailed"); // there should be probably something like page "DATABASE FAILURE, please try again?
            exit();
        }
        if($stmt->rowCount()==0)
        {
            $stmt = null;
            header("location: ../Views/login.php?error=notfound");
            exit();
        }

        $passwordHsd = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($password, $passwordHsd[0]["users_password"]);

        if($checkPwd)
        {
            $stmt = $this->connect()->prepare(
                'SELECT * FROM users WHERE (users_user_name = ? OR users_email = ?) AND users_password = ?;');
            if (!$stmt->execute(array($user_name, $user_name,  $passwordHsd[0]['users_password']))) {
                $stmt = null;
                header("location: ../Views/login.php?error=stmtfailed"); // there should be probably something like page "DATABASE FAILEURE, please try again?
                exit();
            }
            if($stmt->rowCount()==0)
            {
                $stmt = null;
                header("location: ../Views/login.php?error=notfound");
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["userid"]= $user[0]["users_id"];
            $_SESSION["user_name"]= $user[0]["users_user_name"];
        }
        else
        {
            $stmt = null;
            header("location: ../Views/login.php?error=Incorrectpwd");
            exit();
        }


        $stmt = null;
    }


}