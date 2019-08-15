<?php require 'header.php'; ?>

<!--Start: header-->
<center><h3 class="heading text-muted">DOCTOR | EDIT PROFILE</h3></center>
<!--end: header-->

<!--Start: Form content-->

<div class="edit-box bg-light p-5">
  <form action="changeProfile.inc.php?" class="edit-form p-4" method="POST">
    <div class="information">
      <!--heading-->
      <center><h6 class="patient-name text-primary" ><?php echo $_SESSION['doctor_fullname'] ?>'s Profile</h6></center><br>
      
<?php
require 'dbh.php';
  if (isset($_GET['row'])) {
      $row = $_GET['row'];
      $sql1 = "SELECT * FROM doctors WHERE doctor_no = $row";
      $result1 = mysqli_query($conn, $sql1);
      $row1 = mysqli_fetch_assoc($result1);
    }  
  //specialization input
  if (isset($_GET['specialization'])) {
    $specialization = $_GET['specialization'];
    echo '<p class="text-muted">Doctor Specialization</p>
      <select class="specialization" name="specialization">';
      require 'dbh.php';
      $sql = "SELECT * FROM specializations WHERE display = 'yes'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option>'.$row['specialization_name'].'</option>';
        }
      }
      echo '</select><br><br>';
  }
  else {
    echo '<p class="text-muted">Doctor Specialization</p>
      <select class="specialization" name="specialization">';
      echo '<option>'.$_SESSION['doctor_specialization'].'</option>';
      require 'dbh.php';
      $sql = "SELECT * FROM specializations WHERE display = 'yes'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option>'.$row['specialization_name'].'</option>';
        }
      }
      echo '</select><br><br>';
  }

  //fullname input
  if (isset($_GET['doctor'])) {
    $doctor = $_GET['doctor'];
    echo '<p class="text-muted">Doctor Name</p>
      <input type="text" placeholder="Current Name" class="doctor" name="doctor" value="'.$doctor.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Doctor Name</p>
      <input type="text" class="doctor" name="doctor" value="'.$_SESSION['doctor_fullname'].'"><br><br>';
  }

  //address input
  if (isset($_GET['address'])) {
    $address = $_GET['address'];
    echo '<p class="text-muted">Clinic Address</p>
    <input type="text" class="address" name="address" value="'.$address.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Clinic Address</p>
    <input type="text" class="address" name="address" value="'.$_SESSION['doctor_address'].'"><br><br>';
  }

  //fees input
  if (isset($_GET['fee'])) {
    $fee = $_GET['fee'];
    echo '<p class="text-muted">Doctor Consultancy Fees</p>
      <input type="text" class="fee" name="fee" value="'.$fee.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Doctor Consultancy Fees</p>
      <input type="text" class="fee" name="fee" value="'.$_SESSION['doctor_fee'].'"><br><br>';
  }

  //phone number input
  if (isset($_GET['number'])) {
    $number = $_GET['number'];
    echo '<p class="text-muted">Doctor Contanct Number</p>
    <input type="number" class="number" name="number" placeholder="Current Number" value="'.$number.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Doctor Contanct Number</p>
    <input type="number" class="number" name="number" placeholder="Current Number" value="'.$_SESSION['doctor_number'].'"><br><br>';    
  }

  //email input
  if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo '<p class="text-muted">Doctor Email Address</p>
    <input type="email" class="email" name="email" placeholder="Current Email Address" value="'.$email.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Doctor Email Address</p>
    <input type="email" class="email" name="email" placeholder="Current Email Address" value="'.$_SESSION['doctor_email'].'"><br><br>';
  }
?>


<!--DISPLAY ERROR MESSAGES-->

<?php
  if (isset($_GET['err'])) {
    $errorCheck = $_GET['err'];

    //if any field is empty
    if ($errorCheck == "empty") {
      echo '<p class="text-danger">You did not fill out all the fields!</p>';
    }
    //if name is invalid
    if ($errorCheck == "doctor") {
      echo '<p class="text-danger">Only letters are allowed in Full Name!</p>';
    }    
    //if email is invalid
    if ($errorCheck == "email") {
      echo '<p class="text-danger">Enter a valid Email Address!</p>';
    }
    //if number is invalid
    if ($errorCheck == "number") {
      echo '<p class="text-danger">Enter a valid Phone Number!</p>';
    }
    //if email is invalid
    if ($errorCheck == "none") {
      echo '<p class="text-success">Profile updated successfully</p>';
    }  

  }
?>      

      <!--submit button-->
      <button class="btn btn-primary btn-sm" type="submit" name="submit">Update</button>
    </div>
    <center><p class="text-muted" style="display: inline">Done? </p><a href="dashboard.php">Return to dashboard</a></center> 
  </form>
</div>
<!--End: Form content-->

<!--Start: footer-->
<div class="footer-copyright text-center py-3 bg-light">© 2019 <strong>HMS</strong>. All rights reserved</div>
<!--Start: footer-->

<!--CSS FILE LINK-->
<link rel="stylesheet" href="css/changeProfile.css">

</body>
</html>