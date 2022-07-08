<?php
  $_POST['limit']=10;
   $_POST['start']=0;
$sub=$_GET['sub'];
if(isset($_POST['limit']) && isset($_POST['start']))
  {

include('config.php');
  $r=mysqli_query($h,"SELECT * FROM filepdf WHERE subject='$sub' ORDER BY date_time DESC LIMIT {$_POST['limit']} OFFSET {$_POST['start']}");
  if(mysqli_num_rows($r)>0)
   {$i=0;
     while($row=mysqli_fetch_assoc($r))
      {
        $i++;
         echo  '<div class="pdf">
       <table width="100%">
                <tr>
                    <td colspan="3" >
                        <p class="subject">'.$row['subject'].'</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="std">'.$row['sem'].'</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="mess">'.$row['message'].'
                        </p>
                    </td>
                </tr>
                
                
                <tr class="pdf-name">
                    <td width="40px">
                       <center>
                <i id="iconSize" class="fa fa-file-pdf-o"></i>
                       </center>
                    </td>
                    <td>    
                   <a style="color: dodgerblue; text-decoration:none" href="https://drive.google.com/viewerng/viewer?embedded=true&url=http://notesbook.epizy.com/home/upload/'.$row['file'].'" onclick="loading()"  download><div style="width:200px;overflow:hidden">&nbsp
                        '.$row['file'].'
                    </div></a>
                    </td>
                    <td width="30px">
                        <center>
                       <a style="color:black"href="/home/upload/'.$row['file'].'">
                        <i style="font-size:23px; margin:3px" class="fa fa-download"></i></a>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" >
                        <p class="by">By '.$row['username'].'</p>
                    </td>
                </tr>
            </table>
        </div>';
      }
     
   }
   else {
        echo '<br><br><center><p style="color:tomato">Nothing found </p></center>';
   }
}
     
mysqli_close($h);


?>
