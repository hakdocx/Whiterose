<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'db.php';
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendemail_verify($uname, $email) {
    try{
    $mail = new PHPMailer(true);
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->Username = "whiterose.crypt00@gmail.com";
    $mail->Password = "okhg kxtt lhup xruu";
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    
    $mail->AddAddress($email);
    $mail->SetFrom("whiterose.crypt00@gmail.com", $uname);
    $mail->IsHTML(true);
    $mail->Subject = "Verification of your account";
    
    $message = "<html>
    <head><title>Email Verification</title></head>
    <body>
        Please verify your account by clicking the link below: 
        <a href='http://localhost/whiterose/pages/signup-confirmation.php'>Verify</a><br>
        Did not receive email? 
        <a href='http://localhost/whiterose/pages/signup-reserve.php'>Resend email</a>
    </body>
    </html>";
    
    $mail->Body = $message;
    return $mail->Send(); }
    catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        try {
            // Check if username exists
            $check_username = $conn->prepare("SELECT username FROM users WHERE username = ?");
            $check_username->bind_param("s", $uname);
            $check_username->execute();
            $result = $check_username->get_result();
            if ($result->num_rows > 0) {
                throw new Exception("Username already exists!");
            }
    
            // Check if email exists
            $check_email = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $check_email->bind_param("s", $email);
            $check_email->execute();
            $result = $check_email->get_result();
            if ($result->num_rows > 0) {
                throw new Exception("Email already registered!");
            }
            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $contact_no = mysqli_real_escape_string($conn, $_POST['num']);
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
        
            if ($password !== $cpassword) {
                throw new Exception("Passwords do not match");
            }
            
            if (isset($_FILES['pfp'])) {
                $image = $_FILES['pfp']['name'];
                $image_tmp_name = $_FILES['pfp']['tmp_name'];
                $image_folder = 'uploaded_img/'.$image;
            } else {
                throw new Exception("Profile picture is required");
            }
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, username, email, contact_no, password, pfp) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $fname, $lname, $uname, $email, $contact_no, $hashed_password, $image);
        
        if ($stmt->execute()) {
            move_uploaded_file($image_tmp_name, $image_folder);
            if (sendemail_verify($uname, $email)) {
                echo "<script>alert('Registration successful! Please check your email for verification.');</script>";
            } else {
                echo "<script>alert('Registration successful but email verification failed!');</script>";
            }
        } else {
            throw new Exception("Database error: " . $stmt->error);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Whiterose</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Inline&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header-container">
        <p>Welcome to Whiterose</p>
    </div>
    <div class="signin-form">
        <div class="signin-form-container">
            <form action="signup.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <h2 class="form-hs">Sign Up Here</h2>
                <div class="form">
                    <label for="firstname" class="pl">First name</label> <br>
                    <input type="text" class="pl" name="fname" id="fname" required placeholder="John"> <br> <br>
                    <label for="lastname" class="pl">Last name</label> <br>
                    <input type="text" class="pl" name="lname" id="lname" required placeholder="Batman"> <br> <br>
                    <label for="uname" class="pl">Username</label> <br>
                    <input type="text" class="pl" name="uname" id="uname" required placeholder="Batman"> <br> <br>
                    <label for="email" class="pl">Email</label> <br>
                    <input type="email" class="pl" name="email" id="email" required placeholder="batman@home.com"> <br> <br>
                    <label for="contact" class="pl">Contact Number</label> <br>
                    <input type="tel" class="pl" name="num" id="num" required pattern="[0]{1}[9]{1}[0-9]{9}" minlength="11" maxlength="12" placeholder="09876543210"> <br> <br>
                    <label for="file" class="pl">Profile Picture</label> <br>
                    <input type="file" name="pfp" id="pfp" required accept="image/jpg, image/png, image/jpeg"> <br> <br>
                    <div class="password-container">
                    <label for="password" class="pl">Password</label> <br>
                    <div class="password-input">
                        <input type="password" class="pl" name="password" id="password" required placeholder="******">
                        <i class="fas fa-eye" id="togglePassword" style="display:none"></i>
                    </div>
                    <br><br>
                    
                    <label for="cpassword" class="pl">Confirm Password</label> <br>
                    <div class="password-input">
                        <input type="password" class="pl" name="cpassword" id="cpassword" required placeholder="******">
                        <i class="fas fa-eye" id="toggleCPassword" style="display:none"></i>
                    </div>
                    <br><br>
                    </div><div class="form-1">
                        <p>By signing up, you agree to our <a href="#">Terms and Conditions</a>.</p>
                        <div class="form-submit">
                            <input type="submit" value="Sign Up" class="bt">
                        </div>
                         <p> Already have an account? <a href="login.php">Click here</a></p>
            
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const toggleCPassword = document.getElementById('toggleCPassword');
        const password = document.getElementById('password');
        const cpassword = document.getElementById('cpassword');

        togglePassword.addEventListener('click', function() {
            const type = password.type === 'password' ? 'text' : 'password';
            password.type = type;
            this.classList.toggle('fa-eye-slash');
        });

        toggleCPassword.addEventListener('click', function() {
            const type = cpassword.type === 'password' ? 'text' : 'password';
            cpassword.type = type;
            this.classList.toggle('fa-eye-slash');
        });
</script>
</body>
</html>