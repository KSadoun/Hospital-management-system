<?php
session_start();

//if clicked on login button
if (isset($_POST['submit'])) {
  //input variables
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  
 /*VALIDITY OF THE FORM SUBMITTED*/
 
  //if fields are empty
  if (empty($email) || empty($password)) {
    header("Location: login.php?err=empty&email=$email");
  }
  //if fake user
  else {
  require 'dbh.php';
  $sql = "SELECT * FROM patients WHERE patient_email = ? AND patient_password = ? AND display = 'yes'";

  //prepared statement
  $stmt = mysqli_stmt_init($conn);
  //if connection failed
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("MySQL Error");
  }
  else{
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    
    //if there is no account found with the given details
    if (mysqli_stmt_num_rows($stmt) > 0) {
         
      //select the row from the database using prepared statements
      $sql = "SELECT * FROM patients WHERE patient_email = ? AND patient_password = ? AND display = 'yes'";
      $stmt = mysqli_stmt_init($conn);
      //if connection failed
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("MySQL Error");
      }
      else{
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        //SESSION VARIABLES FOR THE CORRECT ACCOUNT ENTERED
        $_SESSION['patient_no'] = $row['patient_no'];
        $_SESSION['patient_fullname'] = $row['patient_fullname'];
        $_SESSION['patient_address'] = $row['patient_address'];
        $_SESSION['patient_city'] = $row['patient_city'];
        $_SESSION['patient_gender'] = $row['patient_gender'];
        $_SESSION['patient_email'] = $row['patient_email'];

      header("Location: dashboard.php");
      }
    }  
    else {  
      header("Location: login.php?err=invalid&email=$email");
      exit();
    }
  }
 }

}
