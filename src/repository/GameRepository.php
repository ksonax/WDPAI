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

    public function addGame(Games $game): void {
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

    public function getGames(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM games;
        ');
        $stmt->execute();
        $games = $stmt->fetchAll(PDO::FETCH_ASSOC);

         foreach ($games as $game) {
             $result[] = new Games(
                 $game['title'],
                 $game['description'],
                 $game['image']
             );
         }

        return $result;
    }

    public function getGameByTitle(string $searchString)
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM games WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}