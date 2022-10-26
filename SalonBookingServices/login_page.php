<?php
session_start();
@include 'config.php';
if(isset($_POST['submit']))
{
  $user_email=$_POST['login_email'];
  $user_password=$_POST['login_password'];
  
  // echo $useremail;
  // echo $password;


  $select = "SELECT * FROM `users` where user_email='$user_email' and user_password='$user_password'";
  $res = mysqli_query($conn, $select);
  $count=mysqli_num_rows($res);
  // echo $count;

  if($count> 0)
  {

    while($row = mysqli_fetch_assoc($res))
    {
      if($row['user_type'] == 0)
      {
        $_SESSION['customer_id'] = $row['user_id'];
        $_SESSION['customer_name'] = $row['user_name'];
        $_SESSION['customer_email'] = $row['user_email'];
        $_SESSION['customer_address'] = $row['user_address'];
        $_SESSION['customer_activestatus'] = $row['active_status'];
        

        header("location:index.php");
      }
      elseif($row['user_type'] == 1)
      {
        $_SESSION['owner_id'] = $row['user_id'];
        $_SESSION['owner_name'] = $row['user_name'];
        $_SESSION['owner_email'] = $row['user_email'];
        $_SESSION['owner_address'] = $row['user_address'];
        $_SESSION['owner_activestatus'] = $row['active_status'];
        
        $userid=$row['user_id'];

        $q = "SELECT * FROM `salon` where owner_id=$userid and salon_activestatus=0";
        $q2="SELECT * FROM `salon` where owner_id=$userid and salon_activestatus=1";




        $resp = mysqli_query($conn, $q);
        $resp2=mysqli_query($conn,$q2);

        while($sd = mysqli_fetch_assoc($resp2))
        {
          $_SESSION['salon_id'] = $sd['salon_id'];
        }


        $rs=mysqli_num_rows($resp);
        $rs2=mysqli_num_rows($resp2);
        if ($rs2>0) {
          header("location:html/owner_dashboard.php");

        }elseif ($rs>0) {
          header("location:html/owner_pendingreq.php");
        }
        else{
          header("location:html/owner_register_salon.php");
        }
      }
      elseif($row['user_type'] == 2)
      {
        $_SESSION['admin_id'] = $row['user_id'];
        $_SESSION['admin_name'] = $row['user_name'];
        $_SESSION['admin_email'] = $row['user_email'];
        $_SESSION['admin_address'] = $row['user_address'];
        $_SESSION['admin_activestatus'] = $row['active_status'];


        header("location:html/admin_dashboard.php");
      }
      else{
        echo '<script>alert("Incorrect Email/Password")</script>';
      }
    }
  }
};
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Salon Booking Services</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/ionicons.min.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">


  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/icomoon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
   <div class="container">
     <a class="navbar-brand" href="index.html"><span class="flaticon-scissors-in-a-hair-salon-badge"></span>Salon Booking Services	</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
       <span class="oi oi-menu"></span> Menu
     </button>

     <div class="collapse navbar-collapse" id="ftco-nav"> <ul
       class="navbar-nav ml-auto"> <li class="nav-item scrollto"><a
         href="main_page.php" class="nav-link">Home</a></li>

       </ul>
     </div>
   </div>
 </nav>
 <!-- END nav -->

 <section class="hero-wrap js-fullheight" style="background-image: url(images/bg-2.jpg);" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
      <div class="col-lg-12 ftco-animate d-flex align-items-center">
       <div class="text text-center">
        <!-- <span class="subheading">Welcome to Salon Booking Services</span> -->
        <h5 class="mb-4" style="color: white;">Login</h5>
        <form action="" method="post">
          <p>
            <center>
              <div class="form-group w-25">
                <input type="text" class="form-control" name="login_email" placeholder="Email">
                <br>
                <input type="password" class="form-control" name="login_password" placeholder="Password">
              </div>
            </center>
          </p>
          <p>
            <a >
              <button type="submit" class="btn btn-primary btn-outline-primary px-4 py-2 w-15" name="submit">Login</button>
            </a>
          </p>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</section>

<footer class="ftco-footer ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Salon Booking Services</a></p>
        </div>
      </div>
    </div>
  </footer>

  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

</body>
</html>