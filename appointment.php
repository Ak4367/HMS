<?php
session_start();
$error = false;
$res = false;
$check = false;
include('header.php');
require_once('bundle/_dbconnect.php');
$sql = "SELECT * FROM department";
$result = mysqli_query($conn, $sql);
$sql = "SELECT * FROM doctor";
$result1 = mysqli_query($conn, $sql);
if (isset($_POST['registerbtn'])) {
    $type = "Out patient";
    $depid = $_POST['departmentid'];
    $d = $_POST['adate'];
    $t = $_POST['atime'];
    $docid = $_POST['doctorid'];
    $sql1 = "select * from appointment where appointmentdate ='$d' AND appointmenttime = '$t'";
    $data = mysqli_query($conn, $sql1);
    $num = mysqli_num_rows($data);
    if ($num == 0) {
        $sql = "INSERT INTO  appointment(appointmenttype, departmentid, appointmentdate, appointmenttime,doctorid) VALUES ('$type','$depid','$d','$t','$docid')";
        $result2 = mysqli_query($conn, $sql);
        if ($result2) {
            $res = true;
        } else {
            echo "Please check te credentials";
        }
    } else {
        $error = true;
    }
}
unset($_POST['registerbtn']);
if (isset($_POST['checkbtn']))
{
    $appid=$_POST['appid'];
    $check = true;
}
?>
<div class="card-body bg-dark text-white text-center">
    <h2 class="card-title">Welcome To Appointment Registration</h2>
    <h5 class="text-info">Please Reffer the Department and Doctor section for Date and Timing Details</p5>


</div>
<div class="card-body bg-dark text-white text-center">
    <?php
    if ($error) {
        echo '<h4 class="text-danger">Sorry-Please choose a Different Date Or Time</h4>';
    }
    ?>
</div>
<div class="card-body bg-dark text-white text-center">
    <?php
    if ($res) {
        $sql2 = $sql1 = "select * from appointment where appointmentdate ='$d' AND appointmenttime = '$t'";
        $dat2 = mysqli_query($conn, $sql2);
        $ares = mysqli_fetch_assoc($dat2);
        echo '
        <div class="col">
        <h4 class="text-success">Appointment Successfull - Please note down the details for further enquiry</h4>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Departmentid</th>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Time</th>
                                    <th scope="col">Doctor Id</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . $ares['appointmentid'] . '</td>
                                    <td>' . $ares['departmentid'] . '</td>
                                    <td>' . $ares['appointmentdate'] . '</td>
                                    <td>' . $ares['appointmenttime'] . '</td>
                                    <td>' . $ares['doctorid'] . '</td>
                                </tr>
                                </tbody>
                         </table>';
    }
    ?>
</div>
<div class="container-fluid bg-secondary px-3 py-3">
    <form action="/project/appointment.php" method="post">
        <div class="row px-3 py-3">
            <div class="col-md-4">
                <label for="department" class="form-label">Department</label>
                <select id="department" name="departmentid" class="form-select">
                    <option selected>Choose...</option>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <option>
                            <?php echo $row['departmentid'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="row px-3 py-3">
                <div class="col">
                    <label for="adate" class="col-sm-2 col-form-label">Apointment Date</label>
                    <input type="date" name="adate" class="form-control" id="Address">
                </div>
                <div class="col">
                    <label for="atime" class="col-sm-2 col-form-label">Appointment Time</label>
                    <input type="time" name="atime" class="form-control" id="city">
                </div>
            </div>
            <div class="col-md-4">
                <label for="doctor" class="form-label">Doctor Id</label>
                <select id="doctor" name="doctorid" class="form-select">
                    <option selected>Choose...</option>
                    <?php
                    while ($dat = mysqli_fetch_assoc($result1)) {
                        ?>
                        <option>
                            <?php echo $dat['doctorid'] ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
        </div>

        <button type="submit" name="registerbtn" class="btn btn-primary ">Register</button>
    </form>
</div>
<?php
if(!$check){
    echo '<div class="col">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Check Appointment Status
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Enter Appointment Id</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/project/appointment.php" method="post">
                        <label for="appid" class="form-label">Appointment Id</label>
                        <input type="text" name="appid" class="form-control" id="appid">
                        <button type="submit" name="checkbtn" class="btn btn-primary">Check</button>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>';}?>
    <div class="card-body bg-dark text-white text-center">
    <?php
    if ($check) {
        $sql3 = "select * from appointment where appointmentid ='$appid'";
        $dat3 = mysqli_query($conn, $sql3);
        $checkres = mysqli_fetch_assoc($dat3);
        echo '
        <div class="col">
        <h4 class="text-success">Welcome '.$appid.' - Your Appointment Status Is As Follows:</h4>
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Departmentid</th>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col">Appointment Time</th>
                                    <th scope="col">Doctor Id</th>
                                    <th scope="col">Room Id</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>' . $checkres['appointmentid'] . '</td>
                                    <td>' . $checkres['departmentid'] . '</td>
                                    <td>' . $checkres['appointmentdate'] . '</td>
                                    <td>' . $checkres['appointmenttime'] . '</td>
                                    <td>' . $checkres['doctorid'] . '</td>
                                    <td>' . $checkres['roomid'] . '</td>
                                    <td>' . $checkres['status'] . '</td>
                                </tr>
                                </tbody>
                         </table>';
    }
    ?>
</div>
<script>if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }</script>
<?php
include('footer.php');
?>