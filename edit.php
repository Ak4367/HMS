<?php
include('bundle/_dbconnect.php');
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location:Adminlogin.php");
    exit;
}
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$sql = "select * from admin where username = '$username' AND password ='$password'";
$result1 = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result1);
if (isset($_POST['upd_btn'])) {
    $id = $_POST["update"];
    $sqli = "UPDATE doctor SET doctorname='$_POST[name]',mobileno='$_POST[contact]',departmentid='$_POST[department]',username='$_POST[username]',password='$_POST[password]',status='$_POST[status]',education='$_POST[qualification]',experience='$_POST[experience]',consultancy_charge='$_POST[consultancy]' WHERE doctorid = '$id'";
    $update = mysqli_query($conn, $sqli);
    header('location:dlist.php');
    exit;
}
if (isset($_POST['del_btn'])) {
    $id2 = $_POST["del"];
    $sqli = "DELETE FROM doctor WHERE doctorid = '$id2'";
    $update = mysqli_query($conn, $sqli);
    header('location:dlist.php');
    exit;
}
?>


        <!DOCTYPE html>
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
            <div class="d-flex" id="wrapper">
                <!-- Sidebar -->
                <div class="bg-white" id="sidebar-wrapper">
                    <div class="sidebar-heading bg-success text-center py-4  fs-4 fw-bold text-uppercase border-bottom"> <a
                            class="navbar-brand  text-dark" href="index.php"><img src="pics/logo1_edited.jpg" width="50"
                                height="50"><strong>CARE HOSPITAL</strong></a></div>
                    <div class="list-group py-3 list-group-flush bg-dark">
                        <a href="admin.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                                class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                        <a href="plist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-project-diagram me-2"></i>Patients</a>
                        <a href="dlist.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-chart-line me-2"></i>Doctors</a>
                        <a href="deplist.php"
                            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-paperclip me-2"></i>Department</a>
                        <a href="medlist.php"
                            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-shopping-cart me-2"></i>Medicine</a>
                        <a href="emplist.php"
                            class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-gift me-2"></i>Employees</a>
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-comment-dots me-2"></i>Chat</a>
                        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                                class="fas fa-map-marker-alt me-2"></i>Appointments</a>
                        <a href="Adminlogout.php"
                            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                class="fas fa-power-off me-2"></i>Logout</a>
                    </div>
                </div>
                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->
                <div class="bg-white" id="page-content-wrapper">
                    <nav class="navbar navbar-expand-lg navbar-light bg-dark py-4 px-4">
                        <div class="d-flex align-items-center text-white">
                            <i class="fas fa-align-left fs-4 me-3" id="menu-toggle"></i>
                            <h2 class="fs-2 m-0">Welcome
                                <?php echo $data['adminname'] ?>
                            </h2>
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
                                        <i class="fas fa-user me-2"></i>
                                        <?php echo $username ?>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="admprofile.php">Profile</a></li>
                                        <li><a class="dropdown-item" href="#">Settings</a></li>
                                        <li><a class="dropdown-item" href="Adminlogout.php">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <?php
                    if (isset($_POST['edit_btn'])) {
    $i = $_POST["edit"];
    $sql = "select * from doctor where doctorid = '$i'";
    $res = mysqli_query($conn, $sql);
    foreach ($res as $row) 
    {?>
                    <div class="px-3">
                        <div class="container bg-info px-3 py-3">
                            <form action="/project/edit.php" method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Doctor Name</label>
                                    <input type="text" value="<?php echo $row['doctorname'] ?>" name="name" class="form-control"
                                        id="name" placeholder="Name">
                                </div>
                                <div class="col-md-6">
                                    <label for="contact" class="form-label">Contact</label>
                                    <input type="text" value="<?php echo $row['mobileno'] ?>" name="contact"
                                        class="form-control" id="contact" placeholder="phone Number">
                                </div>
                                <div class="col-12">
                                    <label for="department" class="form-label">Department Id</label>
                                    <input type="text" value="<?php echo $row['departmentid'] ?>" name="department"
                                        class="form-control" id="department" placeholder="Department">
                                </div>
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" value="<?php echo $row['username'] ?>" name="username"
                                        class="form-control" id="username" placeholder="username">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" value="<?php echo $row['password'] ?>" name="password"
                                        class="form-control" id="password" placeholder="password">
                                </div>
                                <div class="col-md-4">
                                    <label for="status" class="form-label">status</label>
                                    <select id="status" value="<?php echo $row['status'] ?>" name="status" class="form-select">
                                        <option selected>Choose...</option>
                                        <option>Active</option>
                                        <option>Deactive</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="Qualification" class="form-label">Education</label>
                                    <input type="text" value="<?php echo $row['education'] ?>" name="qualification"
                                        class="form-control" id="Qualification">
                                </div>
                                <div class="col-md-4">
                                    <label for="experience" class="form-label">Experience</label>
                                    <input type="text" value="<?php echo $row['experience'] ?>" name="experience"
                                        class="form-control" id="experience" placeholder="Experience">
                                </div>
                                <div class="col-md-4">
                                    <label for="consultancy" class="form-label">Consultancy_charge</label>
                                    <input type="text" value="<?php echo $row['consultancy_charge'] ?>" name="consultancy"
                                        class="form-control" id="consultancy" placeholder="Experience">
                                </div>
                                <div class="col-12">
                                <input type="hidden" name="update" value="<?php echo $row['doctorid'] ?>">
                                    <button type="submit" name="upd_btn" class="btn btn-success">Update</button>
                                </div>
                                <div class="col-12">
                                    <a href="dlist.php" class="btn btn-warning">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php
    }
}
?>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function () {
                    el.classList.toggle("toggled");
                };
            </script>
</body>