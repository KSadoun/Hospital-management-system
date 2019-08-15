<?php
if (isset($_POST['submit'])) { 
  
  require 'dbh.php';
  $specialization = $_POST['specialization'];
  $fullname = $_POST['name'];
  $address = $_POST['address'];
  $fee = $_POST['fee'];
  $number = $_POST['number'];
  $email = $_POST['email']; 
  $password = $_POST['password'];

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
  if ($specialization == "Select Specialization" || empty($fullname) || empty($address) || empty($fee) || empty($number) || empty($email) || empty($password)) {
    header("location: addDoctor.php?err=empty&fullname=$fullname&address=$address&fee=$fee&number=$number&email=$email");
    exit();
  }
  //if name or address is invalid
  elseif (!preg_match("/^[a-zA-Z ]*$/", $fullname) || !preg_match("/^[a-zA-Z ]*$/", $address)) {
    header("Location: addDoctor.php?err=name&fullname=$fullname&address=$address&fee=$fee&number=$number&email=$email");
    exit();
  } 
  //if email is valid
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: addDoctor.php?err=email&fullname=$fullname&address=$address&fee=$fee&number=$number");
    exit();
  }  
  elseif(validate_phone_number($number) == false){
    header("Location: addDoctor.php?err=number&fullname=$fullname&address=$address&fee=$fee&email=$email");
    exit();
  }
  else{
    //add the inputs to the database
    $sql = "INSERT INTO doctors(doctor_fullname,doctor_specialization,doctor_address,doctor_fee,doctor_number,doctor_email,doctor_password,doctor_creation_date,doctor_updation_date, display) VALUES(?, ?, ?, ?, ?, ?, ?, NOW(), '0000-00-00 00:00:00', 'yes')";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else {
      mysqli_stmt_bind_param($stmt, "sssssss", $fullname, $specialization, $address, $fee, $number, $email, $password);
      mysqli_stmt_execute($stmt);
      header('location: addDoctor.php?err=none');
    }
  }
}
