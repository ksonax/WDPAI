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
            <?php for( $i = 0; $i <= 10; $i++)
                include 'templates/player.php';?>
        </section>
    </div>
</body>
<?php else: ?>
<?
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");
return $this->render('main_page');?>
<?php endif; ?>