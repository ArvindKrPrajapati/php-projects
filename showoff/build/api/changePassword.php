










<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data=json_decode(file_get_contents("php://input"));

$oldP=$data->oldP;
$newP=$data->newP;
$id=$data->id;

$output;
/*
$id=1;
$oldP="123";
$newP="567";
*/
require 'config.php';

$r=mysqli_query($h,"SELECT pass FROM user_info WHERE id='$id'");

$row=mysqli_fetch_assoc($r);

  if($row['pass']==$oldP){
    $rr=mysqli_query($h,"UPDATE user_info SET pass='$newP' WHERE id='$id'");
   if($rr){
   $output=["status"=>true];
     }
  }else{
   $output=["status"=>false];
  }

echo json_encode($output);

mysqli_close($h);
?>