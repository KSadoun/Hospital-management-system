<!DOCTYPE html>
<html style="height: 100%">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/user-login.css">
  <title>Patient Register</title>
</head>

<body class="bg-light" style="height: 100%;">

<!--Start: Login form box--><br>
<div class="page mt-5 mb-5">
<!--heading-->
  <h3 class="text-muted" style="font-weight: lighter">HMS | Patient Login</h3><br>
  <form class="login-form" action="register.inc.php" method="POST">  
    <div class="information">
      <!--form heading-->
      <p class="text-primary header" style="width: 65px">Signup</p>

      <p class="text-muted">Please enter your personal information below</p>

<?php

//FULLNAME INPUT WITH RECOVERY ON PAGE ERROR
  if (isset($_GET['fullname'])) {
    $fullname = $_GET['fullname'];
    echo '<i class="fa fa-smile-o fa-lg"></i> <input type="text" placeholder="Full Name" name="fullname" value="'.$fullname.'"><br><br>';
  }
  else {
    echo '<i class="fa fa-smile-o fa-lg"></i> <input type="text" placeholder="Full Name" name="fullname"><br><br>';
  }

//address INPUT WITH RECOVERY ON PAGE ERROR
  if (isset($_GET['address'])) {
    $address = $_GET['address'];
    echo '<i class="fa fa-address-card fa-lg"></i><input type="text" placeholder="Address" name="address" value="'.$address.'"><br><br>';
  }
  else {
    echo '<i class="fa fa-address-card fa-lg"></i><input type="text" placeholder="Address" name="address"><br><br>';
  }

//city INPUT WITH RECOVERY ON PAGE ERROR
  if (isset($_GET['city'])) {
    $city = $_GET['city'];
    echo '<i class="fa fa-home fa-lg"></i></i><input type="text" placeholder="City" name="city" value="'.$city.'"><br><br>';
    echo '<p class="text-muted">Gender:</p>
    <div style="display:flex">
    <input type="radio" name="gender" value="Male" style="width:auto; margin-right: 5px;">&nbsp;&nbsp;&nbsp;<p style="display:inline-block; margin-right: 20px;">Male</p>
    <input type="radio" name="gender" value="Female" style="width:auto; margin-right: 5px;"><p style="display:inline-block">Female</p></div>
    ';    
  }
  elseif (!isset($_GET['city'])) {
    echo '<i class="fa fa-home fa-lg"></i><input type="text" placeholder="City" name="city"><br><br>';
    echo '<p class="text-muted">Gender:</p>
    <div style="display:flex">    
    <input type="radio" name="gender" value="Male" style="width:auto; margin-right: 5px;"><p style="display:inline-block; margin-right: 20px;">Male</p>
    <input type="radio" name="gender" value="Female" style="width:auto; margin-right: 5px;"><p style="display:inline-block">Female</p></div>'; 
  }

  echo '<p class="text-muted">Please enter your account details below</p>';

//email INPUT WITH RECOVERY ON PAGE ERROR
  if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo '<i class="fa fa-lg fa-envelope"></i><input type="text" placeholder="Email Address" name="email" value="'.$email.'"></input><br><br';
  }
  else {
    echo '<i class="fa fa-lg fa-envelope"></i><input type="text" placeholder="Email Address" name="email"></input><br><br';
  }

?>
  
      <!--password input-->
        <i class="fa fa-lg fa-lock"></i><input type="password" placeholder="Password" name="password"></input><br><br>

      <!--confirm password-->
        <i class="fa fa-lg fa-lock"></i><input type="password" placeholder="Confirm Password" name="confirm-password"></input><br><br>
      
      <!--submit button-->
      <div style="float: right">
        <i class="fa fa-sign-in fa-lg" style="color: white; pointer-events: none;"></i>
        <button class="btn btn-primary btn-sm" type="submit" name="submit" style="padding-left: 30px; ">SignUp</button>
      </div><br>
  
  </form><hr>

<?php

  if (!isset($_GET['err'])) {
      echo "";
    }  
    else {
      $errCheck = $_GET['err'];

      //if fields are empty
      if ($errCheck == 'empty') {
        echo "<p class='text-danger'>You did not fill out all the fields!</p>";
      }
      //if name is invaluid
      if ($errCheck == 'name') {
        echo "<p class='text-danger'>Only letters are allowed in Full Name</p>";
      }
      //if email syntax is wrong
      if ($errCheck == 'email') {
        echo "<p class='text-danger'>Enter a valid Email Address!</p>";
      }
      //if passwords dont match
      if ($errCheck == 'pwd') {
        echo "<p class='text-danger'>Paasswords dont match!</p>";
      }
      //if name is invalid
      if ($errCheck == 'taken') {
        echo "<p class='text-danger'>Your Full Name or Email Address is already taken!</p>";
      }

    }
?>
      
      <!--Create a new account / register page anchor-->
      <p style="font-size: 12px;">Already have an account? <a href="login.php"> Login now</a></p>

    </div>

    <!--footer-->
    <center><footer style="font-weight: lighter">© 2019 HMS. All rights reserved</footer></center>

</div>
    <!--End: login form box-->
</body>
</html>