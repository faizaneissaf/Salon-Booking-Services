<?php
@include 'config.php';
if(isset($_POST['register_user']))
{
  $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
  $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
  $user_address = mysqli_real_escape_string($conn, $_POST['user_address']);
  $user_password = mysqli_real_escape_string($conn, $_POST['user_password']);
  $user_role = mysqli_real_escape_string($conn, $_POST['user_role']);



  $select = "SELECT * FROM users WHERE user_email = '$user_email'";
  $result = mysqli_query($conn, $select);

  if(mysqli_num_rows($result) > 0)
  {
    $error[] = 'user already exist';
  }
  else
    {
      $insert = "INSERT INTO users(user_name, user_email, user_address, user_password, user_type,active_status) VALUES ('$user_name','$user_email','$user_address','$user_password','$user_role',1)";
      mysqli_query($conn, $insert);
      header('location:login_page.php');
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
<section class="ftco-section ftco-booking bg-light">
      <div class="container ftco-relative">
        <div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
            <h4 class="mb-4">Signup</h4>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10 ftco-animate">
            <form action="" method="Post" class="appointment-form">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="user_name" id="user_name" placeholder="Name">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="user_email" id="user_email" placeholder="Email">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="Address" class="form-control" name="user_address" placeholder="Address">
                  </div>    
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <input type="password" class="form-control" name="user_password" placeholder="Password">
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="user_role" id="" class="form-control">
                        <option value="0">Customer</option>
                        <option value="1">Owner</option>
                      </select>
                    </div>
                  </div>
                </div>
            
              </div>
              <div class="form-group">
                <input type="submit" value="Signup" name="register_user" class="btn btn-primary">
              </div>
            </form>
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