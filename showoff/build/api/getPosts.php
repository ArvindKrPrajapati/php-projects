








<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$data = json_decode(file_get_contents("php://input"));
$start=$data->start;
$limit=5;
$myid=$data->myid;
 if(isset($start)){
$output = array();

require 'config.php';

$q = "SELECT * FROM post ORDER BY date_time DESC LIMIT {$limit} OFFSET {$start}";
$r = mysqli_query($h, $q);
if (mysqli_num_rows($r) > 0) {
  while($row = mysqli_fetch_assoc($r))
   {








     //for profike
     $r2=mysqli_query($h,"SELECT name,image FROM user_info WHERE id='".$row['user_id']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $row2=mysqli_fetch_assoc($r2);
      $row['name']=$row2['name'];
      $row['image']=$row2['image'];
   }else{
     $row['name']="user not exists";
   }
   //end profile
   





   //for likes
   $row['liked']=false;
   $likes=mysqli_query($h,"SELECT user_id FROM likes WHERE post_id='".$row['id']."'");
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
     $comm=mysqli_query($h,"SELECT * FROM comments WHERE post_id='".$row['id']."'");
   
   if(mysqli_num_rows($comm)>0){
     $k=0;
     $last_comm;
     $last_comm_name;
     while($row4=mysqli_fetch_assoc($comm)){
       $k++;
       $last_comm=$row4['comment'];
       
     //for profike
     $rr=mysqli_query($h,"SELECT name FROM user_info WHERE id='".$row4['user_id']."'");
  if(mysqli_num_rows($r2)>0)
   {
      $roww=mysqli_fetch_assoc($rr);
      $last_comm_name=$roww['name'];
      
   }
   //end profile
   


     }
   $row['comm']=$k;
   $row['last_comm']=$last_comm;
  $row['last_comm_name']=$last_comm_name;
   }else{
     $row['comm']=0; 
     $row['last_comm']="";
     $row['last_comm_name']="";
    }
   
     //comments


    // end 
     
     $output[]=$row;
   }
} else{
  $output[] = ["status"=>false];
}




echo json_encode($output,JSON_PRETTY_PRINT);

mysqli_close($h);
}
?>