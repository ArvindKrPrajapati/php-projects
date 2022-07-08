<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$filename = $_FILES['file']['name'];

$location = "post/".$filename;
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

  require 'config.php';
  mysqli_query($h,"INSERT INTO post(img)VALUES('$filename')");


} else {

  $data['status'] = false;

}


echo json_encode($data);

?>