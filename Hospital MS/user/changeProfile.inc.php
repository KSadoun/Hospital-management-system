<?php
require 'header.php';

if (isset($_POST['submit'])) {
  
  //define input variables
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];

  //VALIDITIES

  //if any field is empty
  if (empty($fullname) || empty($address) || empty($city) || empty($gender) || empty($email)) {
    header("Location: changeProfile.php?err=empty&fullname=$fullname&address=$address&city=$city&gender=$gender&email=$email");
    exit();
  }
  //if name is valid
  elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
    header("Location: changeProfile.php?err=name&address=$address&city=$city&gender=$gender&email=$email");
    exit();
  } 
  //if email is valid
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: changeProfile.php?err=email&fullname=$fullname&address=$address&city=$city&gender=$gender");
    exit();
  }
  else{
    //update values from the inputs to the database using prepared statements
    require 'dbh.php';
    $sql = "UPDATE patients 
            SET patient_fullname = ?, patient_address = ?, patient_city = ?, patient_gender = ?, patient_email = ?, patient_updation_date = NOW()
            WHERE patient_no = '{$_SESSION['patient_no']}'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }    
    else {
      mysqli_stmt_bind_param($stmt, "sssss", $fullname, $address, $city, $gender, $email);
      mysqli_stmt_execute($stmt);
      header("Location: changeProfile.php?err=none&fullname=$fullname&address=$address&city=$city&gender=$gender&email=$email");
      $_SESSION['patient_fullname'] = $fullname;
      $_SESSION['patient_address'] = $address;
      $_SESSION['patient_city'] = $city;
      $_SESSION['patient_gender'] = $gender;
      $_SESSION['patient_email'] = $email;
    }
    $sql = "UPDATE appointments
            SET patient_fullname = ?
            WHERE patient_no = '{$_SESSION['patient_no']}'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $fullname);
      mysqli_stmt_execute($stmt);
    }            
  }

}
else {
  header('Location: changeProfile.php');
}