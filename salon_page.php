<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['customer_id'])){
	header('location:login_page.php');
}
$uid = $_SESSION['customer_id'];
$sid="";
if(isset($_GET['block_req']))
{
	
$bsid=$_GET['block_req'];
$query  = "INSERT INTO `blocked_staff`(`user_id`, `staff_id`) VALUES ($uid,$bsid)";
// echo $query;
    						$res=mysqli_query($conn,$query);
    						if ($res) {
    							echo"<script>alert('Staff Blocked')</script>";

    							header('location:index.php');
    						}
}

if(isset($_GET['unblock_req1']))
{
	
$ubsid=$_GET['unblock_req1'];
$query  = "delete from blocked_staff where staff_id=$ubsid and user_id=$uid";

    						$res=mysqli_query($conn,$query);
    						if ($res) {
    							echo"<script>alert('Staff UN Blocked')</script>";
    							header('location:index.php');
    						}
}
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

			<div class="collapse navbar-collapse" id="ftco-nav">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item scrollto"><a href="index.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="#services" class="nav-link">Services</a></li>
					<!-- <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li> -->
					<!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<!-- <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li> -->
					<li class="nav-item"><a href="#staff" class="nav-link">Staff</a></li>
					<li class="nav-item"><a href="main_page.php" class="nav-link">Logout</a></li>
					
					
					<!-- </form> -->


				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	<?php
	if(isset($_GET['salon_id']))
	{
		$id = $_GET['salon_id'];
		$q="SELECT * FROM `salon` WHERE `salon_id`=$id";
		$res=mysqli_query($conn,$q);
		while($row=mysqli_fetch_array($res)){
			$salonimg=$row['salon_img'];
			$salonname=$row['salon_name'];
		}

		if (isset($_POST['addtofav'])) {
			$cid=$_SESSION['customer_id'];

			$q="SELECT * FROM `favrouite_salon` WHERE `customer_id`=$cid and `salon_id`=$id";
			$res=mysqli_query($conn, $q);
			if (mysqli_num_rows($res)>0) {
				echo '<script>alert("Already Added To Favrouites")</script>';
			}
			else{
				$sql = "INSERT INTO `favrouite_salon`(`customer_id`, `salon_id`) VALUES ('$cid','$id')";
				mysqli_query($conn, $sql);
				echo '<script>alert("Added To Favrouites")</script>';
  
			}

			
				

		}
	}

	?>
	<section class="hero-wrap js-fullheight" style="background-image: url(html/Images/<?php echo $salonimg; ?>);" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
				<div class="col-lg-12 ftco-animate d-flex align-items-center">
					<div class="text text-center">
						<span class="subheading">Welcome to</span>
						<h1 class="mb-4"><?php echo $salonname?></h1>
						<p><a href="#appointment" class="btn btn-primary btn-outline-primary px-4 py-2">Book now</a></p>

						<form action="" method="post">
						<p>
							<button type="submit" class="btn btn-primary btn-outline-primary px-4 py-2" name="addtofav">Add To Fav</button></p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>








<section class="ftco-section ftco-team" id="services">
	<div class="container-fluid px-md-5">
		<div class="row justify-content-center pb-3">
			<div class="col-md-10 heading-section text-center ftco-animate">

				<h2 class="mb-4">Services We Provide</h2>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="carousel-team owl-carousel">



					<?php
					$query  = "select *from salon s inner JOIN salon_services sr on s.salon_id=sr.salon_id WHERE s.salon_id=$id";
					$res=mysqli_query($conn,$query);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="#" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['ss_image']; ?>);"></div>
									<h2><?php echo $res2['ss_name'] ?></h2>
									<span class="position"><?php echo $res2['ss_description'] ?></span>
								</a>
							</div>

						<?php } }?>

					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="ftco-section ftco-team" id="staff">
		<div class="container-fluid px-md-5">
			<div class="row justify-content-center pb-3">
				<div class="col-md-10 heading-section text-center ftco-animate">

					<h2 class="mb-4">Our Staff</h2>

				</div>
			</div>

			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="carousel-team owl-carousel">
						<?php
						$query  = "SELECT * FROM `owner_staff` WHERE `salon_id`=$id and s_id not in(select staff_id from blocked_staff where user_id=$uid) order by  `s_rating` desc";
						$res=mysqli_query($conn,$query);
						if (mysqli_num_rows($res)>0) {
							while ($res2=mysqli_fetch_array($res)){ ?>

								<div class="item">
									<a href="#" class="team text-center">
										<div class="img" style="background-image: url(html/Images/<?php echo $res2['s_image']; ?>);"></div>
										
										<h2><?php echo $res2['s_name'] ?></h2>
										<br>
										<span class="position">Rating : <?php echo $res2['s_rating'] ?></span>
										<?php
											$salon_id = $res2['salon_id'];
											$_SESSION['sid'] = $salon_id;
										?>
										<a href="salon_page.php?fav_barber=<?php echo $res2['s_id']; ?>" class="btn btn-light btn-outline-primary ">Add to Favrouties</a><br>
										<a href="salon_page.php?block_req=<?php echo $res2['s_id']; ?>" class="btn btn-light btn-outline-danger ">Block</a>
											
									</a>
								</div>

							<?php } }?>

						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="ftco-section ftco-team" id="blockedstaff">
		<div class="container-fluid px-md-5">
			<div class="row justify-content-center pb-3">
				<div class="col-md-10 heading-section text-center ftco-animate">

					<h2 class="mb-4">Blocked Staff</h2>

				</div>
			</div>

			<div class="row">
				<div class="col-md-12 ftco-animate">
					<div class="carousel-team owl-carousel">
						<?php
						$query  = "SELECT * FROM `owner_staff` WHERE `salon_id`=$id and s_id in(select staff_id from blocked_staff where user_id=$uid) order by  `s_rating` desc";
						$res=mysqli_query($conn,$query);
						if (mysqli_num_rows($res)>0) {
							while ($res2=mysqli_fetch_array($res)){ ?>

								<div class="item">
									<a href="#" class="team text-center">
										<div class="img" style="background-image: url(html/Images/<?php echo $res2['s_image']; ?>);"></div>
										<h2><?php echo $res2['s_name'] ?></h2>
										<br>
										<span class="position">Rating : <?php echo $res2['s_rating'] ?></span>
										<?php
											$salon_id = $res2['salon_id'];
											$_SESSION['sid'] = $salon_id;
										?>
										<a href="salon_page.php?fav_barber=<?php echo $res2['s_id']; ?>" class="btn btn-light btn-outline-primary ">Add to Favrouties</a><br>
										
											<a href="salon_page.php?unblock_req1=<?php echo $res2['s_id']; ?>" class="btn btn-light btn-outline-success ">Unblock</a>
									</a>
								</div>

							<?php } }?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-booking bg-light" id="appointment">
			<div class="container ftco-relative">
				<div class="row justify-content-center pb-3">
					<div class="col-md-10 heading-section text-center ftco-animate">
						<span class="subheading">Booking</span>
						<h2 class="mb-4">Make an Appointment</h2>
						<!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-md-10 ftco-animate">
						<form action="" method="Post" class="appointment-form">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<?php
										$uid=$_SESSION['customer_id'];
										$res=mysqli_query($conn,"SELECT * FROM `users` where `user_id`=$uid");
										while($row=mysqli_fetch_array($res))
											{?>
												<input type="text" class="form-control" id="cs_name" name="cs_name" placeholder="Name" value="<?php echo $row["user_name"];?>">
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="text" class="form-control" id="cs_email" name="cs_email" placeholder="Email" value="<?php echo $row["user_email"];?>">

												<input type="text" class="form-control" id="cs_id" name="cs_id" placeholder="Email" value="<?php echo $row["user_id"];?>" Hidden>
											<?php } ?>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control appointment_date" name="ap_date" placeholder="Date">
										</div>    
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<input type="text" class="form-control appointment_time" name="ap_time" placeholder="Time">
										</div>
									</div>
									<div class="col-sm-6">
										<div class="form-group">
											<div class="select-wrap">
												<div class="icon"><span class="ion-ios-arrow-down"></span></div>
												<select name="cs_service" id="cs_service" class="form-control">
													<?php
													$res=mysqli_query($conn,"SELECT * FROM `salon_services` where `salon_id`=$id");
													while($row=mysqli_fetch_array($res))
														{?>

															<option><?php echo $row["ss_name"];?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group">
												<input type="tel" class="form-control" name="cs_phone" id="cs_phone" placeholder="Phone">

											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea  id="cs_msg" cols="30" rows="7" name="cs_msg" class="form-control" placeholder="Message"></textarea>
											</div>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" value="Make an Appointment" name="btn_bookapp" class="btn btn-primary">
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>


				<?php

				if (isset($_POST['btn_bookapp'])) {
					$csid=$_POST['cs_id'];
					$cname=$_POST['cs_name'];
					$cemail=$_POST['cs_email'];
					$capdate=$_POST['ap_date'];
					$captime=$_POST['ap_time'];
					$cservice=$_POST['cs_service'];
					$cphone=$_POST['cs_phone'];
					$cmsg=$_POST['cs_msg'];
					$sid=$id;
					$cbstatus=0;
					
					$q="SELECT * from `bookings` where salon_id=$sid";
					$res=mysqli_query($conn, $q);
					$row=mysqli_fetch_array($res);
					if($row['cs_apdate']==$capdate&&$row['cs_aptime']==$captime)
					 {
						echo '<script>alert("Already Booked on time you selected")</script>';
					}else
					{
						$sql = "INSERT INTO `bookings`(`cs_name`, `cs_email`, `cs_apdate`, `cs_aptime`, `cs_service`, `cs_phoneno`, `cs_msg`, `salon_id`, `ap_status`, `cs_id`) VALUES ('$cname','$cemail','$capdate','$captime','$cservice','$cphone','$cmsg','$sid','$cbstatus', '$csid')";
						mysqli_query($conn, $sql);
						echo '<script>alert("Booking Confirmed")</script>';
					}





				}
				?>


		
  <footer class="ftco-footer ftco-section">

          	<div class="col-md-12 text-center">
          		<p>
          			Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Salon Booking Service</a></p>
          			<!-- </div> -->
          		</div>


          		<!-- </div> -->
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