<?php
session_start();
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  if (empty($username) || empty($password)) {
    header("location: login.php?err=empty&username=$username");
    exit();
  }
  else {
    require 'dbh.php';
    $sql = "SELECT * FROM admins WHERE admin_username = ? AND admin_password = ?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else{
      mysqli_stmt_bind_param($stmt, "ss", $username, $password);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['admin_username'] = $row['admin_username'];
        $_SESSION['admin_fullname'] = $row['admin_fullname'];
        header('location:dashboard.php');
      }
      else{
        header("location: login.php?err=invalid&username=$username");
      }
    }
  }
}