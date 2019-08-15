<?php
 require 'header.php'; 
 ?>

<!--Start: header-->
<center><h3 class="heading text-muted">USER | EDIT PROFILE</h3></center>
<!--Start: header-->

<!--Start: Form content-->
<div class="edit-box bg-light p-5">
  <form action="changeProfile.inc.php" class="edit-form p-4" method="POST">
    <div class="information">
      <!--heading-->
      <center><h6 class="patient-name text-primary" ><?php echo $_SESSION['patient_fullname']; ?>'s Profile</h6></center><br>
      
<?php
  //fullname input
  if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];
    echo '<p class="text-muted">Full Name</p>
      <input type="text" class="fullname" name="fullname" value="'.$fullname.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Full Name</p>
      <input type="text" class="fullname" name="fullname" value="'.$_SESSION['patient_fullname'].'"><br><br>';
  }

  //address input
  if (isset($_GET['address'])) {
    $address = $_GET['address'];
    echo '<p class="text-muted">Address</p>
      <input type="text" class="address" name="address" value="'.$address.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Address</p>
      <input type="text" class="address" name="address" value="'.$_SESSION['patient_address'].'"><br><br>';
  }

  //city input
  if (isset($_GET['city'])) {
    $city = $_GET['city'];
    echo '<p class="text-muted">City</p>
      <input type="text" class="city" name="city" value="'.$city.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">City</p>
      <input type="text" class="city" name="city" value="'.$_SESSION['patient_city'].'"><br><br>';
  }

  //gender input
  if (isset($_GET['gender'])) {
    $gender = $_GET['gender'];
     if ($gender == "Male"){
      echo "<p class='text-muted'>Gender</p>
        <select name='gender'><option>Male</option>
        <option>Female</option>
        <option>Other</option></select><br><br>";
       }
       //or if its female then hide the female already there
       elseif($gender == "Female") {
        echo "<p class='text-muted'>Gender</p>
          <select name='gender'><option>Female</option>
          <option>Male</option>
          <option>Other</option></select><br><br>";
       }
       else{
          echo "<p class='text-muted'>Gender</p>
          <select name='gender'><option>Other</option>
          <option>Male</option>
          <option>Female</option></select><br><br>";
       }
  }
  else {
     if ($_SESSION['patient_gender'] == "Male"){
      echo "<p class='text-muted'>Gender</p>
        <select name='gender'><option>Male</option>
        <option>Female</option>
        <option>Other</option></select><br><br>";
       }
       //or if its female then hide the female already there
       else {
        echo "<p class='text-muted'>Gender</p>
          <select name='gender'><option>Female</option>
          <option>Male</option>
          <option>Other</option></select><br><br>";
       }    
  }

  //email input
  if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo '<p class="text-muted">Email Address</p>
      <input type="text" class="email" name="email" value="'.$email.'"><br><br>';
  }
  else {
    echo '<p class="text-muted">Email Address</p>
      <input type="text" class="email" name="email" value="'.$_SESSION['patient_email'].'"><br><br>';
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
    if ($errorCheck == "name") {
      echo '<p class="text-danger">Only letters are allowed in Full Name!</p>';
    }    
    //if email is invalid
    if ($errorCheck == "email") {
      echo '<p class="text-danger">Enter a valid Email Address!</p>';
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