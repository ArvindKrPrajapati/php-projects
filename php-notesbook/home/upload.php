<?php

session_start();
include('config.php');

  $subject=$_POST['subject'];
  $sem=$_POST['sem'];
  $message=$_POST['message'];
  $file=$_POST['file'];
  $myId=$_SESSION['userid'];
  $myName=$_SESSION['username'];
  $r=mysqli_query($h,"INSERT INTO filepdf(userid,username,subject,sem,message,file)VALUES('$myId','$myName','$subject','$sem','$message','$file')");
  if($r)
  {
      echo  '<p style="color:green;  font-size:13px; margin-left:6%;">file uploaded </p>
        <div class="pdf" style="background:gold">
       <table width="100%">
                <tr>
                    <td colspan="3" >
                        <p class="subject">'.$subject.'</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="std">'.$sem.'</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="mess">'.$message.'
                        </p>
                    </td>
                </tr>
                
                
                <tr class="pdf-name">
                    <td width="40px">
                       <center>
                <i id="iconSize" class="fa fa-file-pdf-o"></i>
                       </center>
                    </td>
                    <td>                        <a style="color: dodgerblue; text-decoration:none" href="https://drive.google.com/viewerng/viewer?embedded=true&url=http://notesbook.epizy.com/home/upload/'.$file.'" onclick="loading()"><div style="width:200px; overflow:hidden">&nbsp
                        '.$file.'
                    </div></a></td>
                    <td width="30px">
                        <center>
                       <a style="color:black"href="/home/upload/'.$file.'">
                        <i style="font-size:23px; margin:3px" class="fa fa-download"></i></a>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="by">By '.$_SESSION['username'].'</p>
                    </td>
                </tr>
            </table>
        </div>';
  }
  else {
      echo false;
  }
  
  mysqli_close($h);
  
 ?>
