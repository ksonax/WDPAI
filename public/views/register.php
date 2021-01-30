<!DOCTYPE html>
<?php if(!isset($_COOKIE['user'])):?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="./public/js/script.js" defer></script>
    <title>Register Page</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<?php include 'templates/logged_out_header.php';?>
<main>
    <form class="form" action="register" method="POST">
        <h1 class="text"> Sign UP </h1>
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="user_name" type="text" placeholder="Enter username">
        <input name="email" type="text" placeholder="Enter email">
        <input name="password" type="password" placeholder="Enter password">
        <input name="confirmedPassword" type="password" placeholder="Confirm password">
        <button type="submit">Sign Up Now</button>
    </form>
</main>
</body>
</html>
<?php else: ?>
    <?
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/");
    return $this->render('explore_games');?>
<?php endif; ?>