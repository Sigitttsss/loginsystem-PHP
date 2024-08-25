<?php
    require_once "includes/config.php";
    if(isset($_POST["submit"])) {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $contact=$_POST['contact'];
        $sql=mysqli_query($con,"select id from users where email='$email'");
        $row=mysqli_num_rows($sql);
    if($row>0)
        {
            echo "<script>alert('Email id already exist with another account. Please try with other email id');</script>";
        } else{
            $msg=mysqli_query($con,"insert into users(fname,lname,email,password,contactno) values('$fname','$lname','$email','$password','$contact')");

        if($msg)
        {
            echo "<script>alert('Registered successfully');</script>";
            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
        }
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
  <script type="text/javascript">
    function checkpass(){
            if(document.signup.password.value!=document.signup.confirmpassword.value)
        {
            alert(' Password and Confirm Password field does not match');
            document.signup.confirmpassword.focus();
            return false; 
        }
            return true;
            } 
 </script>
</head>

<body>
  <div class="layer"></div>
<main class="page-center">
  <article class="sign-up">
    <h1 class="sign-up__title">SIGN UP</h1>
    <p class="sign-up__subtitle">Start creating the best possible user experience for you customers</p>
    <form class="sign-up-form form" action="" method="post" onsumbit="return checkpass();">
      <label class="form-label-wrapper">
        <p class="form-label">First Name</p>
        <input class="form-input" id="fname" name="fname" type="text" placeholder="Enter your first name" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Last Name</p>
        <input class="form-input" type="text" id="lname" name="lname" placeholder="Enter your last name" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Email</p>
        <input class="form-input" type="email" id="email" name="email" placeholder="Enter your email" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Contact Number</p>
        <input class="form-input" type="text" id="contact" name="contact" placeholder="+62821xxxxx" required pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10">
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Password</p>
        <input class="form-input" type="password" id="password" name="password" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
      </label>
      <label class="form-label-wrapper">
        <p class="form-label">Confirm Password</p>
        <input class="form-input" id="confirmpassword" name="confirmpassword" type="password"  placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required>
      </label>
      <label class="form-checkbox-wrapper">
        <a class="form-checkbox-label" href="index.php">Have an account? Go to login</a>
      </label>
      <button class="form-btn primary-default-btn transparent-btn" type="submit" name="submit">Sign in</button>
    </form>
  </article>
</main>

</body>

</html>