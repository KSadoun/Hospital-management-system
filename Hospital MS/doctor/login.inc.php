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
  $sql = "SELECT * FROM doctors WHERE doctor_email = ? AND doctor_password = ? AND display = 'yes'";

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
      $sql = "SELECT * FROM doctors WHERE doctor_email = ? AND doctor_password = ? AND display = 'yes'";
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
        $_SESSION['doctor_no'] = $row['doctor_no'];
        $_SESSION['doctor_fullname'] = $row['doctor_fullname'];
        $_SESSION['doctor_specialization'] = $row['doctor_specialization'];
        $_SESSION['doctor_address'] = $row['doctor_address'];
        $_SESSION['doctor_fee'] = $row['doctor_fee'];
        $_SESSION['doctor_number'] = $row['doctor_number'];
        $_SESSION['doctor_email'] = $row['doctor_email'];




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
