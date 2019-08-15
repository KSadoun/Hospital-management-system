<?php

require 'dbh.php';
if (isset($_POST['submit'])) {
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  if (empty($phone) || empty($password) || empty($email)) {
    header("location:forgotPassword.php?err=empty&phone=$phone&email=$email");
  }
  else{
    $sql = "SELECT * from doctors WHERE doctor_number = '$phone' AND doctor_email = '$email' AND display = 'yes'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $rowNo = $row['doctor_no'];
      $sql = "UPDATE doctors SET doctor_password = '$password' WHERE doctor_no = '$rowNo' AND display = 'yes'";
      mysqli_query($conn, $sql);
      header("location: forgotPassword.php?err=none");
    }
    else{
      header("location: forgotPassword.php?err=invalid&phone=$phone&email=$email");
    }
  }


}
else{
  header('location: login.php');
}