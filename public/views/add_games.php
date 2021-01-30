<!DOCTYPE html>
<?php if(isset($_COOKIE['user'])):?>
<?php
$userRepository = new UserRepository();
$user = $userRepository->getUser((string)$_COOKIE['user']);
if($user->getRole() == "admin"):?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Games</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php include 'templates/logged_in_header.php';?>
    <?php include 'templates/nav_bar.php';?>
    <div class="base_container">
        <div>
            <h1 class="section_title">ADD Games</h1>
        </div>
        <section  class="add_games">
            <form action="add_games" " method="POST" ENCTYPE="multipart/form-data">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input class="title" name="title" type="text" placeholder="title">
                <textarea name ="description" rows="5" placeholder="description"></textarea>
                <input class="send_file" type="file" name="file"><br/>
                <button type="submit">ADD GAME</button>
            </form>
        </section>
    </div>
</body>
<?php else:?>
<?
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/");
    return $this->render('explore_games');?>
<?php endif;?>
<?php else: ?>
<?
$url = "http://$_SERVER[HTTP_HOST]";
header("Location: {$url}/");
return $this->render('main_page');?>
<?php endif; ?>