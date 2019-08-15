<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Hospital Management System</title>
</head>

<body>
  
  <!--Start: top nav-->
  <nav class="navbar navbar-light bg-light">
    <a href="index.php" class="navbar-brand text-muted">Hospital Management System</a>
    <div>
    </div>
  </nav>
  <!--End: top nav-->

  <!--Start: carousel-->
  <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/slider-image1.jpg" class="d-block w-100" >
      </div>
      <div class="carousel-item">
        <img src="images/slider-image2.jpg" class="d-block w-100" >
      </div>
    </div>
  </div>  
  <!--End: carousel-->
  
  <!--Start: user-type group-->
  <div class="container-fluid bg-primary mb-5" id="user-group"> 
    <div class="row justify-content-center">
      
      <!--Grid1-->
      <div class="grid col bg-light align-items-center" id="grid1">
        <img src="images/grid-img3.png">
        <div class="text">
          <span class="text-info">Patients</span><br>
          <span class="text-muted">book Appointments</span><br>
          <a href="user/login.php"><button class="btn btn-outline-primary btn-sm mt-1">Click Here</button></a>
        </div>
      </div>
      
      <!--Grid2-->
      <div class="grid col bg-light align-items-center" id="grid2">
        <img src="images/grid-img1.png">
        <div class="text">
          <span class="text-info">Doctor's Login</span><br>
          <span class="text-muted">View Appointments</span><br>
          <a href="doctor/login.php"><button class="btn btn-outline-primary btn-sm mt-1">Click Here</button></a>
        </div>
      </div>

      <!--Grid3-->
      <div class="grid col bg-light align-items-center" id="grid3">
        <img src="images/grid-img2.png">
        <div class="text">
          <span class="text-info">Admin's Login</span><br>
          <span class="text-muted">Manage Everything</span><br>
          <a href="admin/login.php"><button class="btn btn-outline-primary btn-sm mt-1">Click Here</button></a>
        </div>
      </div>      

    </div>
  </div>
  <!--End: user-type group-->

  <!--Start: footer-->
  <div class="footer-copyright text-center py-3 bg-light">© 2019 <strong>HMS</strong>. All rights reserved
  </div>
  <!--Start: footer-->

<style>
  *{
  box-sizing: border-box;
  font-size: 1.3vw;
}

.carousel-fade .carousel-inner .carousel-item {
  transition: 0.5s;
}

.grid{
  border-radius: 25px;
  margin: 10px;
  padding: 10px;
  display: flex !important;
  text-align: center;
  
}

.grid img{
  height: 10vw;
  margin-right: 10px;
}

</style>

</body>
</html>