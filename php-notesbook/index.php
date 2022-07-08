<?php 
 session_start();
  $_SESSION['username']=$_COOKIE['username'];
  $_SESSION['userid']=$_COOKIE['userid'];
  $_SESSION['image']=$_COOKIE['image'];
 if(isset($_SESSION['userid']))
  {
      echo '<script>window.location="/home/"</script>';
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

        <title>NotesBook</title>
        <style>
		  html,body{
		  height:100%;
          margin:0px;
		  }
          .main{
            position:fixed;
            height:100%;
            width:100%;
		           overflow:scroll;
              font-family: sans-serif;
               background:linear-gradient(50deg,rgba(0,0,30),darkblue,rgba(0,0,40));
          }
            #mobile,#pass,.name,.mobile,.pass{
                width:88%;
                height:30px;
                margin:5px;
                padding-left:5px;
            }
           #btn,#signup{
		     width:90.5%;
			 height:32px;
			 margin:5px;
			 }
            #mobile,#pass,#btn,.bottom,.name,.mobile,.pass:focus{
                outline:none;
            }
            .container,.signup{
               position:absolute;
               left:7%;
               top:100%;
               background:rgba(252,252,252);
               width:86%;
               border-radius:13px;
               padding:20px;
               display:none;
               box-sizing:border-box;
               margin-top:20px;
            }
            
           .container{
               display:block;
           }
       .text{
         font-size:30px;
         font-weight:bold;
         color:tan;
         margin-top:10px;
         margin-bottom:20px;
     }
     .text span{
         background:tomato;
         border-radius:6px;
     }
     
  .loader {
      display:none;
  border: 3px solid rgba(0,0,230,0.1);
  border-radius: 50%;
  border-top: 3px solid grey;
  width: 20px;
  height: 20px;
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

 .error p,.error1 p{
     color:red;
     font-size:10px;
     margin-top:0px;
     margin-left:15px;
     
 }
  
.bottom{
  position:fixed;
  bottom:0px;
  width:100%; 
  background:white;
  border:none;
  padding:17px;
  background:inherit;
border-top:1px solid grey;
 color:white;
}
  
 </style>
    </head>
    <body>
<div class="main">
       <div class="container">
         <center>
             <div class="text">
                 Notes<span style="padding:2px 10px 2px 7px;color:white">Book</span>
              </div>
             </center>
             <div class="error1"></div>
            <center>
             <input type="number" placeholder="Mobile" id="mobile"/>
             <br>
             <input type="password" placeholder="Password" id="pass"/>
             <br>
            </center>
              <div class="error"></div>
            <center>
             <button id="btn">Login</button>
             <div class="loader">
                
             </div>
             
         </center>
         <br><br>
       </div>
    
     <!--signup-->
     
     
     <div class="signup">
       <center>
           <h3>sign Up</h3>
           </center>
             <div class="error1"></div>
           <center>
           <input type="text" placeholder="Your sweet Name" class="name"/>
           <br>
           <input type="number" placeholder="Mobile Number" class="mobile"/>
           <br>
           <input type="password" placeholder="create password" class="pass"/>
           <br>
            </center>
              <div class="error"></div>
            <center>
           <button id="signup">signup</button>
             <div class="loader">
                
             </div>
           <br><br>
       </center>
     </div>
<button class="bottom">Dont have Account? <strong>S I G N U P </strong></button>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script>
      $(document).ready(function(){
      //$(".container").fadeIn(1500);
     $(".container,.signup").animate({top:100},1500);
    });

  $(".bottom").click(function(){
   
      $(".signup").fadeToggle(300);
      $(".container").fadeToggle(300);
    if($(this).text()=="L O G I N")
 {
   
  $(this).text("Dont have Account? S I G N U P");
 }
else
 {
  $(this).text("L O G I N");
 }

   });


			$("#btn").click(function(){
			 var mobile=$("#mobile").val();
			 var pass=$("#pass").val();
 if(mobile=="" || pass=="")
	 {
	     $(".error").html("<p>*credentials required</p>");
	 }
	else
	{
	     	 $.ajax({
			 url:"userLogin.php",
			 type:"POST",
			 data:{mobile:mobile,pass:pass},
			 beforeSend:function()
			 {
			     $("#btn").hide();
			     $(".loader").show();
			 },
			 complete:function()
			 {
			     $("#btn").show();
			     $(".loader").hide();
			 },
			 success:function(data)
			  {
			      if(data)
			      {
			      window.location.href="/home/";
			      }
			      else
			      {
			          $(".error1").html("<p>wrong login credentials</p>");
			      }
			  }
			 });
	 }
			});
			
			//signup
   $("#signup").click(function(){
       var name=$(".name").val();
       var m=$(".mobile").val();
       var p=$(".pass").val();
       if(name=="" || m=="" || p=="")
        {
           $(".error").html("<p>*fill all boxes</p>");
        }
       else
        {
       
	     	 $.ajax({
			 url:"userSignup.php",
			 type:"POST",
			 data:{name:name,mobile:m,pass:p},
			 beforeSend:function()
			 {
			     $("#signup").hide();
			     $(".loader").show();
			 },
			 complete:function()
			 {
			     $("#signup").show();
			     $(".loader").hide();
			 },
			 success:function(data)
			  {
			 
			     if(data)
			      {
			      window.location.href="/home/";
			      }
			      else
			      {
			    $(".error1").html("<p>Mobile Number Already registered</p>");
			      }
			  }
			 });
        }
   });
			
        </script>
    </body>
</html>