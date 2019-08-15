<?php

require 'dbh.php';
$row = $_GET['row'];
//deleting the appointment query
$sql = "UPDATE appointments SET display = 'no' WHERE appointment_no = $row";
mysqli_query($conn, $sql);