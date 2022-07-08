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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
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
.pdf b{
     color:black;
     font-size:24px;
   font-family: 'Sofia', cursive;
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
    width:75%;  
    height:20px;
    padding:8px;
    padding-left:15px;
    
    border-radius:20px 0px 0px 20px;
  }
  #searchBtn{
      height:40px;
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
     padding:15px;
     border-radius:10px;
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
          <form action="people.php" method="get">
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
                     subject
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
  $r=mysqli_query($h,"SELECT * FROM user WHERE name='$sub' ORDER BY date_time DESC LIMIT {$_POST['limit']} OFFSET {$_POST['start']}");
  if(mysqli_num_rows($r)>0)
   {
     while($row=mysqli_fetch_assoc($r))
      {
      
      
  echo ' <a href="/profile?id='.$row['id'].'" style="text-decoration:none"><div class="pdf">
       <table width="100%">
           <tr>
               <td>
                   <img src="/profile/image/'.$row['image'].'" width="60px" height="60px" style="border-radius:50%"/>
               </td>
               <td>
                   <b>'.$row['name'].'</b>
               </td>
           </tr>
       </table>
    </div></a>';  
      
         
      }
     
   }
   else {
        echo '<br><br><center><p style="color:tomato">Nothing found </p></center>';
   }
}
mysqli_close($h);
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
     window.location.href="/home/subject.php?sub="+c;
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