<?php
session_start();
if (isset($_POST['submit'])) {
  //defining variables
  $specialization = $_POST['specialization'];
  $doctor = $_POST['doctor'];
  $fee = $_POST['fee'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $appointmentDate = strToTime($date . ' ' . $time);
  $actAppointmentDate = date('Y/m/d H:i:s', $appointmentDate);
  $currentTime = time();

  //if any input is empty
  if ($specialization == "Select Specialization" || $doctor == "Select Doctor" || empty($fee) || empty($date) || empty($time)) {
    header('location: createAppointment.php?err=empty');
    exit();  
  }
  //if date and time are from the past
  elseif($appointmentDate - ($currentTime+3600) < 3600) {
    header("location: createAppointment.php?err=early");
    exit();
  }
  else{
    //insert everthing into database with prepared statements
    require 'dbh.php';
    $sql = "INSERT INTO appointments (patient_no, patient_fullname, doctor_fullname, doctor_specialization, appointment_fee, appointment_date_time, appointment_creation_date, display)
    VALUES ('{$_SESSION['patient_no']}' ,'{$_SESSION['patient_fullname']}', ?, ?, ?, ?, NOW(), 'yes')"; 
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
      die("MySQL Error");
    }
    else{
      mysqli_stmt_bind_param($stmt, "ssss", $doctor, $specialization, $fee, $actAppointmentDate);
      mysqli_stmt_execute($stmt);
      echo date('Y/m/d H:i:s', $appointmentDate);
      header('Location: createAppointment.php?err=success');
    }
  }


}
else{
  header('location: createAppointment.php');
}