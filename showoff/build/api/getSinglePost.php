











<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));


$post_id=$data->post_id;
$myid=$data->myid;
 $output;
/*
$post_id=57;
$myid=2;
*/
require 'config.php';

$q = "SELECT user_id,post_img FROM post WHERE id='$post_id'";

$r=mysqli_query($h,$q);
if(mysqli_num_rows($r)>0)
{
  $row=mysqli_fetch_assoc($r);



  //for profike
     $r2=mysqli_query($h,"SELECT name FROM user_info WHERE id='".$row['user_id']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $row2=mysqli_fetch_assoc($r2);
      $row['name']=$row2['name'];
   }else{
     $row['name']="user not exists";
   }
   //end profile
   
  //for likes
   $row['liked']=false;
   $likes=mysqli_query($h,"SELECT user_id FROM likes WHERE post_id='$post_id'");
   if(mysqli_num_rows($likes)>0){
     $i=0;
     while($row3=mysqli_fetch_assoc($likes)) 
      {
       $i++;
       if($row3['user_id']==$myid){
         $row['liked']=true;
       }
     }
   $row['heart']=$i;
   }else{
     $row['heart']=0;
   }


     //liked ends
   
// for comment
       
$comm=mysqli_query($h,"SELECT id FROM comments WHERE post_id='$post_id'");
   $k=0;
   if(mysqli_num_rows($comm)>0){
     while($row4=mysqli_fetch_assoc($comm)){
       $k++;
      }
   }
 $row['comm']=$k;
 
//end comment
$row["status"]=true;
  $output=$row;
}
else
 {
   $output=["status"=>false];
 }

echo json_encode($output);

mysqli_close($h);

?>