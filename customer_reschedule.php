<?php
session_start();
@include 'config.php';
if(!isset($_SESSION['customer_id'])){
	header('location:login_page.php');
}





if (isset($_POST['re_btn'])) {
	// $id = $_GET['bid'];

	$update=$_POST['up_date'];
	$uptime=$_POST['up_time'];
	$id =$_SESSION['bk_id'];

	$q="UPDATE `bookings` SET `ap_status`=0 ,`cs_apdate`='$update' ,`cs_aptime`='$uptime' WHERE `b_id`=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Request Accepted";
	header('location: user_my_appointments.php');
	}




if (isset($_POST['rate_btn'])) {
	// $id = $_GET['bid'];

	$rating=$_POST['rating_val'];
	
	$id =$_SESSION['rsln_id'];
	$sr="SELECT * from `salon` where `salon_id`=$id";
	$res=mysqli_query($conn,$sr);
	

	while($pr = mysqli_fetch_array($res))
    {
    	$sr=$pr['salon_rating'];
    	$tr=$rating+$sr/5;
    }
	

	$q="UPDATE `salon` SET `salon_rating`=$tr WHERE `salon_id`=$id";
	mysqli_query($conn,$q);
	$_SESSION['message'] = "Rate Done";
	header('location: user_my_appointments.php');
	}


if(isset($_GET['block_req']))
{
	
	$id = $_GET['block_req'];
	

	$q="UPDATE `owner_staff` SET `active_status`=0 WHERE s_id=$id";

	mysqli_query($conn,$q);

	$salid=$_SESSION['sid'];

	$_SESSION['message'] = "Blocked";

	header('location: salon_page.php?salon_id='.$salid);
}
if(isset($_GET['unblock_req']))
{
	
	$id = $_GET['unblock_req'];
	

	$q="UPDATE `owner_staff` SET `active_status`=1 WHERE s_id=$id";

	mysqli_query($conn,$q);

	$salid=$_SESSION['sid'];
	
	$_SESSION['message'] = "Blocked";

	header('location: salon_page.php?salon_id='.$salid);
}

if(isset($_GET['fav_barber']))
{
	
	$id = $_GET['fav_barber'];
	$csid=$_SESSION['customer_id'];

	$q="INSERT INTO `fav_barber`(`customer_id`, `s_id`) VALUES ($csid,$id)";

	mysqli_query($conn,$q);

	$salid=$_SESSION['sid'];
	
	$_SESSION['message'] = "Blocked";

	header('location: salon_page.php?salon_id='.$salid);
}

?>