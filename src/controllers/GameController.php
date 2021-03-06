<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/Games.php';
require_once __DIR__.'/../repository/GameRepository.php';


class GameController extends AppController
{
    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/uploads/';

    private $message = [];
    private $gameRepository;

    public function __construct()
    {
        parent::__construct();
        $this->gameRepository = new GameRepository();
    }

    public function add_games()
    {
        $games = $this->gameRepository->getGames();
        if ($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {
            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );

            // TODO create new project object and save it in database
            $game = new Games($_POST['title'], $_POST['description'], $_FILES['file']['name']);
            $this->gameRepository->addGame($game);

            return $this->render('explore_games', ['games' => $games]);
        }
        return $this->render('add_games', ['messages' => $this->message]);
    }
    public function explore_games()
    {
        $games = $this->gameRepository->getGames();
        $this->render('explore_games', ['games' => $games]);
    }
    public function my_games()
    {
        $games = $this->gameRepository->getGames();
        $this->render('my_games', ['games' => $games]);
    }

    public function search()
    {
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        if ($contentType === "application/json") {
            $content = trim(file_get_contents("php://input"));
            $decoded = json_decode($content, true);

            header('Content-type: application/json');
            http_response_code(200);

            echo json_encode($this->gameRepository->getGameByTitle($decoded['search']));
        }
    }

    private function validate(array $file): bool
    {
        if ($file['size'] > self::MAX_FILE_SIZE) {
            $this->message[] = 'File is too large for destination file system.';
            return false;
        }

        if (!isset($file['type']) || !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->message[] = 'File type is not supported.';
            return false;
        }
        return true;
    }



}