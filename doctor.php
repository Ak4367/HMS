<?php
include('header.php');
include('bundle/_dbconnect.php');
$sql = "SELECT * FROM  doctor JOIN  doctor_timings WHERE  doctor_timings.doctorid = doctor.doctorid";
$result = mysqli_query($conn, $sql);
?>
<div class="card-body bg-dark text-white text-center">
  <h2 class="card-title">Get To Know Your Doctor</h2>
</div>
    <div class="row bg-dark  row-cols-md-3 ">
    <?php
    while ($data = mysqli_fetch_assoc($result)) {
     echo ' <div class="col px-3 py-3">
        <div class="card border-success">
          <div class="card-body">'?>
          <?php
          $sql1 = "SELECT * FROM  department JOIN doctor WHERE  department.departmentid = doctor.departmentid";
          $result1 = mysqli_query($conn, $sql1);
          while($data1 = mysqli_fetch_assoc($result1)){
          if($data['doctorid'] == $data1['doctorid']){
            $a = $data1['departmentid'];
            $b = $data1['departmentname'];
            echo '<div class="card-header bg-secondary text-white">Department Id - '.$a.'<br> Department Name -'.$b.'</div>';
          }
        }
          echo '<div class="card-header bg-info text-dark">Doctor ID-' . $data['doctorid'] . '<br> Doctor Name' . $data['doctorname'] . '</div>
          <h6 class="card-title">Timing : ' . $data['start_time'] . '  To  ' . $data['end_time'] . ' </h6>
          <h6 class="card-text">Qualification : ' . $data['education'] . '</h6>
          <h6 class="card-text">Experience : ' . $data['experience'] . '</h6>
          <h6 class="card-text">consultancy_charge :RS- ' . $data['consultancy_charge'] . '</h6>
          </div>
        </div>
      </div>';
    
    }
    ?>
  </div>

<?php
include('footer.php');
?>