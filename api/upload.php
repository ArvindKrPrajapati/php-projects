<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");



$filename = $_FILES['file']['name'];

$location = "upload/".$filename;
if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {

  $data['status'] = true;


} else {

  $data['status'] = false;

}


echo json_encode($data);

?>