





<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));

$myid=$data->myid;
$post_id=$data->id;
$state=$data->state;
$poster_id;

$output = array();

 require 'config.php';
 if($state){
$res=mysqli_query($h,"SELECT user_id FROM post WHERE id='$post_id'");
if($res)
   {
     $row=mysqli_fetch_assoc($res);
     $poster_id=$row['user_id'];
     
   }else{
   //if query is not executed
    }

$q = "INSERT INTO likes(user_id,post_id,poster_id)VALUES('$myid','$post_id','$poster_id')";

 }else{

  $q="DELETE FROM likes WHERE user_id='$myid' AND post_id='$post_id'";
 }
$r = mysqli_query($h, $q);

if ($r) {
  $output['status'] = true;
} else {
  $output['status'] = false;
}

echo json_encode($output);

?>