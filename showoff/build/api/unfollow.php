








<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$data = json_decode(file_get_contents("php://input"));

$id=$data->id;
$output;
require 'config.php';
 $r=mysqli_query($h,"DELETE FROM follow WHERE id='$id'");

if($r){
 $output=["status"=>true];
}else{
 $output=["status"=>false];
}



echo json_encode($output);

mysqli_close($h);

 ?>