       
<?php
$_POST['limit']=10;
$_POST['start']=0;
$sub=$_POST['sub'];
if(isset($_POST['limit']) && isset($_POST['start']))
  {

include('config.php');
  $r=mysqli_query($h,"SELECT DISTINCT subject FROM filepdf WHERE subject LIKE '%{$sub}%' ORDER BY date_time DESC LIMIT {$_POST['limit']} OFFSET {$_POST['start']}");
  if(mysqli_num_rows($r)>0)
   {
     while($row=mysqli_fetch_assoc($r))
      {
         echo  '<div class="find">
       <table width="100%">
                 <tr class="">
                    <td>    
                   <a style="color: dodgerblue; text-decoration:none" href="/home/subject.php?sub='.$row['subject'].'" ><div style="width:100%;overflow:hidden">&nbsp
                        '.$row['subject'].'
                    </div></a>
                    </td>
                </tr>

            </table>
        </div>';
     //  echo '<a href="/home/subject.php?sub='.$row['subject'].'" class="find" onclick="loadingUrl()"><div class="findDiv">'.$row['subject'].'</a></div>';
      }
     
   }
   else {
        echo '';
   }
}
mysqli_close($h);
?>