






<?php
$data=json_decode(file_get_contents("php://input"));
$id=$data->id;
$myid=$data->myid;
$start=$data->start;
$limit=12;




$output = array();
$posts=array();

if(isset($start))
{


require 'config.php';
if($start==0)
{
$q = "SELECT * FROM user_info WHERE id='$id'";
$r = mysqli_query($h, $q);
if (mysqli_num_rows($r) > 0) {
  $row = mysqli_fetch_assoc($r);
     $follow=mysqli_query($h,"SELECT * FROM follow WHERE f_to='$id' OR f_from='$id'");
   if(mysqli_num_rows($follow)>0){
      $follower=0;
      $following=0;
      $followed=false; while($row5=mysqli_fetch_assoc($follow)){
        if($row5['f_to']==$id)
         {
          $follower++;
         }
        else
         {
           $following++;
         }
     if($row5['f_from']==$myid)
      {
        $followed=true;
      }
  }
   $row['follower']=$follower;
   $row['following']=$following;
   $row['followed']=$followed;
    }else{
       $row['follower']=0;
       $row['following']=0;
       $row['followed']=false;
     }
   
     $output[0]=$row;
} else{
  $output["id"]="undefined";
  $output['name']="undefined";
}
//if start 0 closes
}else{
$output[0]=[];
}
//closes
$qq="SELECT * FROM post WHERE user_id='$id' ORDER BY date_time DESC LIMIT {$limit} OFFSET {$start}";
$rr=mysqli_query($h,$qq);
if(mysqli_num_rows($rr)>0){
  while($row1=mysqli_fetch_assoc($rr)){
    $posts[]=$row1;
  }
}else{

$posts[]=['status'=>false];
}

$output[1]=$posts;

echo json_encode($output,JSON_PRETTY_PRINT);

mysqli_close($h);
}
?>
