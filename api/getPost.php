






<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$output = array();

require 'config.php';

$q = "SELECT * FROM post ORDER BY date_time DESC";
$r = mysqli_query($h, $q);
if (mysqli_num_rows($r) > 0) {
  while($row = mysqli_fetch_assoc($r))
   {
     $output[]=$row;
   }
} else{
  $output['status'] = "No more data";
}




echo json_encode($output);

mysqli_close($h);

?>
