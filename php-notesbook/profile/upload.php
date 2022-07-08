<?php
session_start();
include('config.php');
$id=$_SESSION['userid'];
$filename = $_FILES['file']['name']; 
$date=date("ymdhis");
$fname=$date.'-'.$filename;
$location = "image/".$fname; 
 
  $q="UPDATE user SET image='$fname' WHERE id='$id'";
  $r=mysqli_query($h,$q);
  if($r)
   {
       move_uploaded_file($_FILES['file']['tmp_name'], $location);
       $_SESSION['image']=$fname;
       echo '/profile/image/'.$fname;
   }else{
       echo false;
   }

 

?>