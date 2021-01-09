<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        //TODO display login.html
        $this->render('login');

    }

    public function explore_games() {
        //TODO display explore_games.html
        $this->render('explore_games');
    }
}