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
        <div class="form">
            <h1 class="text"> Sign UP </h1>
            <input name="username" type="text" placeholder="Enter username">
            <input name="email" type="text" placeholder="Enter email">
            <input name="password" type="text" placeholder="Enter password">
            <input name="password" type="text" placeholder="Confirm password">
            <button type="submit">Sign Up Now</button>
        </div>
    </main>
</body>