<?php


class User
{
    private $email;
    private $password;
    private $userName;
    private $status = "registered";
    private $role;
    private $canView;
    private $canEdit;


    public function __construct(string $email, string $password, string $userName, string $role)
    {
        $this->email = $email;
        $this->password = $password;
        $this->userName = $userName;
        $this->role = $role;
        $this->setPermissions();
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
        return $this->userName;
    }
    public function getStatus(): string
    {
        return $this->status;
    }

    public function getRole()
    {
        return $this->role;
    }
    public function setRole($role)
    {
        $this->role = $role;
    }

    public function getViewPermission()
    {
        return $this->canView;
    }
    public function getEditPermission()
    {
        return $this->canEdit;
    }
    public function setPermissions()
    {
        if($this->role == "admin"){
            $this->canEdit = true;
            $this->canView = true;
        }
        if($this->role == "user"){
            $this->canEdit = false;
            $this->canView = true;
        }
    }



}