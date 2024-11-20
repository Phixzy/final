<?php
session_start(); 
include "dbcon.php";

if (isset($_POST['delete'])) {
    $id = $_POST['userid'];
    $sql = "DELETE FROM user WHERE userid='$id'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Student's Account Deleted Successfully";
        Header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>