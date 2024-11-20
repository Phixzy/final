<?php
require_once 'dbcon.php';
echo $id = $_POST['userid'];
$sql = "UPDATE user SET stat='ENROLLED' WHERE userid='$id'";

if ($conn->query($sql) === TRUE) {
    Header('Location: admin.php');
} else {
    echo "Error Updating record: " . $conn->error;
}
$conn->close();
?>