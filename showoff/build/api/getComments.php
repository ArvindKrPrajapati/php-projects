





<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$data= json_decode(file_get_contents("php://input"));

$post_id=$data->postid;
$start=$data->start;
$limit=20;
 if(isset($start)){
$output = array();

require 'config.php';

$q = "SELECT * FROM comments WHERE post_id='$post_id' ORDER BY date_time DESC LIMIT {$limit} OFFSET {$start}";
$r = mysqli_query($h, $q);
if (mysqli_num_rows($r) > 0) {
  while($row = mysqli_fetch_assoc($r))
   {
       //for profike
     $r2=mysqli_query($h,"SELECT id,name,image FROM user_info WHERE id='".$row['user_id']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $row2=mysqli_fetch_assoc($r2);
      $row['name']=$row2['name'];
      $row['id']=$row2['id'];
      $row['image']=$row2['image'];
   }else{
     $row['name']="user not exists";
   }
   //end profile
   

      
     $output[]=$row;
   }
} else{
  $output[] = ["status"=>false];
}




echo json_encode($output);

mysqli_close($h);
}
?>