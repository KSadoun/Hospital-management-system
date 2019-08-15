<?php
require 'dbh.php';
$value = $_GET['value'];
$row = $_GET['row'];
if ($value == 'Delete') {
  $sql = "UPDATE doctors SET display = 'no' WHERE doctor_no = $row";
  mysqli_query($conn, $sql);
}
else {
  $sql = "UPDATE doctors SET display = 'yes' WHERE doctor_no = $row";
  mysqli_query($conn, $sql);
}