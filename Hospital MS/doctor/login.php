<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/doctor-login.css">
  <title>Doctor Login</title>
</head>

<body class="bg-light">

  <div class="page">

    <h3 class="text-muted" style="font-weight: lighter">HMS | Doctor Login</h3><br>
    <form class="login-form" action="login.inc.php" method="POST">  
      <div class="information">

        <p class="text-primary header">Sign in to your account</p>
        <p class="text-muted">Please enter your name and password to Login</p>
        
<?php
  if (isset($_GET['email'])) {
    $email = $_GET['email'];
    echo '<i class="fa fa-lg fa-user"></i><input type="email" placeholder="Email Address" name="email" value="'.$email.'"></input><br><br>';
  }
  else {
    echo '<i class="fa fa-lg fa-envelope"></i><input type="email" placeholder="Email Address" name="email"></input><br><br>';
  }
?>

  <i class="fa fa-lg fa-lock"></i><input type="password" placeholder="Password" name="password"></input><br><br>
  <a href="forgotPassword.php" style="display: inline-block;">Forgot Password?</a>
        
<?php
  if (!isset($_GET['err'])) {
    echo "";
  }
  else {
    $errCheck = $_GET['err'];
    //if any field is empty
    if ($errCheck == "empty") {
      echo '<p class="text-danger">All fields are Manidatory!</p>';
    }
    //if wrong fields aka harami wala bhai
    if ($errCheck == "invalid") {
      echo '<p class="text-danger">Invalid Email Address or Password!</p>';
    }
    //if there is no errors
    if ($errCheck == 'none') {
      echo "<p class='text-success'>Account created successfully! Please Sign in now</p>";
    }  
  }
?> 

        <div style="float: right">
          <i class="fa fa-arrow-circle-right fa-lg" style="color: white; pointer-events: none;"></i>
          <button class="btn btn-primary btn-sm" type="submit" name="submit" style="padding-left: 30px;">Login</button>
        </div><br>
    
    </form>

      </div>

      <center><footer style="font-weight: lighter">© 2019 HMS. All rights reserved</footer></center>
  </div>

</body>
</html>