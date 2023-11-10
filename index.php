<?php 
include('header.php');
  echo '<div id="carouselExampleFade" class="carousel slide carousel-fade">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="pics/1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 class="display-3 text-dark">We`re here when you need us — for every care in the world.</h1>
        </div>
      </div>
      <div class="carousel-item">
        <img src="pics/2.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3>Some representative placeholder content for the first slide.</h3>
        </div>
      </div>
      <div class="carousel-item">
        <img src="pics/3.jpg" class="d-block w-100 " alt="...">
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
  <div class="container-fluid text-bg-success">
    <h1 class="display-4 text-center">Dive in for your health</h1>
  </div>
  <div class="card-group row-cols-1 row-cols-md-2">
    <div class="card">
      <img src="pics/gettyimages-647783440-612x612_edited.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title">Our Docter`s</h4>
        <p class="card-text fs-4">Search by name , speciality and get to know more.</p>
        <a href="doctor.php" class="btn btn-primary">Find a Doctor</a>
      </div>
    </div>
    <div class="card">
      <img src="pics/gettyimages-1026221208-612x612.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title">Services</h4>
        <p class="card-text fs-4">Know about the services provided for the well being of our patient`s.</p>
        <a href="service.php" class="btn btn-primary">Get To Know</a>
      </div>
    </div>
    <div class="card">
      <img src="pics/gettyimages-1295790747-612x612.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h4 class="card-title">Appointments</h4>
        <p class="card-text fs-4">Schedule an appointment now.</p>
        <div>
          <div class="btn-group">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Schedule Now
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="appointment.php">New Patient</a></li>
              <li><a class="dropdown-item" href="plogin.php">Registered Patient</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>';
  include('footer.php');
  ?>