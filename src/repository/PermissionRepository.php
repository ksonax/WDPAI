<?php

require_once "Repository.php";
require_once __DIR__."/../models/User.php";

class PermissionRepository extends Repository {

    public function getPermissions(int $userId) {
        $stmt = $this->database->connect()->prepare('
            SELECT name
            FROM public."user_roles"
            LEFT JOIN "user_permissions" ur on "user_roles"."permission_id" = ur.id
            WHERE "userId" = :user_id;
        ');
        $stmt->bindParam(":user_id", $userId, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function addRoles(User $user){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_roles (user_id, role_name)
            VALUES (?,?)
        ');

        $stmt->execute([
            $user->getID($user),
            $user->getRoles()
        ]);
    }
    /*
    public function getUserId(User $user): int
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id = :id
        ');
        $stmt->bindParam(':id', $user->getRoles(), PDO::PARAM_STR);
        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id'];
    }*/
}