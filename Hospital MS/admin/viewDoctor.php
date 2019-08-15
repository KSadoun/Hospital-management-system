<?php require 'header.php'; ?>

<!--Heading-->
<center>   <h3 class="heading text-muted">ADMIN | VIEW DOCTORS</h3>   </center>

<!--start: Patients Table-->
<div class="wrap bg-light mb-5">
  <table class="table table-striped">
    <thead class="thead" style="background-color: #4285F4">
      <tr>
        <th scope="col" style="color: white">#</th>
        <th scope="col" style="color: white">Doctor Name</th>
        <th scope="col" style="color: white">Specialization</th>

        <th scope="col" style="color: white">Consultancy Fees</th>

        <th scope="col" style="color: white">Creation Date</th>

        <th scope="col" style="color: white">Action</th>
      </tr>
    </thead>
    <tbody>
 
<?php
require 'dbh.php';
$sql = "SELECT * FROM doctors";
$result = mysqli_query($conn, $sql);
$rowNo = 1;

//write the table from the database values for the given user
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    if ($row['display'] == 'yes') {
      echo "<tr>";
      echo "<th scope='row'>".$rowNo."</th>";
      echo "<td>".$row['doctor_fullname']."</td>";
      echo "<td>".$row['doctor_specialization']."</td>";
      echo "<td>".$row['doctor_fee']."</td>";
      echo "<td>".$row['doctor_creation_date']."</td>"; 
      echo "<td><button class='delete btn btn-primary btn-sm' data-name='".$row['doctor_fullname']."' data-row='".$row['doctor_no']."'>Delete</button>&nbsp;&nbsp;<a href='changeProfile.php?row=".$row['doctor_no']."'><button class='edit btn btn-primary btn-sm' data-row='".$row['doctor_no']."'>Edit</button></a></td>";       
    }
    else{
      echo "<tr style='background-color: #343a40;'>";
      echo "<th scope='row' class='text-light'>".$rowNo."</th>";
      echo "<td class='text-light'>".$row['doctor_fullname']."</td>";
      echo "<td class='text-light'>".$row['doctor_specialization']."</td>";
      echo "<td class='text-light'>".$row['doctor_fee']."</td>";
      echo "<td class='text-light'>".$row['doctor_creation_date']."</td>";
      echo "<td><button class='delete btn btn-danger btn-sm' data-name='".$row['doctor_fullname']."' data-row='".$row['doctor_no']."'>UnDelete</button>&nbsp;&nbsp;<a href='changeProfile.php?row=".$row['doctor_no']."'><button class='edit btn btn-primary btn-sm' data-row='".$row['doctor_no']."'>Edit</button></a></td>";
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

<center><p class="text-muted" style="display: inline-block;">Done? </p><a href="doctors.php"> Return to the previous site.</a></center>

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->

<!--JAVASCRIPT ALERT FOR THE DELETE BUTTON FUNCTIONS-->
<script>

  //on the click of any button
  $('table').on('click', 'button.delete', function(){
    console.log(this.innerHTML);
    //confirm alert that he want to delete that row
    if (this.innerHTML == "Delete") {
      if (confirm("Are you sure you want to delete '" + this.dataset.name + "'")) {
        var value = this.innerHTML;
        var row = this.dataset.row;
        $.get( "deleteDoctor.php?value=" + value + "&row=" + row );
        setTimeout(function(){location.reload();}, 500);
      }
    }
    else {
      if (confirm("Are you sure you want to UnDelete '" + this.dataset.name + "'")) {
        var value = this.innerHTML;
        var row = this.dataset.row;
        $.get( "deleteDoctor.php?value=" + value + "&row=" + row );
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
  width: 95vw;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
}

</style>
</body>
</html>