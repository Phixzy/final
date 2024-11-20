<?php
SESSION_START();
if (!isset($_SESSION['status'])) {
    $_SESSION['status'] = "not login"; 
}

include "plugin.php";
include "dbcon.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function enableSubmitBtn(){
            document.getElementById("mySubmit").disabled = false;
        }

    </script>
    
    <link rel="stylesheet" href="style.css">
    <title>Login & Registration</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>∞</p>
        </div>
        <div class="nav-menu" id="navMenu">
            <ul>
                <li><a href="#" class="link active">Home</a></li>
                <li><a href="#" class="link">Blog</a></li>
                <li><a href="#" class="link">Services</a></li>
                <li><a href="#" class="link">About</a></li>
            </ul>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">
  
        <!------------------- login form -------------------------->
    <form action="loginAuth.php" method="POST">
    <?php
        if (isset($_SESSION['message'])) {
            ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <?php
                echo $_SESSION['message'];
                ?>
            </div>
            <?php
        }

        unset($_SESSION['message']);
        ?>
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="username" placeholder="Username or Email" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" name="password" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                ?>
                <p class="text-danger"><i class="fa fa-exclamation-circle"></i>
                    <strong>
                    <?php
                    echo $_SESSION['error'];
                    ?>
                    </strong>
                </p>
            <?php
                unset($_SESSION['error']); 
            }
            ?>
            <div class="input-box">
                <div class="g-recaptcha" data-sitekey="6LcKMoIqAAAAAB29CC0aoxgcxRpV3NTNWyNoYzxC" data-callback="enableSubmitBtn"></div>
                <input type="submit" name="login" id="mySubmit" class="submit" disabled="disabled" value="Sign In">
            </div>

           


            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
    </form>
 <script src="https://www.google.com/recaptcha/api.js"></script>

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
        <div class="top">
            <span>Have an account? <a href="#" onclick="login()">Login</a></span>
            <header>Sign Up</header>
        </div>
        <form action="addUser.php" method="post" enctype="multipart/form-data">
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" name="username" placeholder="Username" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" name="password" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" name="email" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <label for="fileToUpload" class="file-label">Choose File</label>
                <input type="file" name="image" id="fileToUpload" class="file-input" required />
            </div>
            <div class="input-box">
                <input type="submit" name="submit" value="Register" class="submit" />
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </form>
    </div>
</div>   

<script>
   
   function myMenuFunction() {
    var i = document.getElementById("navMenu");

    if(i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
   }
 
</script>

<script>

    var a = document.getElementById("loginBtn");
    var b = document.getElementById("registerBtn");
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
    x.style.left = "0";
    y.style.left = "100%";
    a.className += " white-btn";
    b.className = "btn";
    x.style.opacity = 1;
    y.style.opacity = 0;
}

function register() {
    x.style.left = "-100%"; 
    y.style.left = "0"; 
    a.className = "btn";
    b.className += " white-btn";
    x.style.opacity = 0;
    y.style.opacity = 1;
}
</script>
<script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
</body>
</html>

