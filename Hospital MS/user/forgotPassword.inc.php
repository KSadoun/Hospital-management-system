<?php

require 'dbh.php';
if (isset($_POST['submit'])) {
  $fullname = $_POST['fullname'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  if (empty($fullname) || empty($password) || empty($email)) {
    header("location:forgotPassword.php?err=empty&fullname=$fullname&email=$email");
  }
  else{
    $sql = "SELECT * from patients WHERE patient_fullname = '$fullname' AND patient_email = '$email' AND display = 'yes'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $rowNo = $row['patient_no'];
      $sql = "UPDATE patients SET patient_password = '$password' WHERE patient_no = '$rowNo' AND display = 'yes'";
      mysqli_query($conn, $sql);
      header("location: forgotPassword.php?err=none");
    }
    else{
      header("location: forgotPassword.php?err=invalid&fullname=$fullname&email=$email");
    }
  }


}
else{
  header('location: login.php');
}