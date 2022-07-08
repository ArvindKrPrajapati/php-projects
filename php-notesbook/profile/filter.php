<?php
 include('config.php');
 $id=$_POST['id'];
 $j=4;
$r=mysqli_query($h,"SELECT DISTINCT subject FROM filepdf WHERE userid='$id' ORDER BY date_time DESC");
 if(mysqli_num_rows($r)>0)
  { $i=0;
         echo'<button onclick="allBook()">All</button>';
    while($row=mysqli_fetch_assoc($r))
    {
        $i++;
       // echo $i;
        $subject=$row['subject'];

        echo '<button onclick="filter('.$i.')" id="filter_'.$i.'">'.$subject.'</button><br>';
    }
  }else{
      echo 'nothing found';
  }
  mysqli_close($h);
?>