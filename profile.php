<?php
include "dbcon.php";
include "prof.php";


$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username = '$username'";
$result = $conn->query($sql);

$id = $_POST["userid"];
if (isset($_POST["submit"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    // Correcting the SQL query
    $sql = "UPDATE `user` SET `username`='$username', `password`='$password', `email`='$email' WHERE userid = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: profile.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
	<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>

</head>
<body>
<?php
                    $sql = "SELECT * FROM `user` WHERE userid = $id LIMIT 1";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    ?>
<div class="container">
    <form method="POST" action="">
        <input type="hidden" name="userid" value="<?= $row['userid']; ?>">
        <div class="row">
            <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12 layout-top-spacing mx-auto">
                <div class="user-profile">
                    <div class="widget-content widget-content-area">
                        <div class="d-flex justify-content-between">
                            <h3 class="">Profile</h3>
                            <button type="submit" name="sub" class="btn btn-primary">Save Changes</button>
                        </div>
                        <div class="text-center user-info">
                            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['image']; ?>" height="20%" width="">
                            <p class="">
								Username:
                                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
                            </p>
                        </div>
                        <div class="user-info-list">
                            <ul class="contacts-block list-unstyled">
                                <li class="contacts-block__item">
									Email:
                                    <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                                </li>
								Password:
                                <li class="contacts-block__item">
                                    <input type="password" class="form-control" name="password"  value="<?php echo $row['password']; ?> placeholder="New Password">
                                </li>
                            </ul>
							<form action="admin.php" method="POST">
								<button type="button" name="sub" class="btn btn-primary" onclick="window.history.back();">Back</button>
							</form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>