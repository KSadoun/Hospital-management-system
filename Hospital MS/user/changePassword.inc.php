<?php
session_start();
if (isset($_POST['submit'])) {
  //defining Variables
  $currentPassword= $_POST['current-password'];
  $password= $_POST['password'];
  $repeatPassword= $_POST['repeat-password'];

  //error handling for empty inputs
  if (empty($currentPassword) || empty($password) || empty($repeatPassword) ) {
    header("location: changePassword.php?err=empty");
    exit();
  }
  elseif ($password !== $repeatPassword){
    header("location: changePassword.php?err=pwd");
  }
  else {
    require 'dbh.php';
    //check if the current password is correct
    $sql = "SELECT patient_password FROM patients WHERE patient_no = '{$_SESSION['patient_no']}'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $sqlPassword = $row['patient_password'];
    //if passwords dont match
    if ($sqlPassword !== $currentPassword) {
      header("location: changePassword.php?err=invalid");
    }
    //if they match
    else{
      //prepared statement to insert the new password
      $sql = "UPDATE patients SET patient_password = ? WHERE patient_no = '{$_SESSION['patient_no']}'";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("MySQL Error");
      }
      else {
        mysqli_stmt_bind_param($stmt, "s", $password);
        mysqli_stmt_execute($stmt);
        header("location: changePassword.php?err=none");        
      }      
    }
  }

}
else{
  header("location: changePassword.php?sonOfAGun");
}
       