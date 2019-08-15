<?php

//if the register button was clicked
if (isset($_POST['submit'])) {
  
  //input variables
  $fullname = $_POST['fullname'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $repeatPassword = $_POST['confirm-password'];

  
  /*VALIDITY OF THE FORM SUBMITTED*/
  
  //validation for empty fields
  if ( empty($fullname) || empty($address) || empty($city) || empty($gender) || empty($email) || empty($password) || empty($repeatPassword) ) {
    header("Location: register.php?err=empty&fullname=$fullname&address=$address&city=$city&email=$email");
    exit();
  }
  //if name is valid
  elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname)) {
    header("Location: register.php?err=name&address=$address&city=$city&email=$email");
    exit();
  } 
  //if email is valid
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: register.php?err=email&fullname=$fullname&address=$address&city=$city");
    exit();
  }
  //if passwords match
  elseif ($password !== $repeatPassword) {
    header("Location: register.php?err=pwd&fullname=$fullname&address=$address&city=$city&email=$email");
    exit();
  }
  else {
    //CHECK IF THERE IS ANY NAME OR EMAIL AS THE GIVEN ONES
    $sql = "SELECT * FROM patients WHERE patient_fullname = ? OR patient_email = ?";

    //prepared statement
    require 'dbh.php';
    $stmt = mysqli_stmt_init($conn);
    //if failed to create the statement
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else {
      mysqli_stmt_bind_param($stmt, "ss", $fullname, $email);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        header("Location: register.php?err=taken&city=$address&address=$city");
      }
      //EVERYTHING IS READY FOR INSERTING NOW
      else{
        $sql = "INSERT INTO patients (patient_fullname, patient_address, patient_city, patient_gender, patient_email, patient_password, patient_creation_date, patient_updation_date, display)
          VALUES (?, ?, ?, ?, ?, ?, NOW(), '0000-00-00 00:00:00', 'yes')";
        $stmt = mysqli_stmt_init($conn);
        //if failed to create the statement
        if (!mysqli_stmt_prepare($stmt, $sql)) {
          die("MySQL Error");
        }
        else {
          mysqli_stmt_bind_param($stmt, "ssssss", $fullname, $address, $city, $gender, $email, $password);
          mysqli_stmt_execute($stmt);
          header("Location: login.php?err=none");

       }
      }
    }       
  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);  
}  
//if the register button wasnt clicked
else {
  header('Location: login.php?DontUseDirtyTricksHere');

}
