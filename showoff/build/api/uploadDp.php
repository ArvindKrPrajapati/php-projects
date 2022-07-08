















<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

 $data=json_decode(file_get_contents("php://input"));
$output=array();

$id=$_POST['id'];

$filename = $_FILES['file']['name'];

$location = "image/".$filename;
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

  require 'config.php';

 mysqli_query($h,"UPDATE user_info SET image='$filename' WHERE id='$id'");

} else {

  $output['status'] = false;

}


echo json_encode($output);

?>