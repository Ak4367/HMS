<?php
require_once('bundle/_dbconnect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:Adminlogin.php");
    exit;
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = "select * from admin where username = '$username' AND password ='$password'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);
echo '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex bg-dark" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4  fs-4 fw-bold text-uppercase border-bottom"> <a class="navbar-brand text-bg-success text-dark" href="index.php"><img src="pics/logo1_edited.jpg" width="50"
            height="50"><strong>CARE HOSPITAL</strong></a></div>
            <div class="list-group list-group-flush my-3 bg-dark">
                <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-project-diagram me-2"></i>Patients</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-chart-line me-2"></i>Doctors</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-paperclip me-2"></i>Department</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-shopping-cart me-2"></i>Medicine</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-gift me-2"></i>Employees</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-comment-dots me-2"></i>Chat</a>
                <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-map-marker-alt me-2"></i>Appointments</a>
                <a href="Adminlogout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div class="bg-info" id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark py-4 px-4">
                <div class="d-flex align-items-center text-white">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Welcome ' . $data['adminname'] . '</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav bg-white ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>' . $data['username'] . '
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="admin/admprofile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="admin/Adminlogout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        <div class="container text-start">
            <div class="row mb-3 py-3 px-3">
              <div class="col">
                <h4>Admin Id:</h4> 
              </div>
              <div class="col-sm-10">
                <h4> ' . $data['adminid'] . '</h4> 
              </div>
            </div>
            <div class="row mb-3 py-3 px-3">
              <div class="col">
                <h4>Admin Name:</h4> 
              </div>
              <div class="col-sm-10">
                <h4> ' . $data['adminname'] . '</h4>
                 
              </div>
            </div>
            <div class="row mb-3 py-3 px-3">
              <div class="col">
                <h4>Username:</h4> 
              </div>
              <div class="col-sm-10">
                <h4> ' . $data['username'] . '</h4> 
              </div>
            </div>
            <div class="row mb-3 py-3 px-3">
              <div class="col">
                <h4>Email:</h4> 
              </div>
              <div class="col-sm-10">
                <h4> ' . $data['Email'] . '</h4> 
              </div>
            </div>
            <div class="row mb-3 py-3 px-3">
              <div class="col">
                <h4>Contact Number:</h4> 
              </div>
              <div class="col-sm-10">
                <h4> ' . $data['Contact Number'] . '</h4> 
              </div>
            </div>
        </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>'
    ?>