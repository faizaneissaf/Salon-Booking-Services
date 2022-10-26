<?php 
session_start();
if(!isset($_SESSION['owner_id'])&&$_SESSION['salon_id']){
  header('location:login_page.php');
}

if (isset($_POST['btn_addservice'])&& isset($_FILES['ss_image'])) {
	include "config.php";

	echo "<pre>";
	// print_r($_FILES['image']);
	echo "</pre>";
	// Variables
	$sname=$_POST['ss_name'];
	$sdescription=$_POST['ss_description'];
	$sprovider=$_POST['ss_barber'];
	$sreqtime=$_POST['ss_reqtime'];
	$salonid=$_SESSION['salon_id'];
	// 
	$img_name = $_FILES['ss_image']['name'];
	$img_size = $_FILES['ss_image']['size'];
	$tmp_name = $_FILES['ss_image']['tmp_name'];
	$error = $_FILES['ss_image']['error'];

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
				$sql = "INSERT INTO `salon_services`( `ss_name`, `ss_image`, `ss_description`, `ss_barbername`, `salon_id`, `ss_req_time`) VALUES ('$sname','$new_img_name','$sdescription','$sprovider','$salonid','$sreqtime')";
				mysqli_query($conn, $sql);
				header("Location: owner_dashboard.php");
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