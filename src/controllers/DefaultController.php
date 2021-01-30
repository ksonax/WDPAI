<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index() {
        $this->render('main_page');

    }

    public function my_friends() {
        $this->render('my_friends');
    }

    public function players() {
        $this->render('players');
    }
}