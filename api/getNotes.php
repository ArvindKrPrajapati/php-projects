






<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$data = json_decode(file_get_contents("php://input"));
$start=$data->start;
$start=0;
$limit=10;
 if(isset($start)){
$output = array();

require 'config.php';

$q = "SELECT * FROM notes ORDER BY date_time DESC LIMIT {$limit} OFFSET {$start}";
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
}
?>
