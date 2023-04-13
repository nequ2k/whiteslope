<?php
declare(strict_types=1);



class User
{
    public function __construct(protected ?string $id,
                                protected string  $user_name,
                                protected string  $email,
                                protected string  $password,
                                protected bool $likes_spicy,
                                protected bool $is_vegan)
    {}

    public function getUserName(): string
    {
        return $this->user_name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function likesSpicy(): bool
    {
        return $this->likes_spicy;
    }
    public function isVegan():bool
    {
        return $this->is_vegan;
    }

}