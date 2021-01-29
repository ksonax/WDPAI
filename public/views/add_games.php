<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Games</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <?php include 'logged_in_header.php';?>
    <?php include 'nav_bar.php';?>
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