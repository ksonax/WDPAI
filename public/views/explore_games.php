<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <title>Explore Games</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<header>
    <header>
        <div class="inner_header">
            <div class="logo_container">
                <!--<img src="../img/logo.png" alt="logo">-->
                <h1>GAME<span>NTER</span></h1>
            </div>
            <div class="header_buttons">
                <button>NOTIFICATIONS</button>
                <button>CHAT</button>
            </div>
        </div>
    </header>
</header>
    <header class="base_container">
            <div class="search-bar">
                <input placeholder="Search">
            </div>
    </header>
        <nav>
            <div class="nav_buttons">
                <ul>
                    <li>
                        <button onclick="location.href='my_games'">My Games</button>
                    </li>
                    <li>
                        <button onclick="location.href='explore_games'">Explore Games</button>
                    </li>
                    <li>
                        <button onclick="location.href='players'">Players</button>
                    </li>
                    <li>
                        <button onclick="location.href='my_friends'">Friend List</button>
                    </li>
                </ul>
            </div>
        </nav>
        <h1 class="section_title">Explore Games</h1>
        <main class="main2">
            <section  class="explore_games">
                <?php foreach($games as $game): ?>
                    <div id="game-1">
                        <img src="public/img/uploads/<?= $game->getImage(); ?>">
                        <div>
                            <h3><?= $game->getTitle(); ?></h3>
                            <p><?= $game->getDescription(); ?></p>
                            <h4>Players Online</h4>
                            <h4>Players Waiting</h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </section>
        </main>
    </header>
</body>

<template id="game-template">
    <div id="">
        <img src="">
        <div>
            <h3>title</h3>
            <p>description</p>
            <h4 class="online">Players Online</h4>
            <h4 class="waiting">Players Waiting</h4>
        </div>
    </div>
</template>