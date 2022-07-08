
<?php
$output = array();
$data = json_decode(file_get_contents("php://input"));


$mobile = $data->data->mobile;
$pass = $data->data->password;

require 'config.php';
$q = "SELECT * FROM user_info WHERE mobile='$mobile' AND pass='$pass'";
$r = mysqli_query($h, $q);
if (mysqli_num_rows($r) > 0) {
  $row = mysqli_fetch_assoc($r);
  $output['userid'] = $row['id'];

  $output['name']  = $row['name'];
$output['mobile']=$row['mobile'];
$output['image']=$row['image'];
  $output['status'] = true;

} else
{
  $output['status'] = false;
}




echo json_encode($output);

mysqli_close($h);

?>
