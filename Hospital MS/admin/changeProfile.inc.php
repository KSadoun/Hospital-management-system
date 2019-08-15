<?php
require 'header.php';

if (isset($_POST['submit'])) {
  $roow = $_GET['row'];
  //define input variables
  $specialization = $_POST['specialization'];
  $doctor = $_POST['doctor'];
  $fee = $_POST['fee'];
  $address = $_POST['address'];
  $number = $_POST['number'];
  $email = $_POST['email'];

  //function to validate the phone number
  function validate_phone_number($phone){
     // Allow +, - and . in phone number
     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
     // Remove "-" from number
     $phone_to_check = str_replace("-", "", $filtered_phone_number);
     // Check the lenght of number
     // This can be customized if you want phone number from a specific country
     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
        return false;
     } else {
       return true;
     }
  }

  //if any field is empty
  if (empty($specialization) || empty($doctor) || empty($fee) || empty($address) || empty($number) || empty($email)) {
    header("Location: changeProfile.php?err=empty&row=$roow&specialization=$specialization&doctor=$doctor&fee=$fee&address=$address&number=$number&email=$email");
    exit();
  }
  //if name is valid
  elseif (!preg_match("/^[a-zA-Z ]*$/", $doctor)) {
    header("Location: changeProfile.php?err=doctor&row=$roow&specialization=$specialization&fee=$fee&address=$address&number=$number&email=$email");
    exit();
  } 
  //if email is valid
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: changeProfile.php?err=email&row=$roow&specialization=$specialization&doctor=$doctor&fee=$fee&address=$address&number=$number");
    exit();
  }
  elseif (validate_phone_number($number) == false) {
    header("Location: changeProfile.php?err=number&row=$roow&specialization=$specialization&doctor=$doctor&fee=$fee&address=$address&email=$email");
    exit();
  }
  else{
    //update values from the inputs to the database using prepared statements
    require 'dbh.php';
    $sql = "UPDATE doctors 
            SET doctor_fullname = ?, doctor_specialization = ?, doctor_address = ?, doctor_fee = ?, doctor_number = ?, doctor_email = ?, doctor_updation_date = NOW()
            WHERE doctor_no = '{$_GET['row']}'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }    
    else {
      mysqli_stmt_bind_param($stmt, "ssssss", $doctor, $specialization, $address, $fee, $number, $email);
      mysqli_stmt_execute($stmt);
      header("Location: changeProfile.php?err=none&row=$roow&specialization=$specialization&doctor=$doctor&fee=$fee&address=$address&number=$number&email=$email");
      $_SESSION['doctor_fullname'] = $doctor;
      $_SESSION['doctor_address'] = $address;
      $_SESSION['doctor_specialization'] = $specialization;
      $_SESSION['doctor_fee'] = $fee;
      $_SESSION['doctor_number'] = $number;
      $_SESSION['doctor_email'] = $email;
    }
    $sql = "UPDATE appointments
            SET doctor_fullname = ?
            WHERE doctor_no = '{$_GET['row']}'";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else{
      mysqli_stmt_bind_param($stmt, "s", $doctor);
      mysqli_stmt_execute($stmt);
    }            
  }

}
else {
  header('Location: changeProfile.php');
}