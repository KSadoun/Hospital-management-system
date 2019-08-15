<?php
require 'dbh.php';
$row = $_GET['row'];
$sql = "UPDATE specializations SET display = 'no' WHERE specialization_no = $row";
mysqli_query($conn, $sql);

