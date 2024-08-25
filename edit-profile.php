<?php session_start();
include_once 'includes/config.php' ;
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
//Code for Updation 
if(isset($_POST['update']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $contact=$_POST['contact'];
    $userid=$_SESSION['id'];
    $msg=mysqli_query($con,"update users set fname='$fname',lname='$lname',contactno='$contact' where id='$userid'");

if($msg)
    {
       echo "<script>alert('Profile updated successfully');</script>";
       echo "<script type='text/javascript'> document.location = 'profile.php'; </script>";
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
          <?php 
                $userid=$_SESSION['id'];
                $query=mysqli_query($con,"select * from users where id='$userid'");
                while($result=mysqli_fetch_array($query))
                {
            ?>
             <h3 class="mt-4"><?php echo $result['fname'];?>'s Profile</h3>
               <br>
             <div class="users-table ">
            <form method="post">
              <table class="posts-table">
                <tbody>
                  <tr>
                    <td style="font-weight:bold;">First Name</td>
                  <td>
                    <input class="form-control" id="fname" name="fname" type="text" value="<?php echo $result['fname'];?>"  required />
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Last Name</td>
                  <td>
                  <input class="form-control" id="lname" name="lname" type="text" value="<?php echo $result['lname'];?>"  required />
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Contact No</td>
                  <td>
                  <input class="form-control" id="contact" name="contact" type="text" value="<?php echo $result['contactno'];?>"  pattern="[0-9]{10}" title="10 numeric characters only"  maxlength="10" required />
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Email</td>
                  <td>
                    <?php echo $result['email'];?>
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Reg. Date</td>
                  <td>
                    <?php echo $result['posting_date'];?>
                  </td>
                  </tr>
                </tbody>
              </table>
              <br>
              <button class="primary-default-btn transparent-btn" name="update" type="submit" style="width: 100px;">Update</button>
            </div>
            <?php } ?>
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