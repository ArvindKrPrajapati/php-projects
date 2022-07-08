<?php 
 session_start();
 if(!isset($_SESSION['userid']))
  {
      echo '<script>window.location="/"</script>';
  }

?>


 
<!DOCTYPE html>
<html>
    <head>
  <meta charset="utf-8" />
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <style>
  html{
      height:100%;
  }
         
  body{
      font-family: Sans-Serif;
      margin:0px;
      font-family: sans-serif;
       background:linear-gradient(50deg,rgba(0,0,30),darkblue,rgba(0,0,40));
   }
            
  #main{
      position:fixed;
      height:100%;
      width:100%;
      overflow:scroll;
      z-index:1;
  }
  #searchDiv{
      width:100%;
      padding:10px;
     box-sizing: border-box;
     
     
  }
  
  #searchBox{
      font-size:14px;
    width:75%;  
    height:38px;
    padding:8px;
    padding-left:15px;
    padding-bottom:11px;
    border-radius:20px 0px 0px 20px;
  }
  #searchBtn{
      height:39px;
      width:40px;
      font-size:19px;
      border-radius:0px 20px 20px 0px;
      border:none;
      margin-left:-3px;
      background: dodgerblue;
    
  }
  #searchBtn i{
      color:white;
      display:block;
      margin-top:-4px;
  }
input,button:focus{
       outline: none;
   }
   
  #result{
     position:fixed;
     top:60px;
     display:none;
     z-index:19;
      width:100%;
      height:100%;
      background:gainsboro;
  }
  
  
  
  
 .pdf{
     background:white;
     margin:15px;
     margin-left: 22px;
     margin-right: 22px;
     padding:10px;
     border-radius:10px;
 }
 .pdf-name{
     background:rgba(0,0,0,0.1);
     overflow:hidden;
 }
 
 .subject{
     font-size:21px;
     font-weight:bold;
     margin-bottom:0px;
     margin-top:5px;
 }
 .mess{
     font-weight:normal;
     font-size:14px;
     margin-bottom:14px;
    
 }
 .std{
     background:tan;
     padding:2px;
     padding-left:6px;
     border:1px solid gold;
     border-radius:0px 30px 30px 0px;
     margin-right:20%;
     margin-bottom: 0px;
     margin-top:0px;
 }
 
 .by{
   font-size:12px;
   font-family: 'Sofia', cursive;
 }
 
 .find{
    
     background:white;
     margin:7px;
     margin-left: 12px;
     margin-right: 12px;
     padding:10px;
     border-radius:10px;
 }
 .searchText,.searchIcon{
     padding:13px;
     width:100%;
     margin:1px 0px 1px 0px;
 }
 
 .searchText{
     margin-left:-20px;
 }
 #option{
     display: none;
     box-sizing:border-box;
     margin-left:70%;
     background:white;
     padding:5px;
     width:30%;
 }
  
  #option button{
      font-size:13px;
      width:100%;
      background:white;
      border:none;
      
  }
  #toggle i{
     font-size:25px;
  }
      
  </style>
  </head>
 <body>
     
     <div id="main">
<br>
      <center>
         <div id="searchDiv">
          <form action="subject.php" method="get">
          <input type="text" id="searchBox" name="sub" placeholder="&#xF002; search subject" required/>
          
          <button id="searchBtn"><i class="fa fa-search"></i></button>
          </form>
          </div>
     </center>
     

     <table width="100%">
         <tr>
             <td>
      <b style="margin-left:7%;color:white"><i class="fa fa-search"></i> &nbsp;your search result</b>
             </td>
             <td width="40px" style="color:white">
                 <center>
                <div id="toggle">
                    <i class="fa fa-angle-down"></i>
                </div>
                </center>
             </td>
         </tr>
         <tr>
             <td colspan="2" >
                 <div id="option">
                   <center>

                 <button class="btn">
                     people
                 </button>
                 </center>
                 </div>
             </td>
         </tr>
     </table>


       <br>

     <div id="result" onclick="BlurGone()">
         <table width="100%">
             <tr>
                 <td width="40px">
         <div class="searchIcon"></div>
                 </td>
                 <td>
<div class="searchText"></div>
                 </td>
             </tr>
         </table>
      <div id="find"></div>
     </div>
       
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
 if($i==10)
  {
  ?>
  <center>
  <div id="prev" class="btn bg-white">
      << prev
  </div>
  <div id="next" class="btn bg-white">
      next >>
  </div>
  </center>

  <?php
  }

?>


  <div  id="getSub" style="visibility:hidden"><?php echo $_GET['sub']; ?></div>
     </div>
 </body>
</html>

<script>

    $("#searchBox").click(function(){
     $("#searchDiv").css({"position":"fixed","top":"0px","background":"darkblue","zIndex":"20"});
    $("#result").show();
   
    });
    
function BlurGone(){
      $("#searchDiv").css({"position":"relative","background":"inherit"});
     $("#result,#find").hide();
    }
    
$("#searchBox").keyup(function(event) {
  let text = $(this).val();
  $(".searchIcon").html('<i class="fa fa-search"></i>');
  $(".searchText").html('<a href="/home/subject.php?sub='+text+'" style="text-decoration:none" onclick="loading()"><div class="find">'+text+'</div></a>');
  $.ajax({
     url:"findAjax.php",
     type:"post",
     data:{sub:text},
     success:function(data){
         $("#find").html(data);
     }
  });
});
$(document).ready(function(){
 let a=$("#getSub").text();
 $("#searchBox").val(a);
});

 $("#toggle").click(function(){
   $("#option").toggle("slide");
 });
 
 $("#option button").click(function(){
     var c=location.search.split('sub=')[1];
     window.location.href="/home/people.php?sub="+c;
 });
 

      
    $("#main").scroll(function(){
      let a=$("#main").scrollTop();
      if(a>80)
      {
         $("#searchDiv").css({"position":"fixed","top":"0px","background":"darkblue"});
      }
      else
      {
$("#searchDiv").css({"position":"relative","background":"inherit"});
      }
      
    });
    

</script>