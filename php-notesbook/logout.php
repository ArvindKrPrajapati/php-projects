<?php
 session_start();
// print_r($_COOKIE);
setcookie('username','',time()-(10*365*24*60*60),'/');
  setcookie('userid','',time()-(10*365*24*60*60),'/');
setcookie('image','',time()-(10*365*24*60*60),'/');

setcookie('alert','',time()-(10*365*24*60*60),'/');
setcookie('room','',time()-(10*365*24*60*60),'/');
 session_destroy();
  header("location:/");
  die();
  
  
 ?>