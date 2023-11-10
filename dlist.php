<?php
$err = false;
require_once('bundle/_dbconnect.php');
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
$sql = "SELECT * FROM doctor JOIN department where doctor.departmentid = department.departmentid;";
$result = mysqli_query($conn, $sql);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql1 = "INSERT INTO doctor( doctorname, mobileno, departmentid, username, password, status, education, experience, consultancy_charge) VALUES('$_POST[name]','$_POST[contact]','$_POST[department]','$_POST[username]','$_POST[password]','$_POST[status]','$_POST[qualification]','$_POST[experience]','$_POST[consultancy]')";
    $result3 = mysqli_query($conn, $sql1);
    header('location:dlist.php');
    if (!$result3) {
        $err = true;
    }
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
            <div>
                <div class="container bg-secondary px-3 py-3">
                    <?php
                    if ($err) {
                        echo $err = "Please check the data entered";
                    }
                    ?>
                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Add Doctor
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Details</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!---Add doctor form start --->
                                    <form action="/project/dlist.php" method="post" class="row g-3">
                                        <div class="col-md-6">
                                            <label for="name" class="form-label">Doctor Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Nmae">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="contact" class="form-label">Contact</label>
                                            <input type="text" name="contact" class="form-control" id="contact"
                                                placeholder="phone Number">
                                        </div>
                                        <div class="col-12">
                                            <label for="department" class="form-label">Department Id</label>
                                            <input type="text" name="department" class="form-control" id="department"
                                                placeholder="Department">
                                        </div>
                                        <div class="col-12">
                                            <label for="username" class="form-label">Username</label>
                                            <input type="text" name="username" class="form-control" id="username"
                                                placeholder="username">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" id="password"
                                                placeholder="password">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="status" class="form-label">status</label>
                                            <select id="status" name="status" class="form-select">
                                                <option selected>Choose...</option>
                                                <option>Active</option>
                                                <option>Deactive</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="Qualification" class="form-label">Education</label>
                                            <input type="text" name="qualification" class="form-control"
                                                id="Qualification">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="experience" class="form-label">Experience</label>
                                            <input type="text" name="experience" class="form-control" id="experience"
                                                placeholder="Experience">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="consultancy" class="form-label">Consultancy_charge</label>
                                            <input type="text" name="consultancy" class="form-control" id="consultancy"
                                                placeholder="Experience">
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </form>
                                    <!--- Add doctor form end --->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-success table-stripped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                    <tbody>
                        <tr>
                            <th scope="row">
                                <?php echo $row['doctorid'] ?>
                            </th>
                            <td>
                                <?php echo $row['doctorname'] ?>
                            </td>
                            <td>
                                <?php echo $row['departmentname'] ?>
                            </td>
                            <td>
                                <?php echo $row['education'] ?>
                            </td>
                            <td>
                                <?php echo $row['mobileno'] ?>
                            </td>
                            <td>
                                <?php echo $row['experience'] ?>
                            </td>
                            <td>
                               <form action="/project/edit.php" method="post">
                                <input type="hidden" name="edit" value="<?php echo $row['doctorid'] ?>">
                               <button type="submit" name="edit_btn" class="btn btn-success">Edit</button>
                               </form>
                        </td>
                        <td>
                        <form action="/project/edit.php" method="post">
                                <input type="hidden" name="del" value="<?php echo $row['doctorid'] ?>">
                               <button type="submit" name="del_btn" class="btn btn-danger">Delete</button>
                               </form>
                        </td>
                        </tr>
                    </tbody>
                    <?php
                        }
                    } else
                        echo "No records found";
                    ?>
                </table>
            </div>
        </div>
    </div>
    
    <!-- /#page-content-wrapper -->
    </div>
    <script>if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>