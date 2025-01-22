<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header-container">
        <p>Welcome to Whiterose</p>
    </div>
<div class="login-form">
    <div class="login-form-container">
            <form action="" method="post" autocomplete="off" formenctype="multipart/form-data">
            <h2 class="form-hs">Login Here</h2>
            <div class="form">
            <label for="username" class="pl">Username</label> <br>
            <input type="text" class="pl" name="username" id="username" placeholder="heybatman"> <br> <br>
            <label for="password" class="pl">Password</label> <br>
            <input type="password" class="pl" name="password" id="password" placeholder="batmaniscute12!"> <br> <br>
            <input type="submit" class="bt" value="Submit"> <br>  
            <a href="forgot-password.php" id="fp">Forgot Password</a> <br> <br>
            </div>
            <div class="form-last">
            <h5 class="form-hs">Login with a social media account</h5> <br>
            </div>
            <div class="soc-med">
                <button type="button" id="fb" class="btn"></button>
                <button type="button" id="google" class="btn"></button>
                <button type="button" id="wittyrose" class="btn"></button>
            </div>
            </div>



            </form>
    </div>
</body>
</html>