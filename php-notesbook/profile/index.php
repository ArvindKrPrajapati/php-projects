<?php 

 session_start();
 if(!isset($_SESSION['userid']) || $_GET['id']=="")
  {
      echo '<script>window.location="/"</script>';
  }
  
 setcookie('alert','none',time()+(10*365*24*60*60),'/');
  
  
  $myid=$_GET['id'];
  include('config.php');
 $r= mysqli_query($h,"SELECT * FROM user WHERE id='$myid'");
  if(mysqli_num_rows($r)>0);
   {
       $row=mysqli_fetch_assoc($r);
       $name=$row['name'];
       $image=$row['image'];
   }
   $editBtn="none";
   if($_GET['id']==$_SESSION['userid'])
    {
        $editBtn="block";
    }
?>
<!DOCTYPE html>
<html>
    <head>
<meta name="google-site-verification" content="0TX4ZuoLv1BNO9i3jGjnrzISblkZ4xe61BUQUQl44SQ" />
<link rel="icon" type="image/png" href="/favicon.ico"> 

<meta name="description" content="want to study fast but dont have study materials. Not to worry there are a lot of people out there who share their notes with you through NotesBook Register yourself and score good marks">
<meta name="keywords" content="NotesBook,notebook,notesbook, engineering notes,notes for exam, science notes,data structure notes,java notes,maths notes,notesbook app,notes app,study materials app" />


<meta ="og:site_name" content="NotesBook" />

<meta property="og:url" content="http://notesbook.epizy.com" />

<meta property="og:description" content="Download All the required study material and notes">

<meta property="og:image" content="http://notesbook.epizy.com/favicon.ico"/>

<meta property="og:type" content="website" />


  <meta charset="utf-8" />
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <title><?php echo $name; ?></title>
   <style>
		  html{
		  height:100%;
		  }
          body{
              margin:0px;
              font-family: sans-serif;
               background:linear-gradient(50deg,rgba(0,0,30),darkblue,rgba(0,0,40));
               position:fixed;
               width:100%;
               height:100%;
               overflow:scroll;
          }
          
 .loader{
      display:none;
  border: 3px solid rgba(0,0,230,0.1);
  border-radius: 50%;
  border-top: 3px solid grey;
  width: 40px;
  height: 40px;
  position:fixed;
  left:45%;
  top:45%;
  -webkit-animation: spin 1.2s linear infinite; /* Safari */
  animation: spin 1.2s linear infinite;
}


/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}


  
 #pro{
     background:white;
     margin-top:20px;
     border-radius:50%;
     border:1px solid white;
 }
 
b{
     color:white;
     font-size:30px;
   font-family: 'Sofia', cursive;
 }
 hr{
     width:88%;
 }
 
  #main{
      position:fixed;
      height:100%;
      width:100%;
      overflow:scroll;
      z-index:1;
  }
 /*useless*/
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

 /*end*/
 #header b{
     font-size:22px;
 }
 
  #header{
      padding:10px;
      background:darkblue;
     width:100%;
     display:none;
     position:fixed;
     z-index:10;
   }
   #mess{
       color:white;
   }
   
   #change{
       box-sizing:border-box;
       padding:20px;
       overflow:scroll;
       width:100%;
       height:100%;
       background:black;
       display:none;
       position:fixed;
       z-index: 20;
   }
   #myPic{
       background:white;
       margin-top:60px;
       width:100%;
       height:100%px;
   }
   #back{
       position:fixed;
       width:60px;
       margin-left:-20px;
       padding-left:20px;
       color:white;
       Font-size: 30px;
   }
   #edit{
       display:<?php echo $editBtn ?>;
       font-size:30px;
       color:white;
       padding-left:100%;
       margin-top:10px;
   }
   #edit i{
     margin-left:-40px;  
   }
   
   #save{
       display:none;
   }
   #goHome{
       font-size:23px;
   }
   .filter{
       color:white;
   }

  #filterBox{
      color:white;
  }
  #filterBox button{
     width:70%;
     background:white;
     padding:4px;
  }
  
  summary:focus{
      outline: none;
  }
 </style>
   </head>
   <body>
       


    <div id="main">

  <div id="names">
        <center>
     <img src="/profile/image/<?php echo $image; ?>" width="100px" height="100px" id="pro"/>
     <br>
     <b><?php echo $name ?></b>
      <div style="color:white">id: <?php echo $_GET['id']; ?></div>
        <div class="filter">
        <i class="fa fa-angle-down"></i>
           <span>
             filter subject  
           </span> 
            
      </div>
         <div id="filterBox"></div>
        </center>
        <hr>
    </div>
       <div class="loader"></div>

     <div id="post"> </div>
     <div id="mess"></div>
     <div id="messs"></div>
   </div>
  <div id="header">
      <table width="100%">
          <tr>
              <td width="36px">
                  <a href="/home/" class="text-white">
                      <div id="goHome">
              <i class="fa fa-arrow-left"></i>
                      </div>
                  </a>

              </td>
              <td>
                  <b><?php echo $name ?></b>
              </td>
          </tr>
      </table>

  </div>
  
  
  <!--for change &show dp!-->
  <div id="change">
    <div id="back"><i class="fa fa-arrow-left"></i></div>
   <!-- <img src="/download/mylogo.png" id="myPic"/>  -->
   <div id="pic">
      <img id="myPic" src="/profile/image/<?php echo $image; ?>" alt="your image" />
   </div>


    <div id="edit">
   <label>
   <i class="fa fa-pencil-square-o"></i>
     <input type="file" style="display: none;" name="file" id="imgInp" accept="image/*"> </label> 
      </div>
      <button class="btn bg-white text-black btn-block fixed-bottom" id="save">save</button>
       <div id="upMess"></div>
  </div>
   </body>
  </html>
  
  
  <script>
  var sub="";
  function filter(id)
   {
      sub=$("#filter_"+id).html();
     $("#post,#filterBox").html('');
     load_data(5,0,sub);
   }
   
var c=location.search.split('id=')[1];
  
  //function loadAllData(sub){
    
    var limit=5;
    var start=0;
    
    var action='inactive';
    function load_data(limit,start,sub)
    {
      $.ajax({
			 url:"select.php",
			 type:"POST",
			 data:{limit:limit,start:start,id:c,subject:sub},
			 beforeSend:function()
			 {
			     $(".loader").show();
              $("#mess").html('<center>Loading....</center>');
			 },
			 complete:function()
			 {
			     $(".loader").hide();
                $("#mess").html('');
			 },
			 success:function(data)
			  {
			 $("#post").append(data);
            if(data=="")
            {
          // alert('hello');
 $("#messs").html("<div style='color:white'><center>No More data<br><br><centerr></div><br><br>");
             action='active';
            
            }
            else
            {
 
               $("#mess").html("<center><h5 style='color:white'>Loading...<br></h5></center>");
             action='inactive';
            }
			  }
			 });
          }
    
if(action="inactive")
    {
    action="active";
    
    load_data(limit,start,sub);
    }
  
    $("#main").scroll(function(){
       headerShow();
      if($("#main").scrollTop()+$("#main").height()>$("#post").height() && action=='inactive')
        {
           
           action='active';
           start=start+limit;
           load_data(limit,start,sub);
        }
   
    }); 
    
 // }
 // loadAllData("");
  

  function headerShow(){
    let a=$("#main").scrollTop();
      if(a>180)
      {
         $("#header").show();
      }
      else
      {
        $("#header").hide();
      }
  }  
    
    
    //change dp
    $("#pro").click(function(){
       
      $("#change").fadeIn();
    });
    
    $("#back").click(function (){
      $("#change").fadeOut(); 
    });
    
    
    
  function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#myPic').attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]); 
  }
}
    
   $("#imgInp").change(function() {
      readURL(this);
      $("#save").show();
   });
   
   $("#save").click(function (){
      var fd = new FormData(); 
      var files = $('#imgInp')[0].files[0]; 
     fd.append('file', files);
      $.ajax({
			 url:"upload.php",
			 type:"POST",
			 data:fd,
             contentType: false, 
             processData: false, 
		    beforeSend:function()
			 {
               $("#save").hide();
               $("#upMess").html('<center><p style="color:white">Uploading.....</p></center>');
			 },
			 complete:function()
			 {
		      $("#change").fadeOut();


			 },
			 success:function(data)
			  {
		      
               $("#upMess").html('');
                $('#pro').attr('src', data);
			       
			  }
			 });
   });
   
   
   
   
   //filtering subjects
   $(".filter").click(function(){
       let tt=$("#filterBox").html();
       if(tt=="")
        {
       $.ajax({
         url:"filter.php",
         type:"POST",
         data:{id:c},
         beforeSend:function(){
          $("#filterBox").html("loading..");
         },
         complete:function(){
               
         },
         success:function(data){
         
         $("#filterBox").html(data);
       
         }
         
       });
      }else{
           $("#filterBox").html("");
        }

   });
  function allBook(){
      $("#post,#filterBox").html("");
      sub="";
      limit=5;
      start=0;
if(action="inactive")
    {
    action="active";
    
    load_data(limit,start,sub);
    }
  
    $("#main").scroll(function(){
       headerShow();
      if($("#main").scrollTop()+$("#main").height()>$("#post").height() && action=='inactive')
        {
           
           action='active';
           start=start+limit;
           load_data(limit,start,sub);
        }
   
    }); 
  } 
  
  </script>