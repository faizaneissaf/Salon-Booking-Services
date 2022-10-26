<?php


if(isset($_GET['a_req']))
{
	$id = $_GET['a_req'];
	$q="UPDATE `bookings` SET `ap_status`=1 WHERE b_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Accepted";
	header('location: owner_bookings.php');
}

if(isset($_GET['r_req']))
{
	$id = $_GET['r_req'];
	$q="UPDATE `bookings` SET `ap_status`=2 WHERE b_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Rejected";
	header('location: owner_bookings.php');
}

if(isset($_GET['done_req']))
{
	$id = $_GET['done_req'];
	$q="UPDATE `bookings` SET `ap_status`=3 WHERE b_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Service Done";
	header('location: owner_bookings.php');
}
?>