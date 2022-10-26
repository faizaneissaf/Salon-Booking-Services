?>
<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['customer_id'])){
	header('location:login_page.php');
}
?>
<?php
//require("db.php");

// Select all the rows in the markers table
$query = "SELECT * FROM salon";
$result = mysqli_query($conn,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
echo '<markers>';
$ind=0;
// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  echo '<salon ';
  echo 'salon_id="' . $row['salon_id'] . '" ';
  echo 'salon_name="' . parseToXML($row['salon_name']) . '" ';
  echo 'salon_address="' . parseToXML($row['salon_address']) . '" ';
  echo 'salon_latitude="' . $row['salon_latitude'] . '" ';
  echo 'salon_longitude="' . $row['salon_longitude'] . '" ';
  echo 'salon_rating="' . $row['salon_rating'] . '" ';
  // echo 'type="' . $row['type'] . '" ';
  echo 'type="R" ';
  echo '/>';
  $ind = $ind + 1;
}

// End XML file
echo '</markers>';
}
?>

<?php
					$query="";
					$serid="";
					if(isset($_POST['services'])){

					$serid = implode(',',$_POST['services']);

					
					$query="select  salon.*,salon_services.* from  salon join salon_services on salon.salon_id=salon_services.salon_id where salon_services.ss_id in($serid)";

				}
					else 
						$query  = "SELECT * FROM `salon`";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Salon Booking Services</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<!-- <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:500,600,700&display=swap" rel="stylesheet"> -->

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



	<!-- For Map -->
	<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
	<!-- <script type="module" src="map_js.js"></script> -->

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
					<!-- <li class="nav-item"><a href="#exampleModalCenter" class="nav-link" data-toggle="modal"s data-target="#exampleModalCenter" >Search</a></li> -->
					<li class="nav-item"><a href="index.php#explore_salons" class="nav-link">Explore</a></li>
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
					<form action="owner_addstafdata.php"  method="Post" enctype="multipart/form-data">
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
								<option value="male">Male</option>
								<option value = "Female">Female</option>

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
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Facial
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
									MAKE-UP
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Nails Treatments
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
									Pre-Bridal
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
							<div class="form-check">
								<input class="form-check-input" type="checkbox" value="" id="">
								<label class="form-check-label" for="">
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
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Search</button>
				</div>
			</div>
		</div>
	</div>
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
						<!-- <span class="subheading">Welcome to Salon Booking Services</span>
						<h1 class="mb-4">We Provide Best Salons</h1>
						<p><a href="#explore_salons" class="btn btn-primary btn-outline-primary px-4 py-2">Book now</a></p> -->
						<!-- Map  -->
						<style type="text/css">
							#map {
								height: 400px;
								/* The height is 400 pixels */
								width: 100%;
								/* The width is the width of the web page */
							}
						</style>
						<div id="map"></div>

						<!-- Map script -->
						<script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(33.6844, 73.0479),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost/SalonBookingServices/xml.php?q=<?php echo $query?>', function(data) {
            var xml = data.responseXML;
           // alert(xml);
            var markers = xml.documentElement.getElementsByTagName('salon');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('salon_id');
              var name = markerElem.getAttribute('salon_name');
              var address = markerElem.getAttribute('salon_address');
              var srating = markerElem.getAttribute('salon_rating');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('salon_latitude')),
                  parseFloat(markerElem.getAttribute('salon_longitude')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('a');
              var sid= id ;
              var link = "salon_page.php?salon_id=";
              var flink= link.concat(id);
              strong.href = flink
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              infowincontent.appendChild(document.createElement('br'));

              var text2 = document.createElement('text');
              var text3 = document.createElement('text');
              text2.textContent = srating
              text3.textContent = "Rating : "
              infowincontent.appendChild(text3);
              infowincontent.appendChild(text2);

              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
						<!-- Map -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section ftco-team" id="search_results">
	<div class="container-fluid px-md-5">
		<div class="row justify-content-center pb-3">
			<div class="col-md-10 heading-section text-center ftco-animate">
				<!-- <span class="subheading">Explore Salons</span> -->
				<h2 class="mb-4">Search Results</h2>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 ftco-animate">
				<div class="carousel-team owl-carousel">
					<?php
					$res=mysqli_query($conn,$query);
					if (mysqli_num_rows($res)>0) {
						while ($res2=mysqli_fetch_array($res)){ ?>

							<div class="item">
								<a href="salon_page.php?salon_id=<?php echo $res2['salon_id']; ?>" class="team text-center">
									<div class="img" style="background-image: url(html/Images/<?php echo $res2['salon_img']; ?>);"></div>
									<h2><?php echo $res2['salon_name'] ?></h2>
									<span class="position"><?php echo $res2['salon_address'] ?></span>
								</a>
							</div>

						<?php } }?>

					</div>
				</div>
			</div>
		</div>
	</section>


<!-- <div class="container">
	<?php 
	foreach ($_SESSION['w_choices'] as $key => $value) {?>
						
	<span><?php echo $value ;?></span>
	<?php }?>
</div> -->


		<!-- Map -->
		<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDFib9egD8hWoE3EGIfw1tr0zfzQOt3HEw&callback=initMap&v=weekly"
      defer
    ></script>
		<!-- Salon Map -->


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
          	<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
          	<script src="js/google-map.js"></script>
          	<script src="js/main.js"></script>
<?php
echo $query;
echo"ggggg";
echo "<br/>".$serid;
if(isset($_POST['services'])){
						 //echo implode(',',$_POST['services']);
					}
						?>
          </body>
          </html>