<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__ .'/../models/Session.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/SessionRepository.php';

class SecurityController extends AppController {

    private $userRepository;
    private $sessionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->sessionRepository = new SessionRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();
        $sessionRepository = new SessionRepository();
        if (isset($_COOKIE['user'])) {
            if (isset($_COOKIE['user'])){
                header("location:javascript://history.go(-1)");
            }
        }
        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!password_verify($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }
        setcookie('user', $user->getEmail(), time() + (60*60));
        $sessionRepository->addSessionLog($user->getEmail(), "logged_in");
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/explore_games");
    }

    public function logout()
    {

        $email = (string)$_COOKIE['user'];
        $sessionRepository = new SessionRepository();
        $sessionRepository->addSessionLog($email, "loggedOut");

        if (isset($_COOKIE['user'])) {
            if ($_GET['logout']) {

                setcookie('user', null, time() - 600); //delete cookies by set time in the past
                $url = "http://$_SERVER[HTTP_HOST]";
                header("Location: {$url}/");
                return $this->render('main_page');
            }
        }
        return $this->render('main_page');
    }

    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $userName = $_POST['user_name'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        if(empty($email) || empty($password || empty($confirmedPassword) || empty($userName))){
            return $this->render('register', ['messages' => ['You\'need to fill blank spaces!']]);
        }
        if(strlen($password)< 8){
            return $this->render('register', ['messages' => ['Your\' password need to be at least 8 characters long!']]);
        }

        if( password_verify($password, $hashedPassword) ){
            $user = new User($email, $hashedPassword, $userName, "user");

            $this->userRepository->addUser($user);

            /* TODO
             *$this->permissionRepository->addRoles($user);
            */
            return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }
    }
}