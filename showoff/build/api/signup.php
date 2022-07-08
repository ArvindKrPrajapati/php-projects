





<?php

$output = array();
$data = json_decode(file_get_contents("php://input"));

$name=$data->data->fname;
$mobile = $data->data->mobile;
$pass = $data->data->password;
$image="d.png";
require 'config.php';

$q="INSERT INTO user_info(name,mobile,pass,image)VALUES('$name','$mobile','$pass','$image')";

$r=mysqli_query($h,$q);
if($r){
 $q1="SELECT * FROM user_info WHERE mobile='$mobile'";

$r1=mysqli_query($h,$q1);

$row=mysqli_fetch_assoc($r1);
$output['userid'] = $row['id'];
$output['image']=$row['image'];
  $output['name']  = $row['name'];
$output['mobile']=$row['mobile'];
  $output['status'] = true;

}else{
  $output['status'] = false;
}




echo json_encode($output);


?>
