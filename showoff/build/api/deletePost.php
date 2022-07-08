







<?php 

$data=json_decode(file_get_contents("php://input"));

$post_id=$data->post_id;
$image=$data->image;
$path="./post/".$image;


$output=array();
require 'config.php';
$post=mysqli_query($h,"DELETE FROM post WHERE id='$post_id'");

$comm=mysqli_query($h,"DELETE FROM comments WHERE post_id='$post_id'");

$likes=mysqli_query($h,"DELETE FROM likes WHERE post_id='$post_id'");


  if(file_exists($path))
   {
     unlink($path);
     $output['status']=true;
   }
 else
  {
    $output['status']=false;
  }
echo json_encode($output);
 
 ?>