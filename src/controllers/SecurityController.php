<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/PermissionRepository.php';

class SecurityController extends AppController {

    private $userRepository;
    private $permissionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->permissionRepository = new PermissionRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();

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

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/explore_games");
    }
    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user_name = $_POST['user_name'];

        if ($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Please provide proper password']]);
        }

        if(empty($email) || empty($password || empty($confirmedPassword) || empty($user_name))){
            return $this->render('register', ['messages' => ['You\'need to fill blank spaces!']]);
        }
        if(strlen($password)< 8){
            return $this->render('register', ['messages' => ['Your\' password need to be at least 8 characters long!']]);
        }

        if( password_verify($password, $hashed_password) ){
            $user = new User($email, $hashed_password, $user_name);

            $this->userRepository->addUser($user);
            $this->permissionRepository->addRoles($user);

            return $this->render('login', ['messages' => ['You\'ve been succesfully registrated!']]);
        }

    }
}