<?php
    session_start();
    include_once "includes/config.php";
    if(strlen($_SESSION['id'] == 0)) {
        header('location:logout.php');
    }else{

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
        <h2 class="main-title">Dashboard</h2>
        <div class="row stat-cards">
          <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
            <?php 
                $userid = $_SESSION['id']; 
                $query = mysqli_query($con, "select * from users where id='$userid'");
                while($result=mysqli_fetch_array($query)) {
            ?>
              <div class="stat-cards-info">
                <p class="stat-cards-info__num"><?php echo $result['fname'].$result['lname']; ?></p>
                <a class="stat-cards-info__title" href="profile.php">
                    <span>View Profile</span>
                </a>
              </div>
            <?php } ?>
            </article>
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