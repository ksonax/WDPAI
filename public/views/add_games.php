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
    <div class="base_container">
        <nav>
            <div class="search_bar">
                <input placeholder="Search">
            </div>
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
        <main class="main2">
            <div>
                <h1 class="section_title">ADD Games</h1>
            </div>
            <section  class="my_games">
                <form action="add_games" method="POST" ENCTYPE="multipart/form-data">
                    <div class="messages">
                        <?php
                        if(isset($messages)){
                            foreach($messages as $message) {
                                echo $message;
                            }
                        }
                        ?>
                    </div>
                    <input type="title" type="text" placeholder="title">
                    <textarea name ="description" rows="5" placeholder="description"></textarea>

                    <input type="file" name="file">
                    <button type="submit">ADD GAME</button>
                </form>
            </section>
        </main>
    </div>
</body>