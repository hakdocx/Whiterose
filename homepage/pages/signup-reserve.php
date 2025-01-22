<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signup-reserve.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
    </head>

<body>
    <div class="header-container">
        <p>Welcome to Whiterose</p>
    </div>
<div class="signin-form">
    <div class="signin-form-container">
            <form action="" method="post" autocomplete="off" formenctype="multipart/form-data">
            <h2 class="form-hs">Sign Up Here</h2>
            <div class="form">

            <div class="col">
            <label for="firstname" class="pl">First name</label> <br>
            <input type="text" class="pl" name="fname" id="fname" required placeholder="John"> <br> <br>
            </div>
            <div class="col">
            <label for="firstname" class="pl">Last name</label> <br>
            <input type="text" class="pl" name="lname" id="lname" required placeholder="Batman"> <br> <br>
           </div>
           <div class="col">
            <label for="uname" class="pl">Username</label> <br>
            <input type="text" class="pl" name="uname" id="uname" required placeholder="Batman"> <br> <br>
           </div>
           <div class="col">
            <label for="email" class="pl">Email</label> <br>
            <input type="email" class="pl" name="email" id="email" required placeholder="batman@home.com"> <br> <br>
            </div>
            <div class="col">
            <label for="phone" class="pl">Phone Number</label> <br>
            <input type="tel" class="pl" name="num" id="num" required pattern="[09]{1}[0-9]{9}" minlength="11" maxlength="12" placeholder="09876543210"> <br> <br>
            </div>
            <div class="col">
            <label for="password" class="pl">Password</label> <br>
            <input type="password" class="pl" name="password" required id="password" placeholder="*******"> <br> <br>
            </div>
            <div class="col">
            <label for="password" class="pl">Confirm Password</label> <br>
            <input type="password" class="pl" name="cpassword" required id="cpassword" placeholder="******"> <br> <br>
            </div>
            <div class="col">
            <label for="password" class="pl">Profile Picture</label> <br>
            <input type="file" name="pfp" id="pfp" required accept="image/jpg, image/png, image/jpeg">
            </div>
            </div>
            <div class="form-1">
            <p> By signing up, you agree to our <a href="#">Terms and Conditions</a>.
            </p>
            <div class="form-submit">
            <input type="submit" class="bt">
            </div>
            <p> Already have an account? <a href="login.php">Click here</a></p>
            </div>



            </form>
    </div>
    </div>
</body>
</html>
</body>
</html>