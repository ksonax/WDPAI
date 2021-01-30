<!DOCTYPE html>
<?php if(isset($_COOKIE['user'])):?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php include 'templates/logged_in_header.php';?>
    <?php include 'templates/nav_bar.php';?>
    <div class="base_container">
        <div>
            <h1 class="section_title">Players</h1>
        </div>
        <section  class="players">
            <div id="player-1">
                <img class="player_photo" src="public/img/avatar.png" alt="placeholder">
                <h3>UserName</h3>
                <p>User description</p>
                <h4>Recently Played With</h4>
                <div class="played_recently">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                </div>

                <h4>Recently Played Games</h4>
                <div class="games_recently">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                </div>
            </div>
            <div class="player">
                <img class="player_photo" src="public/img/avatar.png" alt="placeholder">
                <h3>UserName</h3>
                <p>User description</p>
                <h4>Recently Played With</h4>
                <div class="played_recently">
                    <img  src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img  src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img  src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img  src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                </div>

                <h4>Recently Played Games</h4>
                <div class="games_recently">
                    <img  src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img  src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img  src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                </div>
            </div>
            <div class="player">
                <img class="player_photo" src="public/img/avatar.png" alt="placeholder">
                <h3>UserName</h3>
                <p>User description</p>
                <h4>Recently Played With</h4>
                <div class="played_recently">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                </div>

                <h4>Recently Played Games</h4>
                <div class="games_recently">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                </div>
            </div>
            <div class="player">
                <img class="player_photo" src="public/img/avatar.png" alt="placeholder">
                <h3>UserName</h3>
                <p>User description</p>
                <h4>Recently Played With</h4>
                <div class="played_recently">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                </div>

                <h4>Recently Played Games</h4>
                <div class="games_recently">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                </div>
            </div>
            <div class="player">
                <img class="player_photo" src="public/img/avatar.png" alt="placeholder">
                <h3>UserName</h3>
                <p>User description</p>
                <h4>Recently Played With</h4>
                <div class="played_recently">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/avatar.png" alt="placeholder" height="50" wdth="50">
                </div>

                <h4>Recently Played Games</h4>
                <div class="games_recently">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                    <img src="public/img/unnamed.jpg" alt="placeholder" height="50" wdth="50">
                </div>
            </div>
        </section>
    </div>
</body>
<?php else: ?>
<?
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");
return $this->render('main_page');?>
<?php endif; ?>