<?php require 'header.php'; ?>

<!--Heading-->
<center>   <h3 class="heading text-muted">ADMIN | ADD DOCTOR SPECIALIZATION</h3>   </center>

<!--add specilization box-->
<div class="wrapper row fluid bg-light mt-5 p-5 justify-content-center">
  <form action="addSpecialization.inc.php" method="POST" class="p-3">
    <p class="text-muted">Add Doctor Specialization</p>
    
<?php
  if (isset($_GET['specialization'])) {
    $specialization = $_GET['specialization'];
    echo '<input type="text" placeholder="Add Specialization" name="specialization" value="'.$specialization.'">';
  }
  else{
    echo '<input type="text" placeholder="Add Specialization" name="specialization">';
  }

  if (isset($_GET['err'])) {
    $errorCheck = $_GET['err'];
    if ($errorCheck == "empty") {
      echo '<span class="text-danger" style="display:block">Please fill out this field!</span>';
    }
    elseif($errorCheck == "none"){
      echo '<span class="text-success" style="display:block">Specialization added successfully!</span>';      
    }
    elseif($errorCheck == "invalid"){
      echo '<span class="text-danger" style="display:block">Specialization present already!</span>';      
    }
  }
?>
    <button class="btn btn-outline-primary mt-3" type="submit" name="submit">Submit</button>
  </form>
</div>

<center>   <h3 class="heading text-muted">ADMIN | VIEW DOCTOR SPECIALIZATIONS</h3>   </center>

<!--start: dOCTOR'S Table-->
<div class="wrap bg-light mb-5">
  <table class="table table-striped">
    <thead class="thead" style="background-color: #4285F4">
      <tr>
        <th scope="col" style="color: white">#</th>
        <th scope="col" style="color: white">Specialization</th>
        <th scope="col" style="color: white">Creation Date</th>
        <th scope="col" style="color: white">Action</th>
      </tr>
    </thead>
    <tbody>
      
<?php
  require 'dbh.php';
  $sql = "SELECT * FROM specializations WHERE display = 'yes' ORDER BY specialization_name ASC";
  $result = mysqli_query($conn, $sql);
  $rowNo = 1;
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo "<th scope='col'>".$rowNo."</th>";
      echo '<td>'.$row['specialization_name'].'</td>';
      echo '<td>'.$row['specialization_creation_date'].'</td>';
      echo '<td><button class="btn btn-primary btn-sm" data-name="'.$row['specialization_name'].'" data-row="'.$row['specialization_no'].'">Delete</button></td>';
      echo '</tr>';
      $rowNo += 1;
    }
  }
?>

    </tbody>
  </table>
</div>  
<!--End: Doctore's table-->

  <center><p class="text-muted" style="display: inline;">Done?</p><a href="doctors.php"> Return to the preivous site</a></center>


<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light mt-5">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--end: footer-->

<script>
    //on the click of any button
    $('table').on('click', 'button', function(){
      console.log(this.innerHTML);
      //confirm alert that he want to delete that row
      if (confirm("Are you sure you want to delete '" + this.dataset.name+ "'")) {
        var row = this.dataset.row;
        $.get( "deleteSpecialization.php?row=" + row );
        setTimeout(function(){location.reload();}, 500);
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
  .wrapper{
    margin-right: 0 !important;
  }
  form{
    width: 40%;
    background-color: white;
    border: 0.1vw solid #D6D6D6;
  }
  form input{
    width: 100%;
    border: 0.1vw solid #D5D5D5;
    padding-left: 0.5vw;
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