<?php
session_start();
include('config.php');

  $mobile=$_POST['mobile'];
  $pass=$_POST['pass'];
  $name=$_POST['name'];
  $image="default.png";
  $r=mysqli_query($h,"INSERT INTO user(name,login,password,image)VALUES('$name','$mobile','$pass','$image')");
      if($r)
       {
      $r1=mysqli_query($h,"SELECT id FROM user WHERE login='$mobile' AND password='$pass'");
       $row=mysqli_fetch_assoc($r1);
         $_SESSION['username']=$name;
         $_SESSION['userid']=$row['id'];
         $_SESSION['image']=$image;
        setcookie('userid',$row['id'],time()+(10*365*24*60*60),'/');
         setcookie('username',$name,time()+(10*365*24*60*60),'/');
         setcookie('image',$image,time()+(10*365*24*60*60),'/');
         echo true;
       }
       else {
           echo false;
       }
      mysqli_close($h);
 ?>
