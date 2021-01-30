<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class SessionRepository extends Repository
{
    public function getSessionLog($email)
    {
        $stmt = $this->database->connect()->prepare('
        SELECT * FROM users u RIGHT JOIN sessions s 
            ON u.:email = s.:email WHERE u.:email is NULL
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addSessionLog($email, $data)
    {
        /* TODO update daty */
        $date = "2021-01-30";
        $stmt = $this->database->connect()->prepare('
            UPDATE sessions SET status = :logData , last_session = :currentDate WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':logData', $data, PDO::PARAM_STR);
        $stmt->bindParam(':currentDate', $date, PDO::PARAM_STR);
        $stmt->execute();
    }


}