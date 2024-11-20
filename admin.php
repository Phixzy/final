<?php
include "adplug.php";
include 'dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php">∞</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="#!">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        
                           
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="index.php">Login</a>
                                            <a class="nav-link" href="index.php">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <a class="nav-link" href="weather.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-cloud-sun-rain"></i></div>
                                Weather
                            </a>
                            <a class="nav-link" href="email/mail.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-square-envelope"></i></div>
                                E-mail
                            </a>
                        </div>
                    </div>
                   
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Activity</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Weather</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="weather.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                           
                            
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa-solid fa-cloud-sun-rain"></i>                         
                                            Weather
                                </div>

                                    <div class="card-body">
                                        <a href="weather.php"><img src="weather.png" alt="weather.png" width="100%" height=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                    <i class="fa-solid fa-comment"></i>                                       
                                    Chat Room
                                    </div>
                                    <div class="card-body">
                                    <a href="home.php"><img src="chat.jpg" alt="chat.jpg" width="93%" height=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Student's List
                            </div>
                       
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Username</th>
                                            <th>E-mail</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Password</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    
                                    <tbody>
                                    <?php
                               $sql = "SELECT * FROM user";
                               $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                   $counter = 1;
                                   while ($row = $result->fetch_assoc()) {
                                       if ($row['username'] != "admin@admin"){
                            ?>
                                        <tr>
                                        <td><?= $counter ?></td>
                                        <form action="addStudent.php" method="POST">
                                        <input type="hidden" name="userid" value="<?=$row['userid']?>">
                                            <td><div class="client-img bg-img" style="background-image: url(<?php echo ($row['image']); ?>)"></div></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['password'] ?></td>
                                            <td><?= $row['stat'] ?></td>
                                            <td>
                                            <button type="submit"style="border: none; background: none; cursor: pointer;"><i class="fa-solid fa-address-book"></i></span></button>
                                            </form>    
                                            
                                            <form action="profile.php" method="POST">
                                                <input type="hidden" name="userid" value="<?=$row['userid']?>">
                                                <button style="border: none; background: none; cursor: pointer;"type="submit" name="edit">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                                </button>
                                            </form>

                                            <form action="delete.php" method="POST">
                                                <input type="hidden" name="userid" value="<?=$row['userid']?>">
                                                <button type="submit" name="delete" style="border: none; background: none; cursor: pointer;">
                                                <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>                                
                                        </td>
                                            <?php
                                        }
                                ?>
                                        </tr>
                                        <?php
                                $counter++;

                                        }
                                    }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
           
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
