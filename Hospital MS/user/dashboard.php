<?php require 'header.php'; ?>

  <!--Start: header-->
  <center><h3 class="heading text-muted">USER | DASHBOARD</h3></center>
  <!--Start: header-->

  <!--Start: Options-->
  <div class="row fluid w-100 grids bg-light">
    <div class="col grid p-3">
      <i class="fa fa-smile-o fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">My Profile</h3>
      <a href="changeProfile.php"><button class="btn btn-outline-primary">Edit Profile</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-terminal fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">Book My Appointment</h3>
      <a href="createAppointment.php"><button class="btn btn-outline-primary">Create Appointment</button></a>
    </div>
    <div class="col grid p-3">
      <i class="fa fa-paperclip fa-2x"></i>
      <h3 class="text-black" style="font-weight: lighter;">My appointments</h3>
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