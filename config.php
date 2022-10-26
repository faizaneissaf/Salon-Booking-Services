   
<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "salonbookingservice";

$conn=mysqli_connect($servername, $username, $password, $db);

if ($conn){
	// echo "Connected";
}
else
{
	echo "Not Connected";
}
 ?>