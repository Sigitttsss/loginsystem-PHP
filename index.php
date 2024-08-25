<?php
  session_start();
  include "includes/config.php";
  
  if(isset($_POST['login']))
  {
    $password     = $_POST['password'];
    $dec_password = $password;
    $useremail    = $_POST['uemail'];
    $ret  = mysqli_query($con, "SELECT id,fname FROM users WHERE email = '$useremail' and password = '$dec_password'");
    $num  = mysqli_fetch_array($ret);
    if($num > 0)
    {
      $_SESSION['id'] = $num['id'];
      $_SESSION['name'] = $num['fname'];

      header('location:welcome.php');
    }else{
      echo "<script>alert('Invalid username or password');</script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Login System</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">Selamat Datang</h1>
    <p class="sign-up__subtitle">Sign in to your account to continue</p>
    <form class="sign-up-form form" action="" method="post">
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" name="uemail" placeholder="name@example.com" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" name="password" placeholder="Enter your password" required>
      </label>
      <a class="link-info forget-link" href="password-recovery.php">Forgot your password?</a>
        <br>
      <a class="link-info forget-link" href="signup.php">Sign up!</a>
      <!-- <label class="form-checkbox-wrapper">
        <input class="form-checkbox" type="checkbox" required>
        <span class="form-checkbox-label">Remember me next time</span>
      </label> -->
      <button class="form-btn primary-default-btn transparent-btn" name="login" type="submit">Sign in</button>
    </form>
  </article>
</main>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>

</html>