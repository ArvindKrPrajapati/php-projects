









<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$output = array();
$data = json_decode(file_get_contents("php://input"));
$to=$data->to;
$from=$data->from;
$state=$data->state;

require 'config.php';
if($state){
 $q="DELETE FROM follow WHERE f_to='$to' AND f_from='$from'";
}else{
$q="INSERT INTO follow(f_to,f_from)VALUES('$to','$from')";

}

$r=mysqli_query($h,$q);
if($r){
 $output["status"]=true;
}else{
 $output['status']=false;
}


echo json_encode($output);
?> 