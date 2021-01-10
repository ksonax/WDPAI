<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <header>
        <div class="inner_header">
            <div class="logo_container">
                <h1>GAME<span>NTER</span></h1>
            </div>
            <div class="header_buttons">
                <button>Sign In</button>
                <button>Sing Up</button>
            </div>
        </div>
    </header>
    <main>
        <div class="form">
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
            <input type="text" placeholder="Username">
            <input type="text" placeholder="Password">
            <button>Sign In</button>
            <p>Need an account?</p>
            <button>Sign Up</button>
        </div>
    </main>
</body>
</html>