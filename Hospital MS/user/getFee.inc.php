<?php

require 'dbh.php';
$doctor = $_POST['value'];
$sql = "SELECT * FROM doctors WHERE doctor_fullname = '$doctor' AND display = 'yes'";
$result = mysqli_query($conn, $sql);
$row =  mysqli_fetch_assoc($result);
echo $row['doctor_fee'];
