


















<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$data = json_decode(file_get_contents("php://input"));
$start=$data->start;
$id=$data->id;
$limit=20;


 if(isset($start)){
$output=array();

require 'config.php';

$r=mysqli_query($h,"SELECT id,f_to FROM follow WHERE f_from='$id'");
if(mysqli_num_rows($r)>0)
 {
  while($row=mysqli_fetch_assoc($r))
   {
     //for profike
     $r2=mysqli_query($h,"SELECT id,name,image FROM user_info WHERE id='".$row['f_to']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $row2=mysqli_fetch_assoc($r2);
      $row2['follow_id']=$row['id'];
   }else{
     $row2['name']="user not exists";
   }
   //end profile
     
     $output[]=$row2;
   }
}
else
{
$output[] = ["status"=>false];
}
echo json_encode($output);

mysqli_close($h);
}

 ?>