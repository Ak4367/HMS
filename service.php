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

    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary nav-pills">
      <div class="container-fluid">
        <a class="navbar-brand text-bg-success text-dark" href="index.html"><img src="logo1_edited.jpg" width="50" height="50"><strong>CARE HOSPITAL</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 nav-underline">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Health Departments
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li>
        
              <li class="nav-item">
                <a class="nav-link" href="patient.html">Patient</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="doctor.html">Doctor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="about.html">About Us</a>
              </li>
          </ul>
          <div class="btn-group">
  <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    Appointment
  </button>
  <ul class="dropdown-menu">
    <li><a class="dropdown-item" href="appointment.php">New Patient</a></li>
    <li><a class="dropdown-item" href="plogin.php">Registered Patient</a></li>
  </ul>
</div>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
    <div id="carouselExampleFade" class="carousel slide carousel-fade">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>    
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="display-3">We're here when you need us — for every care in the world.</h1>
              </div>        
          </div>
          <div class="carousel-item">
            <img src="2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h3>Some representative placeholder content for the first slide.</h3>
              </div>        
          </div>
          <div class="carousel-item">
            <img src="3.jpg" class="d-block w-100 " alt="...">
            <div class="carousel-caption d-none d-md-block">
                <p>Some representative placeholder content for the first slide.</p>
              </div>
        </div>
        </div>
    </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="false"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="false"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      <div class="container-fluid">
      </div>
  </body>
</html>