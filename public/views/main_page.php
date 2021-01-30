<!DOCTYPE html>
<?php if(!isset($_COOKIE['user'])):?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAMENTER</title>
    <link rel="stylesheet" href="public/css/style_main_page.css">
</head>
<body>
    <header>
        <div class="inner_header">
            <div class="logo_container">
                <h1>GAME<span>NTER</span></h1>
            </div>
            <div class="header_buttons">
                <button onclick="location.href='login'">Sign In</button>
                <button onclick="location.href='register'">Sing Up</button>
            </div>
        </div>
    </header>
    <div class="main_background">
        <div class ="main_text">
            <h1 style="font-size: 60px">GAMENTER</h1>
            <h3>We play Games here!!!</h3>
            <button onclick="location.href='register'">JOIN US!</button>
        </div>
    </div>
    <?php include 'templates/content.php';?>
    <?php include 'templates/content.php';?>
    <div class="footer">
        <p>Footer</p>
    </div>
</body>
</html>
<?php else: ?>
    <?php
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/");
    return $this->render('explore_games');?>
<?php endif; ?>