










<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$data=json_decode(file_get_contents("php://input"));

$myid=$data->myid;


$limit=25;
require 'config.php';

 $q="SELECT user_id,post_id,comment,date_time FROM comments WHERE poster_id='$myid' AND user_id!='$myid' LIMIT {$limit}";

$r=mysqli_query($h,$q);

if(mysqli_num_rows($r)>0){
  while($row=mysqli_fetch_assoc($r)){
     $user=user($h,$row['user_id']);
     $row['name']=$user['name'];
     $row['image']=$user['image'];
     $output[]=$row;
   }

}else{
 //no commeny
}

$qq="SELECT user_id,post_id,date_time FROM likes WHERE poster_id='$myid' AND user_id!='$myid' LIMIT {$limit}	";

$rr=mysqli_query($h,$qq);

if(mysqli_num_rows($rr)>0){
  while($roww=mysqli_fetch_assoc($rr)){
    $user=user($h,$roww['user_id']);
     $roww['name']=$user['name'];
     $roww['image']=$user['image'];
    $output[]=$roww;
  }
}else{
//no likes
}



//follow
 $qf=mysqli_query($h,"SELECT f_from,date_time FROM follow WHERE f_to='$myid' LIMIT {$limit}");
if(mysqli_num_rows($qf)>0){
 while($frow=mysqli_fetch_assoc($qf)){
   $user=user($h,$frow['f_from']);
    $frow['name']=$user['name'];
    $frow['user_id']=$frow['f_from'];
    $frow['image']=$user['image'];
    $output[]=$frow;
  }
}else{
//no follower
}
//end

function user($h,$id){
  $r=mysqli_query($h,"SELECT name,image FROM user_info WHERE id='$id'");
 if(mysqli_num_rows($r)>0){
   return mysqli_fetch_assoc($r);
   
 }
 return ["name"=>'',"image"=>''];
}

function cmp($a, $b) 
{ 
  if ($a['date_time'] == $b['date_time'])
    {
      return 0; 
    }  
  return ($a['date_time'] > $b['date_time']) ? -1 : 1; 

 } 

usort($output, 'cmp');

//echo '<pre>';
//print_r($output);

echo json_encode($output); 
//echo '</pre>';
 ?>