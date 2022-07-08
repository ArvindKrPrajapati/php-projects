









<?php 


$data = json_decode(file_get_contents("php://input"));
$start=$data->start;
$id=$data->id;
$limit=20;


 if(isset($start)){
$output=array();

require 'config.php';

$r=mysqli_query($h,"SELECT f_from FROM follow WHERE f_to='$id'");
if(mysqli_num_rows($r)>0)
 {
  while($row=mysqli_fetch_assoc($r))
   {
     //for profike
     $r2=mysqli_query($h,"SELECT id,name,image FROM user_info WHERE id='".$row['f_from']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $row2=mysqli_fetch_assoc($r2);
      
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
