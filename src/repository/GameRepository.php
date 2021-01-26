<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Games.php';

class GameRepository extends Repository
{

    public function getGame(int $id): ?Games
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.games WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $game = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($game == false) {
            return null;
        }

        return new Games(
            $game['title'],
            $game['description'],
            $game['image']
        );
    }

    public function addGame(Games $game): void
    {
        $date = new DateTime();
        $stmt = $this->database->connect()->prepare('
            INSERT INTO games (title, description, image, created_at)
            VALUES (?, ?, ?, ?)
        ');

        //TODO you should get this value from logged user session
        //$game_type = 1;

        $stmt->execute([
            $game->getTitle(),
            $game->getDescription(),
            $game->getImage(),
            $date->format('Y-m-d')
        ]);
    }
}