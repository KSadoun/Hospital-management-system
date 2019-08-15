<?php
require 'dbh.php';
$value = $_GET['value'];
$row = $_GET['row'];
if ($value == 'Delete') {
  $sql = "UPDATE patients SET display = 'no' WHERE patient_no = $row";
  mysqli_query($conn, $sql);
}
else {
  $sql = "UPDATE patients SET display = 'yes' WHERE patient_no = $row";
  mysqli_query($conn, $sql);
}