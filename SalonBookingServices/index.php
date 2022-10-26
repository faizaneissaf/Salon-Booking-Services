<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['customer_id'])){
	header('location:login_page.php');
}
$uid = $_SESSION['customer_id'];
$sid="";
if(isset($_GET['salon_bid']))
{
	
$sid=$_GET['salon_bid'];
$query  = "insert into  `blocked_saloon`(userid,saloonid)values($uid,$sid)";
echo $query;
    						$res=mysqli_query($conn,$query);
    						if ($res) {
    							echo"<script>alert('Saloon Blocked')</script>";
    						}
}
if(isset($_GET['salon_ubid']))
{
$sbid=$_GET['salon_ubid'];
$query  = "DELETE from blocked_saloon where saloonid=$sbid and userid=$uid";
echo $query;
    						$res=mysqli_query($conn,$query);
    						if ($res) {
    							echo"<script>alert('Saloon Unblocked')</script>";
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
					<!-- <li class="nav-item"><a href="#services" class="nav-link">Services</a></li> -->
					<!-- <li class="nav-item"><a href="gallery.html" class="nav-link">Gallery</a></li> -->
					<!-- <li class="nav-item"><a href="about.html" class="nav-link">About</a></li> -->
					<!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
					<li class="nav-item"><a href="#exampleModalCenter" class="nav-link" data-toggle="modal" data-target="#exampleModalCenter" >Search</a></li>
					<li class="nav-item"><a href="#explore_salons" class="nav-link">Explore</a></li>
					<li class="nav-item"><a href="user_my_appointments.php" class="nav-link">My bookings</a></li>
					<li class="nav-item"><a href="user_my_appointments.php#favs" class="nav-link">Fav Salon</a></li>
					<li class="nav-item"><a href="http://localhost/SalonBookingServices/index.php#blocked_salons" class="nav-link">Blocked Saloon</a></li>
					<li class="nav-item"><a href="http://localhost/SalonBookingServices/index.php#blocked_salons" class="nav-link">Blocked Staff</a></li>
					
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
							<button type="button" class="btn btn-primary" name="btn_search" >Search</button></a>
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

			// $_SESSION['w_choices']=$female_choices;

			
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
							<span class="subheading">Welcome to Salon Booking Services</span>
							<h1 class="mb-4">We Provide Best Salons</h1>
							<p><a href="#explore_salons" class="btn btn-primary btn-outline-primary px-4 py-2">Book now</a></p>
							<p><a href="#spoc" class="btn btn-primary btn-outline-primary px-4 py-2">Special Occaions</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb" id="explore_salons">
		<div class="container-fluid px-0">
			<div class="row no-gutters">
				<div class="col-md text-center d-flex align-items-stretch">
					<div class="services-wrap d-flex align-items-center img" style="background-image: url(images/formen.jpg);">
						<div class="text">
							<h3>For Men</h3>
							<p><a href="#salons_for_men" class="btn-custom">Explore Salons <span class="ion-ios-arrow-round-forward"></span></a></p>
						</div>
					</div>
				</div>
				<div class="col-md-3 text-center d-flex align-items-stretch">
					<div class="text-about py-5 px-4">
						<h1 class="logo">
							<a href="#"><span class="flaticon-scissors-in-a-hair-salon-badge"></span>Salon Booking Services</a>
						</h1>
						<h2>Welcome to Salon Booking Services</h2>
						<p>We Provide Best Salons on Our Platform Where You can Book appointment on Your Favrouite Salon Nearby</p>

					</div>
				</div>
				<div class="col-md text-center d-flex align-items-stretch">
					<div class="services-wrap d-flex align-items-center img" style="background-image: url(images/forwomen.jpg);">
						<div class="text">
							<h3>For Women</h3>
							<p><a href="#salons_for_women" class="btn-custom">Explore Salons <span class="ion-ios-arrow-round-forward"></span></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="services-section ftco-section" id="services">
		<div class="container">
			<div class="row justify-content-center pb-3">
				<div class="col-md-10 heading-section text-center ftco-animate">
					<span class="subheading">Services</span>
					<h2 class="mb-4">Services Menu</h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
				</div>
			</div>
			<div class="row no-gutters d-flex">
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="icon"><span class="flaticon-male-hair-of-head-and-face-shapes"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Haircut &amp; Styling</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>    
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="icon"><span class="flaticon-beard"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Beard</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>      
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="icon"><span class="flaticon-beauty-products"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Makeup</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>      
				</div>
				<div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
					<div class="media block-6 services d-block text-center">
						<div class="icon"><span class="flaticon-healthy-lifestyle-logo"></span></div>
						<div class="media-body">
							<h3 class="heading mb-3">Body Treatment</h3>
							<p>A small river named Duden flows by their place and supplies.</p>
						</div>
					</div>      
				</div>
			</div>
		</div>
	</section>

    <!-- <section class="ftco-section ftco-booking bg-light">
    	<div class="container ftco-relative">
    		<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Booking</span>
            <h2 class="mb-4">Make an Appointment</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <h3 class="vr">Call Us: 012-3456-7890</h3>
    		<div class="row justify-content-center">
    			<div class="col-md-10 ftco-animate">
    				<form action="#" class="appointment-form">
	            <div class="row">
	              <div class="col-sm-6">
	                <div class="form-group">
			              <input type="text" class="form-control" id="appointment_name" placeholder="Name">
			            </div>
	              </div>
	              <div class="col-sm-6">
	                <div class="form-group">
			              <input type="text" class="form-control" id="appointment_email" placeholder="Email">
			            </div>
	              </div>
	              <div class="col-sm-6">
	                <div class="form-group">
	                  <input type="text" class="form-control appointment_date" placeholder="Date">
	                </div>    
	              </div>
	              <div class="col-sm-6">
	                <div class="form-group">
	                  <input type="text" class="form-control appointment_time" placeholder="Time">
	                </div>
	              </div>
	              <div class="col-sm-6">
	                <div class="form-group">
			              <div class="select-wrap">
                      <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                      <select name="" id="" class="form-control">
                      	<option value="">Professional Makeup</option>
                        <option value="">Manicure Pedicure</option>
                        <option value="">Body Treatment</option>
                        <option value="">Haircut &amp; Coloring</option>
                      </select>
                    </div>
			            </div>
	              </div>
	              <div class="col-sm-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" id="phone" placeholder="Phone">
	                </div>
	              </div>
	              <div class="col-md-12">
	              	<div class="form-group">
		                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
		              </div>
	              </div>
		          </div>
		          <div class="form-group">
	              <input type="submit" value="Make an Appointment" class="btn btn-primary">
	            </div>
	          </form>
    			</div>
    		</div>
    	</div>
    </section> -->


    <section class="ftco-section ftco-team" id="salons_for_men">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center pb-3">
    			<div class="col-md-10 heading-section text-center ftco-animate">
    				<span class="subheading">Explore Salons</span>
    				<h2 class="mb-4">Salons For Men</h2>

    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="carousel-team owl-carousel">
    					<?php
    					$query  = "SELECT * FROM `salon` WHERE `salon_for`='Men' AND salon_id not in(select saloonid from blocked_saloon where userid=$uid)  order by  `salon_rating` desc";
    					
    					//echo $query;
    					$res=mysqli_query($conn,$query);
    					if (mysqli_num_rows($res)>0) {
    						while ($res2=mysqli_fetch_array($res)){ ?>

    							<div class="item">
    								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
    									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
    									<h2><?php echo $res2['salon_name'] ?></h2>
    									<span class="position"><?php echo $res2['salon_address'] ?></span><br>
    									<span class="position">Rating : <?php echo $res2['salon_rating'] ?></span>
    								</a>
    								<a href="index.php?salon_bid=<?php echo $res2['salon_id']; ?>#salons_for_men" class="team text-center"><b>Block</b></a>
    							</div>

    						<?php } }?>

    					</div>
    				</div>
    			</div>
    		</div>
    	</section>


    	<section class="ftco-section ftco-team" id="blocked_salons">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center pb-3">
    			<div class="col-md-10 heading-section text-center ftco-animate">
    				<span class="subheading">Explore Salons</span>
    				<h2 class="mb-4">Blocked Salons</h2>

    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="carousel-team owl-carousel">
    					<?php
    					$query  = "SELECT * FROM `salon` WHERE `salon_for`='Men' AND salon_id  in(select saloonid from blocked_saloon where userid=$uid)  order by  `salon_rating` desc";
    					
    					//echo $query;
    					$res=mysqli_query($conn,$query);
    					if (mysqli_num_rows($res)>0) {
    						while ($res2=mysqli_fetch_array($res)){ ?>

    							<div class="item">
    								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
    									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
    									<h2><?php echo $res2['salon_name'] ?></h2>
    									<span class="position"><?php echo $res2['salon_address'] ?></span><br>
    									<span class="position">Rating : <?php echo $res2['salon_rating'] ?></span>
    								</a>
    								<a href="index.php?salon_ubid=<?php echo $res2['salon_id']; ?>#blocked_salons" class="team text-center"><b>Unblock</b></a>
    							</div>

    						<?php } }?>

    					</div>
    				</div>
    			</div>
    		</div>
    	</section>




<section class="ftco-section ftco-team" id="blocked_staff">
    	<div class="container-fluid px-md-5">
    		<div class="row justify-content-center pb-3">
    			<div class="col-md-10 heading-section text-center ftco-animate">
    				<span class="subheading">Explore Salons</span>
    				<h2 class="mb-4">Blocked Staff</h2>

    			</div>
    		</div>
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="carousel-team owl-carousel">
    					<?php
    					$query  = "SELECT * FROM `salon` WHERE `salon_for`='Men' AND salon_id  in(select saloonid from blocked_saloon where userid=$uid)  order by  `salon_rating` desc";
    					
    					//echo $query;
    					$res=mysqli_query($conn,$query);
    					if (mysqli_num_rows($res)>0) {
    						while ($res2=mysqli_fetch_array($res)){ ?>

    							<div class="item">
    								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
    									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
    									<h2><?php echo $res2['salon_name'] ?></h2>
    									<span class="position"><?php echo $res2['salon_address'] ?></span><br>
    									<span class="position">Rating : <?php echo $res2['salon_rating'] ?></span>
    								</a>
    								<a href="index.php?salon_ubid=<?php echo $res2['salon_id']; ?>#blocked_salons" class="team text-center"><b>Unblock</b></a>
    							</div>

    						<?php } }?>

    					</div>
    				</div>
    			</div>
    		</div>
    	</section>




    	<section class="ftco-section ftco-team" id="salons_for_women">
    		<div class="container-fluid px-md-5">
    			<div class="row justify-content-center pb-3">
    				<div class="col-md-10 heading-section text-center ftco-animate">
    					<span class="subheading">Explore Salons</span>
    					<h2 class="mb-4">Salons For Women</h2>

    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12 ftco-animate">
    					<div class="carousel-team owl-carousel">
    						<?php
    						$query  = "SELECT * FROM `salon` WHERE `salon_for`='women' order by  `salon_rating` desc";
    						$res=mysqli_query($conn,$query);
    						if (mysqli_num_rows($res)>0) {
    							while ($res2=mysqli_fetch_array($res)){ ?>

    								<div class="item">
    									<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
    										<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
    										<h2><?php echo $res2['salon_name'] ?></h2>
    										<span class="position"><?php echo $res2['salon_address'] ?></span>
    										<br>
    										<span class="position">Rating : <?php echo $res2['salon_rating'] ?></span>
    									</a>
    								</div>

    							<?php } }?>

    						</div>
    					</div>
    				</div>
    			</div>
    		</section>


    		<section class="ftco-section ftco-no-pt ftco-no-pb">
    			<div class="container">
    				<div class="row no-gutters justify-content-center mb-5 pb-2">
    					<div class="col-md-6 text-center heading-section ftco-animate">
    						<!-- <span class="subheading">Gallery</span> -->
    						<h2 class="mb-4">Gallery</h2>
    						<!-- <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
    					</div>
    				</div>
    			</div>
    			<div class="container-fluid p-0">
    				<div class="row no-gutters">
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-1.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Stylist</span>
    								<h3><a href="project.html">Beard</a></h3>
    							</div>
    							<a href="images/work-1.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-2.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Haircut</a></h3>
    							</div>
    							<a href="images/work-2.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-3.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Hairstylist</a></h3>
    							</div>
    							<a href="images/work-3.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-4.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Haircut</a></h3>
    							</div>
    							<a href="images/work-4.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-5.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Makeup</a></h3>
    							</div>
    							<a href="images/work-5.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-6.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Fashion</span>
    								<h3><a href="project.html">Model</a></h3>
    							</div>
    							<a href="images/work-6.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-7.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Makeup</a></h3>
    							</div>
    							<a href="images/work-7.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    					<div class="col-md-6 col-lg-3 ftco-animate">
    						<div class="project">
    							<img src="images/work-8.jpg" class="img-fluid" alt="Colorlib Template">
    							<div class="text">
    								<span>Beauty</span>
    								<h3><a href="project.html">Makeup</a></h3>
    							</div>
    							<a href="images/work-8.jpg" class="icon image-popup d-flex justify-content-center align-items-center">
    								<span class="icon-expand"></span>
    							</a>
    						</div>
    					</div>
    				</div>
    			</div>
    		</section>
<section class="ftco-section ftco-team" id="spoc">
    		<div class="container-fluid px-md-5">
    			<div class="row justify-content-center pb-3">
    				<div class="col-md-10 heading-section text-center ftco-animate">
    					<!-- <span class="subheading">Explore Salons</span> -->
    					<h2 class="mb-4">Offers For Special Occaions</h2>

    				</div>
    			</div>
    			<div class="row">
    				<div class="col-md-12 ftco-animate">
    					<div class="carousel-team owl-carousel">
    						<?php
    						$query  = "SELECT * FROM `salon`";
    						$res=mysqli_query($conn,$query);
    						if (mysqli_num_rows($res)>0) {
    							while ($res2=mysqli_fetch_array($res)){ ?>

    								<div class="item">
    									<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
    										<!-- <div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div> -->
    										<div class="img" style="background-image: url(Images/tenp2.jpg);"></div>
    										<h2><?php echo $res2['salon_name'] ?></h2>
    										<span class="position"><?php echo $res2['salon_address'] ?></span>
    										<br>
    										<span class="position">Rating : <?php echo $res2['salon_rating'] ?></span>
    									</a>
    								</div>

    							<?php } }?>

    						</div>
    					</div>
    				</div>
    			</div>
    		</section>
		<!-- <section class="ftco-section ftco-pricing">
			<div class="container">
				<div class="row justify-content-center pb-3">
          <div class="col-md-10 heading-section text-center ftco-animate">
          	<span class="subheading">Pricing</span>
            <h2 class="mb-4">Our Prices</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row">
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Hair Style</h3>
	        			<p><span class="price">$50.00</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Hair Dryer</li>
								<li>Hair Coloring</li>
								<li>Hair Cut</li>
								<li>Hair Dresser</li>
								<li>Hair Spa</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Manicure Pedicure</h3>
	        			<p><span class="price">$34.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Manicure</li>
								<li>Pedicure</li>
								<li>Coloring</li>
								<li>Nails</li>
								<li>Nail Cut</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry active pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Makeup</h3>
	        			<p><span class="price">$54.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Makeup</li>
								<li>Professional Makeup</li>
								<li>Blush On</li>
								<li>Facial Massage</li>
								<li>Facial Spa</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
        		</div>
        	</div>
        	<div class="col-md-3 ftco-animate">
        		<div class="pricing-entry pb-5 text-center">
        			<div>
	        			<h3 class="mb-4">Body Treatment</h3>
	        			<p><span class="price">$89.50</span> <span class="per">/ session</span></p>
	        		</div>
        			<ul>
        				<li>Massage</li>
								<li>Spa</li>
								<li>Foot Spa</li>
								<li>Body Spa</li>
								<li>Relaxing</li>
        			</ul>
        			<p class="button text-center"><a href="#" class="btn btn-primary px-4 py-3">Get Offer</a></p>
        		</div>
        	</div>
        </div>
			</div>
		</section> -->

		<!-- <section class="testimony-section bg-light">
      <div class="container">
        <div class="row ftco-animate justify-content-center">
        	<div class="col-md-6 col-lg-5 d-flex">
        		<div class="testimony-img" style="background-image: url(images/testimony-img.jpg);"></div>
        	</div>
          <div class="col-md-6 col-lg-7 py-5 pl-md-5">
          	<div class="py-md-5">
	          	<div class="heading-section ftco-animate">
	          		<span class="subheading">Testimony</span>
			          <h2 class="mb-0">Happy Customer</h2>
			        </div>
	            <div class="carousel-testimony owl-carousel ftco-animate">
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url(images/stylist-1.jpg)">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Jeff Nucci</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url(images/stylist-2.jpg)">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Jeff Nucci</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url(images/stylist-3.jpg)">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Jeff Nucci</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url(images/stylist-4.jpg)">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Jeff Nucci</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	              <div class="item">
	                <div class="testimony-wrap pb-4">
	                  <div class="text">
	                    <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
	                  </div>
	                  <div class="d-flex">
		                  <div class="user-img" style="background-image: url(images/stylist-5.jpg)">
		                  </div>
		                  <div class="pos ml-3">
		                  	<p class="name">Jeff Nucci</p>
		                    <span class="position">Businessman</span>
		                  </div>
		                </div>
	                </div>
	              </div>
	            </div>
	          </div>
          </div>
        </div>
      </div>
    </section>
  -->
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