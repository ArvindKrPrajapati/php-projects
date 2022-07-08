





<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));

$myid=$data->myid;
$post_id=$data->id;
$comm=$data->comm;
/*
$myid=1;
$post_id=6;
$comm="hello";
*/
$poster_id;
$output = array();

 require 'config.php';
  $res=mysqli_query($h,"SELECT user_id FROM post WHERE id='$post_id'");
if($res)
   {
     $row=mysqli_fetch_assoc($res);
     $poster_id=$row['user_id'];
     
   }else{
   //if query is not executed
    }

$q = "INSERT INTO comments(user_id,post_id,poster_id,comment)VALUES('$myid','$post_id','$poster_id','$comm')";
$r = mysqli_query($h, $q);

if ($r) {
  $output['status'] = true;
} else {
  $output['status'] = false;
}

echo json_encode($output);


?>