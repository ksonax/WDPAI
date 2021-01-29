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
    <?php include 'logged_in_header.php';?>
    <?php include 'nav_bar.php';?>
    <div class="base_container">
        <div class="section_title">
            <h4>Explore Games</h4>
        </div>
        <section  class="explore_games">
            <?php foreach($games as $game): ?>
                <div id="game-1">
                    <img src="public/img/uploads/<?= $game->getImage(); ?>">
                    <div class="games_info">
                        <h3><?= $game->getTitle(); ?></h3>
                        <p><?= $game->getDescription(); ?></p>
                        <div class="stats">
                            <h4>Players Online</h4>
                            <h4>Players Waiting</h4>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
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