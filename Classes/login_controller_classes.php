<?php

declare(strict_types=1);

class LoginController extends \Login
{
    private string $user_name;

    private string $password;


    public function __construct(string $user_name, string $password)// :self
    {
        $this->user_name = $user_name;
        $this->password = $password;
    }


    public function loginUser()
    {
        $this->getUser($this->user_name, $this->password);

    }








}