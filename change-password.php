<?php session_start();
include_once 'includes/config.php';
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
 // for  password change   
if(isset($_POST['update']))
{
    $oldpassword=$_POST['currentpassword']; 
    $newpassword=$_POST['newpassword'];
    $sql=mysqli_query($con,"SELECT password FROM users where password='$oldpassword'");
    $num=mysqli_fetch_array($sql);
if($num>0)
    {
    $userid=$_SESSION['id'];
    $ret=mysqli_query($con,"update users set password='$newpassword' where id='$userid'");
    echo "<script>alert('Password Changed Successfully !!');</script>";
    echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
    }
else
    {
    echo "<script>alert('Old Password not match !!');</script>";
    echo "<script type='text/javascript'> document.location = 'change-password.php'; </script>";
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
  <script language="javascript" type="text/javascript">
    function valid()
        {
        if(document.changepassword.newpassword.value!= document.changepassword.confirmpassword.value)
        {
        alert("Password and Confirm Password Field do not match  !!");
        document.changepassword.confirmpassword.focus();
        return false;
        }
        return true;
        }
</script>
</head>

<body>
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  <!-- ! Sidebar -->
  <?php include_once 'includes/sidebar.php' ?>
  <div class="main-wrapper">
    <!-- ! Main nav -->
    <?php include_once 'includes/navbar.php' ?>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
        <h2 class="main-title">Profile</h2>
        <div class="row">
          <div class="col-lg-6 ">
               <br>
             <div class="users-table ">
            <form method="post" name="changepassword" onSubmit="return valid();">
              <table class="posts-table stat-cards-info__num" >
                <tbody>
                  <tr>
                    <td style="font-weight:bold;">Current Password</td>
                  <td>
                    <input class="form-control" id="currentpassword" name="currentpassword" type="password" value=""  required />
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">New Password</td>
                  <td>
                    <input class="form-control" id="newpassword" name="newpassword" type="password" value=""  required />
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Confirm Password</td>
                  <td>
                  <input class="form-control" id="confirmpassword" name="confirmpassword" type="password" required />
                  </td>
                  </tr>
                  
                </tbody>
              </table>
              <br>
              <button class="primary-default-btn transparent-btn" name="update" type="submit" style="width: 100px;">Change</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </main>
    <!-- ! Footer -->
    <footer class="footer">
      <?php include_once 'includes/footer.php' ?>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="./plugins/chart.min.js"></script>
<!-- Icons library -->
<script src="plugins/feather.min.js"></script>
<!-- Custom scripts -->
<script src="js/script.js"></script>
</body>
</html>
<?php } ?>