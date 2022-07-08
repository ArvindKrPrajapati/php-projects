





<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));

$user_id=1;
$subject = $data->data->subject;
$semester = $data->data->semester;
$info = $data->data->info;
$module=$data->data->module;
$filename = $data->filename;

$output = array();

 require 'config.php';
$q = "INSERT INTO notes(user_id,subject,semester,module,info,filename)VALUES('$user_id','$subject','$semester','$module','$info','$filename')";
$r = mysqli_query($h, $q);

if ($r) {
  $output['status'] = true;
} else {
  $output['status'] = false;
}

echo json_encode($output);

?>