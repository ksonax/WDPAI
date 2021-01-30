<?php


class User
{
    private $user_role;
    private $email;
    private $password;
    private $user_name;

    public function __construct( string $email, string $password, string $user_name)
    {
        $this->user_role = "user";
        $this->email = $email;
        $this->password = $password;
        $this->user_name = $user_name;
    }

    public function getID(): int
    {
        return $this->id;
    }
    public function setID(int $id): void
    {
        $this->user_id = $id;
    }
    public function getRoles(): string
    {
        return $this->user_role;
    }
    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }


}