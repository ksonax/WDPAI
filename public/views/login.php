<!DOCTYPE html>
<?php if(!isset($_COOKIE['user'])):?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
<?php include 'logged_out_header.php';?>
<main>
    <form class="form" action="login" method="POST">
        <h1>Sign In</h1>
        <div class="messages">
            <?php
            if(isset($messages)){
                foreach($messages as $message) {
                    echo $message;
                }
            }
            ?>
        </div>
        <input name="email" type="text" " placeholder="Username">
        <input name="password" type="password" placeholder="Password">
        <button type="submit">Sign In</button>
        <p>Need an account?</p>
        <button onclick="location.href='register'">Sign Up</button>
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