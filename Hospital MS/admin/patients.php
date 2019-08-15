<?php require 'header.php'; ?>

<!--Heading-->
<center>   <h3 class="heading text-muted">ADMIN | MANAGE PATIENTS</h3>   </center>

<!--start: Patients Table-->
<div class="wrap bg-light ">
  <table class="table table-striped">
    <thead class="thead" style="background-color: #4285F4">
      <tr>
        <th scope="col" style="color: white">#</th>
        <th scope="col" style="color: white">Patient Name</th>
        <th scope="col" style="color: white">Address</th>
        <th scope="col" style="color: white">City</th>
        <th scope="col" style="color: white">Gender</th>
        <th scope="col" style="color: white">Email</th>
        <th scope="col" style="color: white">Creation Date</th>
        <th scope="col" style="color: white">Updation Date</th>
        <th scope="col" style="color: white">Action</th>
      </tr>

    </thead>
    <tbody>

<?php
require 'dbh.php';
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);
$rowNo = 1;

//write the table from the database values for the given user
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['display'] == 'yes') {
      echo "<tr>";
      echo "<th scope='row'>".$rowNo."</th>";
      echo "<td>".$row['patient_fullname']."</td>";
      echo "<td>".$row['patient_address']."</td>";
      echo "<td>".$row['patient_city']."</td>";
      echo "<td>".$row['patient_gender']."</td>";
      echo "<td>".$row['patient_email']."</td>";
      echo "<td>".$row['patient_creation_date']."</td>";
      echo "<td>".$row['patient_updation_date']."</td>";   
      echo "<td><button class='btn btn-primary btn-sm' data-name='".$row['patient_fullname']."' data-row='".$row['patient_no']."'>Delete</button></td>";       
    }
    else{
      echo "<tr style='background-color: #343a40;'>";
      echo "<th scope='row' class='text-light'>".$rowNo."</th>";
      echo "<td class='text-light'>".$row['patient_fullname']."</td>";
      echo "<td class='text-light'>".$row['patient_address']."</td>";
      echo "<td class='text-light'>".$row['patient_city']."</td>";
      echo "<td class='text-light'>".$row['patient_gender']."</td>";
      echo "<td class='text-light'>".$row['patient_email']."</td>";
      echo "<td class='text-light'>".$row['patient_creation_date']."</td>";
      echo "<td class='text-light'>".$row['patient_updation_date']."</td>";
      echo "<td><button class='btn btn-danger btn-sm' data-name='".$row['patient_fullname']."' data-row='".$row['patient_no']."'>UnDelete</button></td>";
    }      
    echo "</tr>";
    $rowNo += 1;
  }
}

?>

    </tbody>
  </table>
</div>  
<!--End: patients table-->
 
  <center><p class="text-muted" style="display: inline;">Done?</p><a href="dashboard.php"> Return to dashboard</a></center>

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light mt-5">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->


<!--JAVASCRIPT ALERT FOR THE DELETE BUTTON FUNCTIONS-->
<script>

  //on the click of any button
  $('table').on('click', 'button', function(){
    console.log(this.innerHTML);
    //confirm alert that he want to delete that row
    if (this.innerHTML == "Delete") {
      if (confirm("Are you sure you want to delete '" + this.dataset.name + "'")) {
        var value = this.innerHTML;
        var row = this.dataset.row;
        $.get( "deletePatient.php?value=" + value + "&row=" + row );
        setTimeout(function(){location.reload();}, 500);
      }
    }
    else {
      if (confirm("Are you sure you want to UnDelete '" + this.dataset.name + "'")) {
        var value = this.innerHTML;
        var row = this.dataset.row;
        $.get( "deletePatient.php?value=" + value + "&row=" + row );
        setTimeout(function(){location.reload();}, 500);
      } 
    }
    
  });

</script>


<style>
  *{
    font-size: 1.3vw;
  }
  .heading{
    font-weight: lighter;
    margin: 3vw;
  }
  .wrap{
  padding: 20px;
}
.table{
  width: 97vw;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}

</style>
</body>
</html>