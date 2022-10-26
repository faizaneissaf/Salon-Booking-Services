<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['customer_id'])){
	header('location:login_page.php');
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
					<!-- <li class="nav-item"><a href="index.php#services" class="nav-link">Services</a></li> -->
					<!-- <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li> -->
					<!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<li class="nav-item"><a href="#exampleModalCenter" class="nav-link" data-toggle="modal"s data-target="#exampleModalCenter" >Search</a></li>
					<li class="nav-item"><a href="index.php#explore_salons" class="nav-link">Explore</a></li>
					<li class="nav-item"><a href="user_my_appointments.php" class="nav-link">My Appointments</a></li>
					<li class="nav-item"><a href="user_my_appointments.php#favs" class="nav-link">Fav Salon</a></li>
					<li class="nav-item"><a href="main_page.php" class="nav-link">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- END nav -->
	<!-- Pop Up Form  -->
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Search Salon</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action=""  method="Post">
						<div class="form-group">
							<label for="search_date">Date</label>
							<input type="text" class="form-control appointment_date" id="search_date" placeholder="Select Date" name="search_date">
						</div>
						<div class="form-group">
							<label for="search_time">Time</label>
							<input type="text" class="form-control appointment_time" id="search_time" placeholder="Select Time" name="search_time">
						</div>
						<div class="form-group">
							<label for="gender">Gender</label>
							<select class="form-control" id="gender" name="gender">
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>
						<div class="form-group">
							<label for="search_persons">Persons</label>
							<input type="number" class="form-control" id="search_persons" placeholder="How Many Persons" name="search_persons">
						</div>
						<style type="text/css">
							.data{
								display: none;
							}
						</style>
						<!-- For Women -->
						<div id="female_box" class="data">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_facial" name="w_facial">
								<label class="form-check-label" for="w_facial">
									Facial
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_hairspa" name="w_hairspa">
								<label class="form-check-label" for="w_hairspa">
									Hair Spa
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_haircolor" name="w_haircolor">
								<label class="form-check-label" for="w_haircolor">
									Hair Color
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_handfootspa" name="w_handfootspa">
								<label class="form-check-label" for="w_handfootspa">
									Hand & Foot SPA
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_makeup" name="w_makeup">
								<label class="form-check-label" for="w_makeup">
									MAKE-UP
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_nailtreatment" name="w_nailtreatment">
								<label class="form-check-label" for="w_nailtreatment">
									Nails Treatments
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_prebridal" name="w_prebridal">
								<label class="form-check-label" for="w_prebridal">
									Pre-Bridal
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_rituals" name="w_rituals">
								<label class="form-check-label" for="w_rituals">
									Rituals
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_waxing" name="w_waxing">
								<label class="form-check-label" for="w_waxing">
									Waxing
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="w_eyelash" name="w_eyelash">
								<label class="form-check-label" for="w_eyelash">
									EyeLash Extension
								</label>
							</div>

						</div>
						<!-- For  WoMen -->
						<!-- For Men -->
						<div id="male_box" class="data">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Shave/Beard
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Hair Spa
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Hair Color
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Hand & Foot SPA
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Facial
								</label>
							</div>
							
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Pre-Groom
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Rituals
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Waxing
								</label>
							</div>
							
							
						</div>
						<!-- For  Men -->






					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<a href="search_salon.php">
							<button type="submit" class="btn btn-primary" name="btn_search" >Search</button></a>
						</div>
					</form>
				</div>
			</div>
		</div>

		<?php
		// if (isset($_POST['btn_search'])) {
		// 	$gender=$_POST['gender'];
		// 	$totalpersons=$_POST['search_persons'];

		// 	$w_facial=$_POST['w_facial'];
		// 	$w_eyelash=$_POST['w_eyelash'];
		// 	$w_waxing=$_POST['w_waxing'];
		// 	$w_rituals=$_POST['w_rituals'];
		// 	$w_prebridal=$_POST['w_prebridal'];
		// 	$w_nailtreatment=$_POST['w_nailtreatment'];
		// 	$w_makeup=$_POST['w_makeup'];
		// 	$w_handfootspa=$_POST['w_handfootspa'];
		// 	$w_haircolor=$_POST['w_haircolor'];
		// 	$w_hairspa=$_POST['w_hairspa'];
		// 	$female_choices = array($w_facial,$w_eyelash,$w_waxing,$w_rituals,$w_prebridal,$w_nailtreatment,$w_makeup,$w_handfootspa,$w_haircolor,$w_hairspa);

		// 	$_SESSION['w_choices']=$female_choices;


		// }	

		?>




		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$("#gender").on('change',function(){
					
					
					if ($(this).val()=='Male') {
						$("#male_box").show();
						$("#female_box").hide();
					}else{
						$("#female_box").show();
						$("#male_box").hide();
					}
					// alert($(this).val());
					// $(".data").hide();
					// $("#" + $(this).val()).fadeIn(700);
				});//.change()
			});
		</script>



		<!-- Pop Up Form  -->
		<section class="hero-wrap js-fullheight" style="background-image: url(images/bg-2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight justify-content-center align-items-center">
					<div class="col-lg-12 ftco-animate d-flex align-items-center">
						<div class="text text-center">
							<!-- <span class="subheading">Welcome to Salon Booking Services</span> -->
							<h1 class="mb-4">My Appointments</h1>
							<p><a href="#pendingapp" class="btn btn-primary btn-outline-primary px-4 py-2 w-25">Pending</a></p>
							<p><a href="#Confirmedbookings" class="btn btn-primary btn-outline-primary px-4 py-2 w-25">Confirmed</a></p>
							<p><a href="#donebk" class="btn btn-primary btn-outline-primary px-4 py-2 w-25">Done   </a></p>
							<!-- <p><a href="#favs" class="btn btn-primary btn-outline-primary px-4 py-2 w-25">Favrouite Salons</a></p> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- ============================================================== -->
	<div class="container" id="pendingapp">
		<div class="container-fluid">
			<div class="row" >
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title mb-0">Pending Bookings</h5>
						</div>
						<table class="table">
							<thead>
								<tr>
									<th scope="col" class="text-white bg-dark">Name</th>
									<th scope="col" class="text-white bg-dark">Appointment Date</th>
									<th scope="col" class="text-white bg-dark">Service</th>
									<th scope="col" class="text-white bg-dark">Time</th>
									<th scope="col" class="text-white bg-dark">Status</th>
									<!-- <th scope="col" class="text-white bg-dark">Action</th> -->
									<!-- <th scope="col" class="text-white bg-dark">Gender</th> -->
								</tr>
							</thead>
							<tbody>

								<?php
								$sid=$_SESSION['customer_id'];
								$res=mysqli_query($conn,"SELECT * FROM `bookings` where cs_id=$sid and ap_status=0");

								while($row=mysqli_fetch_array($res))
									{?>
										<tr>
											<td><?php echo $row["cs_name"];?></td>
											<td><?php echo $row["cs_apdate"];?></td>

											<td><?php echo $row["cs_service"];?></td>
											<td><?php echo $row["cs_aptime"];?></td>
											<?php
											$status=$row["ap_status"];
											if ($status==0) {
												$msg="Pending";
											}else if ($status==1) {
												$msg="Confirmed";
											}
											?>
											<td><?php echo $msg;?></td>


										</tr>
									<?php } ?>


								</tbody>
							</table>

							<div class="card-body" id="Confirmedbookings">
								<h5 class="card-title mb-0">Confirmed Bookings</h5>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="text-white bg-dark">Name</th>
										<th scope="col" class="text-white bg-dark">Appointment Date</th>
										<th scope="col" class="text-white bg-dark">Service</th>
										<th scope="col" class="text-white bg-dark">Time</th>
										<th scope="col" class="text-white bg-dark">Status</th>
										<th scope="col" class="text-white bg-dark">Action</th>
										<!-- <th scope="col" class="text-white bg-dark">Gender</th> -->
									</tr>
								</thead>
								<tbody>

									<?php
									$sid=$_SESSION['customer_id'];
									$res=mysqli_query($conn,"SELECT * FROM `bookings` where cs_id=$sid and ap_status=1");

									while($row=mysqli_fetch_array($res))
										{?>
											<tr>
												<td><?php echo $row["cs_name"];?></td>
												<td><?php echo $row["cs_apdate"];?></td>

												<td><?php echo $row["cs_service"];?></td>
												<td><?php echo $row["cs_aptime"];?></td>
												<?php
												$status=$row["ap_status"];
												if ($status==0) {
													$msg="Pending";
												}else if ($status==1) {
													$msg="Confirmed";
												}
												?>
												<td><?php echo $msg;?></td>

												<td><a href="#edit_info?bid=<?php $_SESSION['bk_id'] = $row['b_id']; ?>" class="btn btn-light btn-outline-success" data-target="#edit_info" data-toggle="modal">Reschedule</a></td>


											</tr>
										<?php } ?>


									</tbody>
								</table>



								<!-- Done -->
								<div class="card-body" id="donebk">
								<h5 class="card-title mb-0">Completed </h5>
							</div>
							<table class="table">
								<thead>
									<tr>
										<th scope="col" class="text-white bg-dark">Name</th>
										<th scope="col" class="text-white bg-dark">Appointment Date</th>
										<th scope="col" class="text-white bg-dark">Service</th>
										<th scope="col" class="text-white bg-dark">Time</th>
										<th scope="col" class="text-white bg-dark">Status</th>
										<th scope="col" class="text-white bg-dark">Action</th>
										<!-- <th scope="col" class="text-white bg-dark">Gender</th> -->
									</tr>
								</thead>
								<tbody>

									<?php
									$sid=$_SESSION['customer_id'];
									$res=mysqli_query($conn,"SELECT * FROM `bookings` where cs_id=$sid and ap_status=3");

									while($row=mysqli_fetch_array($res))
										{?>
											<tr>
												<td><?php echo $row["cs_name"];?></td>
												<td><?php echo $row["cs_apdate"];?></td>

												<td><?php echo $row["cs_service"];?></td>
												<td><?php echo $row["cs_aptime"];?></td>
												<?php
												$status=$row["ap_status"];
												if ($status==0) {
													$msg="Pending";
												}else if ($status==1) {
													$msg="Confirmed";
												}
												else if ($status==3) {
													$msg="Done";
												}
												?>
												<td><?php echo $msg;?></td>

												<td><a href="#rate_salon?rate_id=<?php $_SESSION['rsln_id'] = $row['salon_id']; ?>" class="btn btn-light btn-outline-success" data-target="#rate_salon" data-toggle="modal">Give Rate</a></td>


											</tr>
										<?php } ?>


									</tbody>
								</table>

							</div>
						</div>
					</div>


					<!-- reschedule -->
					<!-- Button trigger modal -->

					<!-- Modal -->
					<div class="modal fade" id="edit_info" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Reschedule Meetings</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="customer_reschedule.php" method="Post">
										<div class="form-group">
											<label for="up_date">Date</label>
											<input type="text" class="form-control appointment_date" id="up_date" placeholder="Select Date" name="up_date">
										</div>
										<div class="form-group">
											<label for="up_time">Time</label>
											<input type="text" class="form-control appointment_time" id="up_time" placeholder="Select Time" name="up_time">
										</div>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" name="re_btn">Save changes</button>

									</form>
								</div>
							</div>
						</div>
					</div>
					


					<!-- Modal -->
					<div class="modal fade" id="rate_salon" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Give Rating To Salon</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form action="customer_reschedule.php" method="Post">
										<input type="number" name="rating_val" value="0" max="5" min="0" class="form-control">
									
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary" name="rate_btn">Submit</button>
										</form>
								</div>
							</div>
						</div>
					</div>
<!-- Feed back modal -->





<section class="ftco-section ftco-team" id="block_staff">
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
					$cid=$_SESSION['customer_id'];
					$query  = "SELECT * FROM `blocked_staff` WHERE `user_id`=$cid";

					$r=mysqli_query($conn,$query);
					
					while ($res2=mysqli_fetch_array($r)){
						$sid=$res2['staff_id'];
						$q2="SELECT * FROM `owner_staff` WHERE `s_id`=$sid";
					$res=mysqli_query($conn,$q2);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['s_image']; ?>);"></div>
									<h2><?php echo $res2['s_name'] ?></h2>
									
								</a>
							</div>

						<?php } }}?>
					
					

					</div>
				</div>
			</div>
		</div>
	</section>









<section class="ftco-section ftco-team" id="block_saloon">
	<div class="container-fluid px-md-5">
		<div class="row justify-content-center pb-3">
			<div class="col-md-10 heading-section text-center ftco-animate">

				<h2 class="mb-4">Blocked Salons</h2>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="carousel-team owl-carousel">
					<?php
					$cid=$_SESSION['customer_id'];
					$query  = "SELECT * FROM `blocked_saloon` WHERE `userid`=$cid";

					$r=mysqli_query($conn,$query);
					
					while ($res2=mysqli_fetch_array($r)){
						$sid=$res2['saloonid'];
						$q2="SELECT * FROM `salon` WHERE `salon_id`=$sid";
					$res=mysqli_query($conn,$q2);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
									<h2><?php echo $res2['salon_name'] ?></h2>
									<span class="position"><?php echo $res2['salon_address'] ?></span>
								</a>
							</div>

						<?php } }}?>
					
					

					</div>
				</div>
			</div>
		</div>
	</section>





<section class="ftco-section ftco-team" id="block_saloon">
	<div class="container-fluid px-md-5">
		<div class="row justify-content-center pb-3">
			<div class="col-md-10 heading-section text-center ftco-animate">

				<h2 class="mb-4">Favrouite Barber</h2>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="carousel-team owl-carousel">
					<?php
					$cid=$_SESSION['customer_id'];
					$query  = "SELECT * FROM `fav_barber` WHERE `customer_id`=$cid";

					$r=mysqli_query($conn,$query);
					
					while ($res2=mysqli_fetch_array($r)){
						$sid=$res2['s_id'];
						$q2="SELECT * FROM `owner_staff` WHERE `s_id`=$sid";
					$res=mysqli_query($conn,$q2);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['s_image']; ?>);"></div>
									<h2><?php echo $res2['s_name'] ?></h2>
									
								</a>
							</div>

						<?php } }}?>
					
					

					</div> 	
				</div>
			</div>
		</div>
	</section>



















<section class="ftco-section ftco-team" id="favs">
	<div class="container-fluid px-md-5">
		<div class="row justify-content-center pb-3">
			<div class="col-md-10 heading-section text-center ftco-animate">

				<h2 class="mb-4">Favrouite Salons</h2>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="carousel-team owl-carousel">
					<?php
					$cid=$_SESSION['customer_id'];
					$query  = "SELECT * FROM `favrouite_salon` WHERE `customer_id`=$cid";

					$r=mysqli_query($conn,$query);
					
					while ($res2=mysqli_fetch_array($r)){
						$sid=$res2['salon_id'];
						$q2="SELECT * FROM `salon` WHERE `salon_id`=$sid";
					$res=mysqli_query($conn,$q2);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
									<h2><?php echo $res2['salon_name'] ?></h2>
									<span class="position"><?php echo $res2['salon_address'] ?></span>
								</a>
							</div>

						<?php } }}?>
					
					

					</div>
				</div>
			</div>
		</div>
	</section>








					<footer class="ftco-footer ftco-section">
  	<!-- <div class="container">
  		<div class="row mb-5">
  			<div class="col-md">
  				<div class="ftco-footer-widget mb-4"> -->
  					<!-- <h2 class="ftco-heading-2 logo">Salon Booking Services</h2>
  						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p> -->
              <!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul> -->
              <!-- </div> -->
              <!-- </div> -->
          <!-- <div class="col-md">
          	<div class="ftco-footer-widget mb-4 ml-md-5">
          		<h2 class="ftco-heading-2">Information</h2>
          		<ul class="list-unstyled">
          			<li><a href="#" class="py-2 d-block">FAQs</a></li>
          			<li><a href="#" class="py-2 d-block">Privacy</a></li>
          			<li><a href="#" class="py-2 d-block">Terms Condition</a></li>
          		</ul>
          	</div>
          </div> -->
          <!-- <div class="col-md">
          	<div class="ftco-footer-widget mb-4">
          		<h2 class="ftco-heading-2">Links</h2>
          		<ul class="list-unstyled">
          			<li><a href="#" class="py-2 d-block">Home</a></li>
          			<li><a href="#" class="py-2 d-block">About</a></li>
          			<li><a href="#" class="py-2 d-block">Services</a></li>
          			<li><a href="#" class="py-2 d-block">Work</a></li>
          			<li><a href="#" class="py-2 d-block">Blog</a></li>
          			<li><a href="#" class="py-2 d-block">Contact</a></li>
          		</ul>
          	</div>
          </div>
          <div class="col-md">
          	<div class="ftco-footer-widget mb-4">
          		<h2 class="ftco-heading-2">Have a Questions?</h2>
          		<div class="block-23 mb-3">
          			<ul>
          				<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
          				<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
          				<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
          			</ul>
          		</div>
          	</div>
          </div> -->
          <!-- </div> -->
          <!-- <div class="row h-12"> -->
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