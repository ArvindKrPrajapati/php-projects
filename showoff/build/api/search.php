








<?php 

 $data=json_decode(file_get_contents("php://input"));

$search=$data->search;

$output=array();
if(isset($search)){
  require 'config.php';
  
  $q="SELECT id,name,image,date_time FROM user_info WHERE name LIKE '%$search%'";

  $r=mysqli_query($h,$q);
  if(mysqli_num_rows($r)>0){
     while($row=mysqli_fetch_assoc($r)){
        $output[]=$row;
      }
  }
}
echo json_encode($output);
 ?>