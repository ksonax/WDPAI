<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="public/css/style.css">
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
    <main>
        <form class="register" action="register" method="POST">
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