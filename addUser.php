<?php
SESSION_START();
require_once 'dbcon.php';

$username = $_POST['username']."@student";
$password = $_POST['password'];
$email = $_POST['email'];


// Handle file upload
$target_dir = "images/"; // Ensure this directory exists and is writable
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["image"]["size"] > 500000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, WEBP, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert into database
        $sql = "INSERT INTO user (username, password, email, stat, image)
        VALUES ('$username', '$password', '$email', 'PENDING', '$target_file')";

        if ($conn->query($sql) === TRUE) {  
            $_SESSION['message'] =  "Account Signup Successfully!";
            Header('Location: index.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

