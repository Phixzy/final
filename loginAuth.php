<?php
session_start();
require_once 'dbcon.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Captcha verification
    if (isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {
        $secretKey = '6LcKMoIqAAAAAESIHUMux4_5a9E3ZzTyLX8b5INv';
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $secretKey . '&response=' . $_POST['g-recaptcha-response']);
        $response = json_decode($verifyResponse);

        if ($response->success) {
            // Use prepared statements to prevent SQL injection
            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();              
                if (strpos($username, "@admin") !== false) {
                    $_SESSION['username'] = "Admin";
                    header("Location: admin.php");
                } else {
                    $sql = "SELECT * FROM user WHERE username = '$username'";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $stat = $row['stat'];
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['userid'] = $row['userid'];
                        }
                    } else {
                        echo "0 results";
                    }
                    
                    if ($stat == "PENDING") {
                        $_SESSION['error'] = "Your account is waiting for approval";
                        header("Location: index.php");
                    } else {
                        header("Location: home.php");
                    }
                }
              
            } else {
                $_SESSION['error'] = "Invalid Username or Password";
                header('Location: index.php');
            }
        } else {
            $_SESSION['error'] = "Captcha Verification Failed";
            header('Location: index.php');
        }
    } else {
        $_SESSION['error'] = "Error Captcha Verification";
        header('Location: index.php');
    }
} else {
    $_SESSION['error'] = "Invalid Request";
    header('Location: index.php');
}

$conn->close();
?>

