<?php require 'header.php'; ?>

<!--Start: header-->
<center><h3 class="heading text-muted">ADMIN | ADD DOCTOR</h3></center>
<!--Start: header-->

<!--Start: Form content-->
<div class="edit-box bg-light p-5">
  <form action="addDoctor.inc.php" class="edit-form p-4" method="POST">
    <div class="information">
      <!--heading-->
      <center><h6 class="patient-name text-primary" >Add Doctor</h6></center><br>
      <!--doctor specialaization field-->
      <p class="text-muted">Doctor Specialization</p>
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

<?php
//fullname
if (isset($_GET['fullname'])) {
  $fullname = $_GET['fullname'];
  echo '<p class="text-muted">Doctor Name</p>
      <input type="text" placeholder="Doctor Name" class="namee" name="name" value="'.$fullname.'"><br><br>';
}
else {
  echo '<p class="text-muted">Doctor Name</p>
  <input type="text" placeholder="Doctor Name" class="namee" name="name"><br><br>';  
}
//address
if (isset($_GET['address'])) {
  $address = $_GET['address'];
  echo '<p class="text-muted">Clinic Address</p>
      <input type="text" placeholder="Address" class="address" name="address" value="'.$address.'"><br><br>';
}
else {
  echo '<p class="text-muted">Clinic Address</p>
  <input type="text" placeholder="Address" class="address" name="address"><br><br>';  
}
//fee
if (isset($_GET['fee'])) {
  $fee = $_GET['fee'];
  echo '<p class="text-muted">Doctor Consultancy Fees</p>
      <input type="text" placeholder="Fees" class="fee" name="fee" value="'.$fee.'"><br><br>';
}
else {
  echo '<p class="text-muted">Doctor Consultancy Fees</p>
  <input type="text" placeholder="Fees" class="fee" name="fee"><br><br>';  
}
//number
if (isset($_GET['number'])) {
  $number = $_GET['number'];
  echo '<p class="text-muted">Contact Number</p>
      <input type="number" placeholder="Phone Number" class="number" name="number" value="'.$number.'"><br><br>';
}
else {
  echo '<p class="text-muted">Contact Number</p>
  <input type="number" placeholder="Phone Number" class="number" name="number"><br><br>';  
}
//email
if (isset($_GET['email'])) {
  $email = $_GET['email'];
  echo '<p class="text-muted">Email Address</p>
      <input type="text" placeholder="Email" class="email" name="email" value="'.$email.'"><br><br>';
}
else {
  echo '<p class="text-muted">Email Address</p>
  <input type="text" placeholder="Email" class="email" name="email"><br><br>';  
}
?>

<p class="text-muted">Password</p>
<input type="password" placeholder="Password" class="password" name="password"><br><br>

<?php
//ERROR HANDLING
if (isset($_GET['err'])) {
  $errorCheck = $_GET['err'];
  //if any field is empty
  if ($errorCheck == "empty") {
    echo '<p class="text-danger">You did not fill out all the fields!</p>';
  }
  //if any field is empty
  if ($errorCheck == "name") {
    echo '<p class="text-danger">Only letters are allowed in Name and Address!</p>';
  }
  //if any field is empty
  if ($errorCheck == "email") {
    echo '<p class="text-danger">Please enter a valid Email Address!</p>';
  }
  //if any field is empty
  if ($errorCheck == "number") {
    echo '<p class="text-danger">Please enter a valid Phone Number!</p>';
  }
  //if any field is empty
  if ($errorCheck == "none") {
    echo '<p class="text-success">Doctor added successfully!</p>';
  }
}
?>      
      <!--submit button-->
      <button class="btn btn-primary btn-sm" type="submit" name="submit">Add Him Dude!</button>
    </div> 
  </form>
</div>
<!--End: Form content-->
  
<center><p class="text-muted" style="display: inline;">Done?</p><a href="doctors.php"> Return to the preivous site</a></center>

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light mt-5">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->

<!--CSS FILE LINK-->
<link rel="stylesheet" href="css/changeProfile.css">

</body>
</html>