<?php


if(isset($_GET['accept_req']))
{
	$id = $_GET['accept_req'];
	$q="UPDATE `salon` SET `salon_activestatus`=1 WHERE salon_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Accepted";
	header('location: admin_dashboard.php');
}

if(isset($_GET['reject_req']))
{
	$id = $_GET['reject_req'];
	$q="UPDATE `salon` SET `salon_activestatus`=3 WHERE salon_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Rejected";
	header('location: admin_dashboard.php');
}
if(isset($_GET['ac_req']))
{
	$id = $_GET['ac_req'];
	$q="UPDATE `salon` SET `salon_activestatus`=1 WHERE salon_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Rejected";
	header('location: admin_dashboard.php');
}

if(isset($_GET['bl_req']))
{
	$id = $_GET['bl_req'];
	$q="UPDATE `salon` SET `salon_activestatus`=0 WHERE salon_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Rejected";
	header('location: admin_dashboard.php');
}
if(isset($_GET['rm_req']))
{
	$id = $_GET['rm_req'];
	$q="DELETE FROM `salon` WHERE salon_id=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Rejected";
	header('location: admin_dashboard.php');
}
?>