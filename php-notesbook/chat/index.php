<?php 
 session_start();
 if(!isset($_SESSION['userid']))
  {
      echo '<script>window.location="/"</script>';
  }

setcookie('room','none',time()+(10*365*24*60*60),'/');
setcookie('alert','none',time()+(10*365*24*60*60),'/');
$room=$_COOKIE['room'];

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
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpidensitydpi=device-dpi" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sofia&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!---firebase--->
     
       <script src="https://www.gstatic.com/firebasejs/8.2.10/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.2.10/firebase-database.js"></script>
     
      <script src="https://www.gstatic.com/firebasejs/8.2.10/firebase-analytics.js"></script>
     <!----end--->
    
        <title>NotesBook | Home</title>
        <style>
		  html{
		  height:100%;
		  }
          body{
              margin:0px;
              font-family: sans-serif;

          }
          
  .loader {
      display:block;
  border: 3px solid rgba(0,0,230,0.1);
  border-radius: 50%;
  border-top: 3px solid dodgerblue;
  width: 40px;
  height: 40px;
  position:fixed;
  top:45%;
  left:45%;
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

          
    #main{
      position:fixed;
      height:100%;
      width:100%;
      overflow:scroll;
      z-index:1;
  }
  
   #alert{
       display:block;
        position:fixed;
        top:50%;
        left:10%;
        margin-top:-98px;
    	border-radius:18px;
    	width:80%;
        height:175px;
        background:white;
        border:1px solid gainsboro;
        box-shadow:2px 2px 20px gainsboro;
       
   
   }
  .alert-top{
      display:<?php echo $room ?>;
      position:fixed;
      width:100%;
      height:100%;
      background:rgba(0,0,0,0.9);
      z-index:50;
  }
  #room{
      width:80%;
  }
   #goHome{
       font-size:23px;
   }
   
 #header b{
     color:white;
     font-size:22px;
   font-family: 'Sofia', cursive;
 }
 
  #header{
      padding:10px;
      background:darkblue;
     width:100%;
     position:fixed;
     z-index:10;
   }
 
 #footer{
     padding:4px;
     position: fixed;
     bottom: 0px;
     z-index:20;
     background:rgba(240,240,240);
     border-top: 1px solid rgba(220,220,220);
     
 }
  #mess{
      height:40px;
  }
  #you{
      clear:both;
      background:white;
      padding:10px;
      margin:2px;
      margin-left:10px;
      max-width:70%;
      font-size:14px;
      display:inline-block;
      border-radius:15px 15px 0px 15px;
      border:1px solid rgba(0,0,0,0.2);
  }
  #me{
      float: right;
      clear:both;
      margin-right:10px;
      display:inline-block;
      padding:10px;
      max-width:70%;
      font-size:14px;
      border-radius:0px 15px 15px 15px;
      
      
  }
 #typing{
     font-size:10px;
 }
 
 #seen{
     float:right;
     font-size:10px;
     margin-right:13px;
     font-weight:bold;
     color:darkgreen;
 }
 </style>
        </style>
     </head>
     <body>
      <div class="loader"></div> 
         
         
      <div class="alert-top">
        <div id="alert">
          <div>
         	<center>
         	<br>
        	 <h3>Chat Room Name</h3>
            <input type="text" placeholder="Enter Room code" class="form-control" id="room"/>
          <button class="btn btn-primary mt-2" id="roomBtn">Enter Room<tbutton>
             </center>
           </div>
        </div>
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
                  <b>CSEians 2k19</b>
              </td>
              <td>
                  <div id="typing" class="text-white"></div>
              </td>
          </tr>
      </table>

  </div>
         
         
         <div id="main">
            <br><br><br>
            <div class="alert alert-success ml-3 mr-3 mt-1">
                welcome to CSEians 2k19 chatroom. share chatroom id <strong>(CSE)</strong> with Notesbook user to join the Room
            </div>
            <table width="100%" id="messBox">

            </table>
                <div id="seen">
                    
                </div>

          <br><br>  <br> 
         </div>
         
         <div id="footer">
            <table width="100%">
                <tr>
                    <td width="100%">
             <textarea id="mess" placeholder="Enter message.." class="form-control"></textarea>
                    </td>
                    <td width="40px">
                        <button id="send" class="btn btn-success">
                            send
                        </button>
                    </td>
                </tr>
            </table>
         </div>
     </body>
  </html>
  
  <script>
  
      $("#roomBtn").click(function(){
         let room=$("#room").val();
         if(room.toUpperCase()=="CSE")
          {
              $(".alert-top").hide();
  
             $.ajax({
                  url:"room.php",
                  type:"POST",
                  success:function(data){ }
              });
          }
      });
      
      
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyACdsuP174xZDaqNjsJ-pUqqMhukmTGiqg",
    authDomain: "crazesome-3977d.firebaseapp.com",
    projectId: "crazesome-3977d",
    storageBucket: "crazesome-3977d.appspot.com",
    messagingSenderId: "817786845057",
    appId: "1:817786845057:web:61b0762df1d32bd21a9a80",
    measurementId: "G-YSHSCQ1PM3"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
  
   var database=firebase.database();
   var x=true;
   var id='<?php echo $_SESSION['userid']; ?>';
   $("#send").click(function(){
     let mess=$("#mess").val();
     
     let name='<?php echo $_SESSION['username']; ?>';
     
     if(mess=="")
      {
          $("#mess").focus();
      }else{
          x=true;
          $("#mess").val("");
          database.ref("chat").push().set({
             "id":id,
             "name":name,
            "mess":mess
          });
          
          database.ref("messageStatus").set({
             id:id,
             status:"sent",

             
          });
      }
   });

   //recieve mess
    database.ref("chat").on("child_added",function(snap){
       
        $(".loader").hide();
        
        if(x)
        {
         x=false;
        $("#main").animate({ scrollTop: 9999});
        
        }
    
   //alert(x);
       if(snap.val().id==id)
        {
        $("#messBox").append('<tr><td><div id="me" class="alert-primary mt-1"><strong>'+snap.val().name+'</strong><br>'+snap.val().mess+'</div></td></tr><br>'); 
        $("#seen").show();
        
        }else{
      $("#messBox").append('<tr><td><div id="you"><strong>'+snap.val().name+'</strong><br>'+snap.val().mess+'</div></td></tr><br>'); 
        $("#seen").hide();
        }
        
    
    });
    //show message status seen/sent
   var mSeen=database.ref("messageStatus");
    mSeen.on("value",function(snap){
      if(snap.val().id!=id)
      {
          mSeen.set({
              id:id,
              status:"seen"

          });
      }
    });
    
    
    
    var st=database.ref("status");
   // show typing
   $("#mess").focus(function(){
   //  $("#typing").html('typing');
    let nam2='<?php echo $_SESSION['username']; ?>';
    let nam=nam2.split(" ")[0];
     st.set({
      typingId:id,
      typingStatus:nam+" is typing...."
     });
   });
   $("#mess").blur(function(){
     st.set({
      typingStatus:"" 
     });
   });
   st.on("value",function(snap){
      if(snap.val().typingId==id)
       {
          $("#typing").html('you are typing...');
       }else{
           $("#typing").html(snap.val().typingStatus);
       }
        
       
   });
   
database.ref("messageStatus").on("value",function(snap){
       $("#seen").html(snap.val().status);

   });
  </script>
