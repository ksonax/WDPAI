<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users u LEFT JOIN users_details ud 
            ON u.id_user_details = ud.id WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['user_name'],
            $user['roles']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_details (user_name)
            VALUES (?)
        ');

        $stmt->execute([
            $user->getUserName()
        ]);
        $stmt = $this->database->connect()->prepare('
            INSERT INTO sessions (status,email, last_session)
            VALUES (?,?,?)
        ');
        $date = new DateTime();
        $stmt->execute([
            $user->getStatus(),
            $user->getEmail(),
            $date->format('Y-m-d')
        ]);
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, id_user_details, created_at, session_id, roles)
            VALUES (?, ?, ?, ?, ?, ?)
        ');
        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $this->getUserDetailsId($user),
            $date->format('Y-m-d'),
            $this->getSessionId($user),
            $user->getRole()
        ]);
    }

    public function getUserDetailsId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users_details WHERE user_name = :user_name
        ');
        $stmt->bindParam(':user_name', $user->getUserName(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }
    public function getSessionId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.sessions WHERE email = :email
        ');
        $stmt->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }

}