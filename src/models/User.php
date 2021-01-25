<?php


class User
{
    private $email;
    private $password;
    private $user_name;

    public function __construct(string $email, string $password, string $user_name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->user_name = $user_name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }


}