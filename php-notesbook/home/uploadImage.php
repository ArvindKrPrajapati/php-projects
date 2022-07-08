







<?php 
$filename = $_FILES['file']['name']; 
$date=date("ymdhis");
$fname=$date.'-'.$filename;
$location = "upload/".$fname; 
if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){ 

      echo $fname; 
     

   }else{ 

      echo 0; 

   } 
  ?>