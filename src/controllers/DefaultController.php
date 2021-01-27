<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        //TODO display main_page.php
        $this->render('main_page');

    }

    public function login() {
        //TODO display login.php
        $this->render('login');

    }

    public function my_friends() {
        //TODO display explore_games.html
        $this->render('my_friends');
    }

    public function my_games() {
        //TODO display explore_games.html
        $this->render('my_games');
    }

    public function players() {
        //TODO display explore_games.html
        $this->render('players');
    }

    public function register() {
        //TODO display explore_games.html
        $this->render('register');
    }
}