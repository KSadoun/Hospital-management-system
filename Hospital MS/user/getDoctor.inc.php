<?php

require 'dbh.php';
$specialization = $_POST['value'];
$sql = "SELECT * FROM doctors WHERE doctor_specialization = '$specialization' AND display = 'yes'";
$result = mysqli_query($conn, $sql);
echo "<option>Select Doctor</option>";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<option>".$row['doctor_fullname']."</option>";
  }
}
