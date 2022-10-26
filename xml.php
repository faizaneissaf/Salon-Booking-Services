<?php
require("db.php");

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}


// Select all the rows in the markers table
$query = "SELECT * FROM salon";

if($_GET['q'])
  $query = $_GET['q'];
$result = mysqli_query($conn,$query);
if (!$result) {
  die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo "<?xml version='1.0' ?>";
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

?>
