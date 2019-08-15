<?php require 'header.php'; ?>

  <!--Start: header-->
  <center><h3 class="heading text-muted">USER | DASHBOARD</h3></center>
  <!--Start: header-->

  <!--Start: Options-->
  <div class="row fluid w-100 grids bg-light">
    <div class="col grid p-3">
      <i class="fa fa-user fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Manage Patients</h3>
      <a href="patients.php"><button class="btn btn-outline-primary">View Patients</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-user-md fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Manage Doctors</h3>
      <a href="doctors.php"><button class="btn btn-outline-primary">View Doctors</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-paperclip fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Appointments</h3>
      <a href="appointments.php"><button class="btn btn-outline-primary">View Appointments</button></a>
    </div>
  </div>
  <!--End: Options-->
  
  <!--Start: footer-->
  <div class="footer-copyright text-center py-3 bg-light fixed-bottom">© 2019 <strong>HMS</strong>. All rights reserved</div>
  <!--end: footer-->

<!--CSS LINK FILE-->
  <link rel="stylesheet" href="css/dashboard.css">

</body>
</html>  