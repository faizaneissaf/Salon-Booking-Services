<?php 
session_start();
if(!isset($_SESSION['owner_id'])){
	header('location:login_page.php');
}

if (isset($_POST['btn_register'])&& isset($_FILES['salon_img'])) {
	include "config.php";

	echo "<pre>";
	// print_r($_FILES['image']);
	echo "</pre>";
	// Variables
	$s_name=$_POST['salon_name'];
	$s_for=$_POST['salon_for'];
	$s_total_seats=$_POST['salon_seats'];
	$s_phone=$_POST['salon_phone'];
	$s_email=$_POST['salon_email'];
	$s_address=$_POST['salon_address'];
	$s_longitude=$_POST['salon_lg'];
	$s_latitude=$_POST['salon_lt'];
	$s_openingtime=$_POST['salon_opening_time'];
	$s_closingtime=$_POST['salon_closing_time'];
	$s_total_slots=$_POST['total_slots'];
	$s_rating=0;
	$s_owner_id=$_SESSION['owner_id'];
	$s_activestatus=0;
	// 
	$img_name = $_FILES['salon_img']['name'];
	$img_size = $_FILES['salon_img']['size'];
	$tmp_name = $_FILES['salon_img']['tmp_name'];
	$error = $_FILES['salon_img']['error'];

	if ($error === 0) {
		if ($img_size > 1250000) {
			$em = "Sorry, your file is too large.";
		    // header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = 'Images/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database
				$sql = "INSERT INTO `salon`( `salon_name`, `salon_for`, `salon_totalseats`, `salon_phone`, `salon_email`, `salon_address`, `salon_longitude`, `salon_latitude`, `salon_openingtime`, `salon_closingtime`, `salon_rating`, `owner_id`, `salon_activestatus`, `salon_img`,`total_slots`) VALUES ('$s_name','$s_for','$s_total_seats','$s_phone','$s_email','$s_address','$s_longitude','$s_latitude','$s_openingtime','$s_closingtime','$s_rating','$s_owner_id','$s_activestatus','$new_img_name','$s_total_slots')";
				mysqli_query($conn, $sql);
				header("Location: owner_pendingreq.php");
			}else {
				// $em = "You can't upload files of this type";
				header("Location: error-403.html");
			}
		}
	}else {
		$em = "unknown error occurred!";
		header("Location: error-404.html");
	}

}else {
	header("Location: error-405.html");
}