<?php

if (isset($_POST['submit'])) {
  require 'dbh.php';
  $specialization = $_POST['specialization'];
  //check if already there is a specialization with the same name
  $sql = "SELECT * FROM specializations WHERE specialization_name = ? AND display = 'yes'";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die("MySQL Error1");
  }
  else{
    mysqli_stmt_bind_param($stmt, "s", $specialization);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
      header("location:addSpecialization.php?err=invalid&specialization=$specialization");
      exit();
    }
    elseif (empty($specialization)) {
      header('Location: addSpecialization.php?err=empty');
      exit();
    }
    else{
      //add the specialization to the database   
      $sql = "INSERT INTO specializations(specialization_name, specialization_creation_date, display)
              VALUES(?, NOW(), 'yes')";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        die("MySQL Error");
      }
      else{
        mysqli_stmt_bind_param($stmt, "s", $specialization);
        mysqli_stmt_execute($stmt);
        header("location: addSpecialization.php?err=none&specialization=$specialization");
        }        
      }
  }
}
else{
  header('location:addSpecialization.php');
}