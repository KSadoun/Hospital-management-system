<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Doctor | Dashboard</title>
</head>
<body>

  <!--Start: header-->
  <nav class="navbar navbar-light bg-light navbar-dafault navbar-fixed-top">
    <a href="../index.php" class="navbar-brand text-muted">Hospital Management System</a>
    <div class="name" style="display: flex;">
      <img src="images/avatar3.png" alt="" id="avatar" style="height: 3vw;">
      <div class="dropdown">
        <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Doctor / <?php echo $_SESSION['doctor_fullname'] ?>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="changeProfile.php"><i class="fa fa-user"></i> My Profile</a>
          <a class="dropdown-item" href="changePassword.php"><i class="fa fa-lock"></i> Change Password</a>
          <a class="dropdown-item" href="logout.inc.php"><i class="fa fa-arrow-circle-right"></i> Logout</a>
        </div>
      </div>
  </div>
  </nav>
  <!--End: header-->
