<?php require 'header.php'; ?>

  <!--Start: header-->
  <center><h3 class="heading text-muted">ADMIN | DASHBOARD</h3></center>
  <!--Start: header-->

  <!--Start: Options-->
  <div class="row fluid w-100 grids bg-light">
    <div class="col grid p-3">
      <i class="fa fa-tasks fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Add / Manage Specialaization</h3>
      <a href="addSpecialization.php"><button class="btn btn-outline-primary">View Specialaizations</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-plus fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Add Doctors</h3>
      <a href="addDoctor.php"><button class="btn btn-outline-primary">Let's Add Him</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-edit fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Edit Doctors</h3>
      <a href="viewDoctor.php"><button class="btn btn-outline-primary">View Doctors</button></a>
    </div>
  </div>
  <!--End: Options-->
    <center><p class="text-muted" style="display: inline;">Done?</p><a href="dashboard.php"> Return to dashboard</a></center>

  <!--Start: footer-->
  <div class="footer-copyright text-center py-3 bg-light fixed-bottom">© 2019 <strong>HMS</strong>. All rights reserved</div>
  <!--end: footer-->

<!--CSS LINK FILE-->
  <link rel="stylesheet" href="css/dashboard.css">

<style>
  *{
    font-size: 1.3vw;
  }
  .heading{
    font-weight: lighter;
    margin: 3vw;
  }
</style>

</body>
</html>  