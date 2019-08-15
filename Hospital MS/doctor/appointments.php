<?php require 'header.php'; ?>

<!--Start: header-->
<center><h3 class="heading text-muted">USER | APPOINTMENTS</h3></center>
<!--Start: header-->

<!--start: table of appointments-->
<div class="wrap bg-light">
  <table class="table table-striped">
    <thead class="thead" style="background-color: #4285F4">
      <tr>
        <th scope="col" style="color: white">#</th>
        <th scope="col" style="color: white">Patient Name</th>
        <th scope="col" style="color: white">Specialaization</th>
        <th scope="col" style="color: white">Consultancy Fee</th>
        <th scope="col" style="color: white">Appointment Date / Time</th>
        <th scope="col" style="color: white">Appointment Creation Date</th>
        <th scope="col" style="color: white">Current Status</th>
        <th scope="col" style="color: white">Action</th>
      </tr>
    </thead>
    <tbody>

<?php
require 'dbh.php';
$sql = "SELECT * FROM appointments WHERE doctor_fullname = '{$_SESSION['doctor_fullname']}' AND display = 'yes'";
$result = mysqli_query($conn, $sql);
$rowNo = 1;
$currentTime = strtotime(date("Y/m/d h:i:s"))+3600;

//write the table from the database values for the given user
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<th scope='row'>".$rowNo."</th>";
    echo "<td>".$row['patient_fullname']."</td>";
    echo "<td>".$row['doctor_specialization']."</td>";
    echo "<td>".$row['appointment_fee']."</td>";
    echo "<td>".$row['appointment_date_time']."</td>";
    echo "<td>".$row['appointment_creation_date']."</td>";
    $appointmentDate = strtotime($row['appointment_date_time']);
    $status = "Active";
    if ($appointmentDate - $currentTime <= 0) {
      $status = "Finished";
    }
    echo "<td>".$status."</td>";
    echo "<td><button class='btn btn-primary btn-sm' data-row='".$row['appointment_no']."'>Delete</button></td>";
    echo "</tr>";
    $rowNo += 1;
  }
}

?>

    </tbody>
  </table>
</div>  

<center><p class="text-muted" style="display: inline;">Done? </p><a href="dashboard.php">Return to dashboard</a></center>

<!--end: table of appointments-->

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->

<!--JAVASCRIPT ALERT FOR THE DELETE BUTTON FUNCTIONS-->
<script>

  //on the click of any button
  $('table').on('click', 'button', function(){
    console.log(this.dataset.row);
    //confirm alert that he want to delete that row
    if (confirm("Are you sure you want to delete this Appointment")) {
      var row = this.dataset.row;
      $.get( "deleteAppointment.inc.php?row=" + row );
      setTimeout(function(){location.reload();}, 500)
    }
    
  });

</script>

<style>
*{
  font-size: 1.3vw;
}
i{
  color: #6686EF
}
.heading{
  font-weight: lighter;
  margin: 3vw;
}
.wrap{
  padding: 20px;
}
.table{
  width: 95vw;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}
.footer-copyright{
  position: fixed;
  bottom: 0;
  width: 100%;
}

</style>
</body>
</html>