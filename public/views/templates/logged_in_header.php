<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Games</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <div class="inner_header">
            <div class="logo_container">
                <h1>GAME<span>NTER</span></h1>
            </div>
            <div class="header_buttons">
                <form class="logout_form"action="logout" method="GET">
                    <button name="logout" value="true" class="logout_button">Log Out</button>
                </form>
                <?php if(isset($_COOKIE['user'])):?>
                <?php
                $userRepository = new UserRepository();
                $user = $userRepository->getUser((string)$_COOKIE['user']);
                if($user->getEditPermission() == true):?>
                <button onclick="location.href='add_games'" class="add_game_button">ADD GAME</button>
                <?php else: ?>
                <?php endif;?>
                <?php endif;?>
            </div>
        </div>
    </header>
</body>