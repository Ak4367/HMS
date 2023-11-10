<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
  <title>CARE FOR EVER</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary nav-pills">
    <div class="container-fluid">
      <a class="navbar-brand text-bg-success text-dark" href="index.php"><img src="pics/logo1_edited.jpg" width="50"
          height="50"><strong>CARE HOSPITAL</strong></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="department.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Departments
            </a>
            <ul class="dropdown-menu dropdown-center">
              <li><a class="dropdown-item" href="department.php">Medicine</a></li>
              <li><a class="dropdown-item" href="department.php">Surgery</a></li>
              <li><a class="dropdown-item" href="department.php">Gynaecology</a></li>
              <li><a class="dropdown-item" href="department.php">Paediatrics</a></li>
              <li><a class="dropdown-item" href="department.php">E.N.T</a></li>
              <li><a class="dropdown-item" href="department.php">Dental</a></li>
              <li><a class="dropdown-item" href="department.php">Neurology</a></li>
              <li><a class="dropdown-item" href="department.php">Cardiology</a></li>
              <li><a class="dropdown-item" href="department.php">Opthalmology</a></li>
              <li><a class="dropdown-item" href="department.php">Dermatology</a></li>
              <li><a class="dropdown-item" href="department.php">Orthopaedics</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="patient.php">Patient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="doctor.php">Doctor</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Login
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="Adminlogin.php">Admin</a></li>
              <li><a class="dropdown-item" href="employeelogin.php">Employee</a></li>
              <li><a class="dropdown-item" href="plogin.php">Patient</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="about.php">About Us</a>
          </li>
        </ul>
        <div>
          <div class="btn-group">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              Appointment
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="appointment.php">New Patient</a></li>
              <li><a class="dropdown-item" href="plogin.php">Registered Patient</a></li>
            </ul>
          </div>
        </div>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>