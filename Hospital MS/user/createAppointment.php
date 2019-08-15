<?php require 'header.php'; ?>

<!--Start: header-->
<center><h3 class="heading text-muted">USER | BOOK APPOINTMENT</h3></center>
<!--Start: header-->

<!--Start: form content-->
<div class="edit-box bg-light p-5">
  <form action="createAppointment.inc.php" class="edit-form p-4" method="POST">
    <div class="information">
      <!--Heading-->
      <center><h6 class="patient-name text-primary" >Book Appointment</h6></center><br>
      <!--specialaization field-->
      <p class="text-muted">Doctor Specialaization</p>
      <select class="specialization" name="specialization">
        <option>Select Specialization</option>
<?php
  require 'dbh.php';
  $sql = "SELECT * FROM specializations WHERE display = 'yes'";
  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<option>'.$row['specialization_name'].'</option>';
    }
  }
?>        
      </select><br><br>
      

      <!--Doctor name field-->
      <p class="text-muted">Doctor</p>
      <select class="doctor" name="doctor">
        <option>Select Doctor</option>
      </select><br><br>



      <!--Consultancy fee field-->
      <p class="text-muted">Consultancy fee ($)</p>
      <input type="number" class="fee" name="fee" readonly><br><br>
      <!--Date field-->
      <p class="text-muted">Date</p>
      <input class="date" type="date" name="date"><br><br>
      <!--time field-->
      <p class="text-muted">Time</p>
      <input type="time" class="time" name="time"><br><br>

<?php
  if (isset($_GET['err'])) {
    $errorCheck = $_GET['err'];
    //if any fields are empty
    if ($errorCheck == "empty") {
      echo "<p class='text-danger'>You did not fill out all the fields!</p>";
    }
    //if date is soo early
    if ($errorCheck == "early") {
      echo "<p class='text-danger'>Please set the appointment after atleast an hour from now!</p>";
    }
    //if any fields are empty
    if ($errorCheck == "success") {
      echo "<p class='text-success'>Appointment created successfully!</p>";
    }
  }
?>
      
      <!--Submit button-->
      <button class="btn btn-primary btn-sm" type="submit" name="submit">Submit</button>
    </div>
    <center><p class="text-muted" style="display: inline">Done? </p><a href="dashboard.php">Return to dashboard</a></center> 
  </form>  
</div>
<!--End: Form content-->

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->

<!--SAME CSS FILE AS CHANGEPROGILE.CSS CUZ THEY CONTAIN THE SAME STYLE EXACTLY-->
<link rel="stylesheet" href="css/changeProfile.css">

<script>
  $('.specialization').change(function() {
      var value = $(this).val();
      console.log(value);
      $.ajax({
          type: 'POST',
          url: 'getDoctor.inc.php',
          data: {'value' : value},
          cache: false,
          success: function(output) {
              $('.doctor').html(null);
              $('.doctor').append(output);
              console.log(output);
          },
      });
  });

    $('.doctor').change(function() {
      var value1 = $(this).val();
      console.log(value1);
      $.ajax({
          type: 'POST',
          url: 'getFee.inc.php',
          data: {'value' : value1},
          cache: false,
          success: function(output) {
              $('.fee').val(output);
              console.log(output);
          },
      });
  });


</script>

</body>
</html>