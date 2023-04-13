<?php
declare(strict_types=1);

require_once 'user.php';

final class admin_user extends User
{
    public function __construct(?string $id, string $user_name, string $email, string $password, protected bool $admin, bool $likes_spicy, bool $is_vegan)
    {
        parent::__construct($id, $user_name, $email, $password,$likes_spicy,$is_vegan);
        $this->admin = true;
    }
}