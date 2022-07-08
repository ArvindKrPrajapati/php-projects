









<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data=json_decode(file_get_contents("php://input"));

$id=$data->id;

$output;
require 'config.php';
 $post=mysqli_query($h,"DELETE FROM post WHERE user_id='$id'");

$likes=mysqli_query($h,"DELETE FROM likes WHERE user_id='$id'");

$comm=mysqli_query($h,"DELETE FROM comments WHERE user_id='$id'");

$follow=mysqli_query($h,"DELETE FROM follow WHERE f_to='$id' OR f_from='$id'");

if($post && $likes && $comm && $follow)
{
 $user=mysqli_query($h,"DELETE FROM user_info WHERE id='$id'");
  if($user){
    $output=["status"=>true];
  }else{
    $output=["status"=>false];
   }
}else{
$output=["status"=>false];
}
echo json_encode($output);

mysqli_close($h);
?>