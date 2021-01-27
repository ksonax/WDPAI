<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('main_page', 'DefaultController');
Routing::get('my_games', 'DefaultController');
Routing::get('explore_games', 'GameController');
Routing::get('players', 'DefaultController');
Routing::get('my_friends', 'DefaultController');

Routing::post('login', 'SecurityController');
Routing::post('register', 'SecurityController');
Routing::post('add_games', 'GameController');
Routing::post('search', 'GameController');

Routing::run($path);