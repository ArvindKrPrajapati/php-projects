<?php
session_start();
include('config.php');

  $mobile=$_POST['mobile'];
  $pass=$_POST['pass'];
  $r=mysqli_query($h,"SELECT * FROM user WHERE login='$mobile' AND password='$pass'");
      if(mysqli_num_rows($r)>0)
       {
         $row=mysqli_fetch_assoc($r);
         $_SESSION['username']=$row['name'];
         $_SESSION['userid']=$row['id'];
         $_SESSION['image']=$row['image'];
         setcookie('userid',$row['id'],time()+(10*365*24*60*60),'/');
         setcookie('username',$row['name'],time()+(10*365*24*60*60),'/');
         setcookie('image',$row['image'],time()+(10*365*24*60*60),'/');
      setcookie('room','block',time()+(10*365*24*60*60),'/');
         echo true;
       }
       else {
           echo false;
       }
      mysqli_close($h);
 ?>
