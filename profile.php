<?php session_start();
include_once 'includes/config.php' ;
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{
    
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
             <h3 class="mt-4 stat-cards-info__num accordion-body"><?php echo $result['fname'];?>'s Profile</h3>
               <br>
             <div class="users-table ">
              <table class="posts-table stat-cards-info__num">
                <tbody>
                  <tr>
                    <td style="font-weight:bold;">First Name</td>
                  <td>
                    <?php echo $result['fname'];?>
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Last Name</td>
                  <td>
                    <?php echo $result['lname'];?>
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Email</td>
                  <td>
                    <?php echo $result['email'];?>
                  </td>
                  </tr>
                  <tr>
                    <td style="font-weight:bold;">Contact No</td>
                  <td>
                    <?php echo $result['contactno'];?>
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
              <a class="primary-default-btn transparent-btn" href="edit-profile.php" style="width: 100px;">Edit</a>
            </div>
            <?php } ?>
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
