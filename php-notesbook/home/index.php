
<?php 
 session_start();
 if(!isset($_SESSION['userid']))
  {
      echo '<script>window.location="/"</script>';
  }
// $alert=$_COOKIE['alert'];
$alert=none;

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
               background:linear-gradient(50deg,rgba(0,0,30),darkblue,rgba(0,0,40));
          }
            
     
  .loader,.loaderTop {
      display:none;
  border: 3px solid rgba(0,0,230,0.1);
  border-radius: 50%;
  border-top: 3px solid grey;
  width: 40px;
  height: 40px;
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

 b{
     color:white;
     font-size:30px;
   font-family: 'Sofia', cursive;
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
 
 .footer{
     border-top:2px solid white;
     position:fixed;
     z-index: 2;
     height:40px;
     width:100%;
     bottom:0px;
     background:#191970;
   } 
  .add{
      box-sizing:border-box;
      font-size:30px;
      padding-top:6px;
      color:white;
      position:fixed;
      z-index:3;
      bottom:5px;
      left:42.5%;
      width:15%;
      height:50px;
      border-radius:6px;
      background:#191970;
      border:3px solid white;
  }
   
   .adding{
       box-sizing: border-box;
       width:96%;
       height:78%;
       background:rgba(30,30,40);
       color:white;
       position:fixed;
       z-index:4;
       left:2%;
       border:1px solid orange;
       border-bottom: none;
       border-radius:30px 30px 0px 0px;
       bottom:0px;
       display:none;
   }
   
 .toAdd input{
       width:70%;
       margin:5px;
       padding:6px;
       border-radius:5px;
   }
   
   .toAdd textarea{
       margin-top:3px;
       width:73%;
       height:60px;
       border-radius:5px;
   }
   .toAdd button{
       margin-top:3px;
       width:70%;
       height:30px;
       border-radius:5px;
   }
   
   input,textarea,button:focus{
       outline: none;
   }
   




.loading,.xyz{
    position:fixed;
    left:45%;
    top:45%;
}

  #main{
      position:fixed;
      height:100%;
      width:100%;
      overflow:scroll;
      z-index:1;
  }
  
  #mess,#messs{
      color:white;
      margin-bottom:50px;
  }
  .error{
      color:red;
      font-size:12px;
      margin-left:50px;
  }
  
  #closeBtn{
      width:50px;
      height:50px;
      background:black;
      color:white;
      margin-top:20px;
      border-radius: 50%;
  }
  .freeze{
      position:fixed;
      height:100%;
      width:100%;
      background:rgba(0,0,0,0.3);
      z-index:6;
      display:none;
  }
  .xyz{
      display:block;
  }
  #iconSize{
      margin:4px;
      font-size:32px;
  }
  #searchDiv{
      width:100%;
      padding:10px;
     box-sizing: border-box;
     
     
  }
  
  #searchBox{
    width:75%;  
    height:40px;
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
  .toBeAdded{
      position:fixed;
      top:0px;
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
 
 #pro{
     background:white;
     border-radius:50%;
     border:1px solid white;
     position: absolute;
     top:14px;
   left:20px;
 }
 
   #alert{
       display:block;
        position:fixed;
        top:50%;
        left:10%;
        margin-top:-98px;
    	border-radius:18px;
    	width:80%;
        height:200px;
        background:white;
        border:1px solid gainsboro;
        box-shadow:2px 2px 20px gainsboro;
       
   
   }
  .alert-top{
      display:<?php echo $_COOKIE['alert'] ?>;
      position:fixed;
      width:100%;
      height:100%;
      background:rgba(0,0,0,0.7);
      z-index:50;
  }
  
  #chatIcon{
      display:none;
      background:red;
      width:9px;
      height: 9px;
      border-radius:50%;
      float:right;
  }
 </style>
    </head>
    <body>
      <div class="alert-top" style="display:<?php echo $alert; ?>">
        <div id="alert">
          <div>
         	<center>
         	<br>
        	 <h3>New Update 2</h3>
          <p class="ml-3 mr-3"> Now you can chat with NotesBook user who has the chat room id .Do you have ? if not ask to admin </p>
             
          <a href="/chat/"  class="btn btn-primary">ok lets chat</a>
             </center>
           </div>
        </div>
      </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
     
      <div class="freeze">
           <div class="loaderTop xyz"></div>
       </div>
       <div class="loader loading"></div>
      
       <div class="footer p-1 pr-3">
           <!--
           <a href="/chat/"  class="text-white">
              <i class="fa fa-comment" style="font-size:27px;float:right"></i>
           </a>-->
           <div id="chatIcon" class="text-white"></div>
       </div>
        <div class="add">
          <center>
           <div>+</div>
         </center>
       </div>

   <div id="main" ontouchstart="abc()">
     <a href="/profile?id=<?php echo $_SESSION['userid']; ?>" ><img src="/profile/image/<?php echo $_SESSION['image']; ?>" width="28px" height="28px" id="pro"/></a>
  <br><br><br>
  <center>
          <b>
           welcome <?php echo '<a href="/logout.php" style="color:white">'. $_SESSION['username'].'</a>'; ?>
          </b>  

         <div id="searchDiv">
          <form action="subject.php" method="GET">
          <input type="text" id="searchBox"  name="sub"  onclick="foci()" placeholder="&#xF002; search subject" required/>
          <input type="number" name="start" value="0" class="d-none"/>
          <button id="searchBtn"><i class="fa fa-search"></i></button>
          </form>
          </div>
         
        </center>
   
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
     <div id="post"> </div>
     <div id="messs"></div>
     <div id="mess"></div>
   </div>


        <div class="adding">
            <div class="toAdd">
                <br><br>
                <center>
                    <b>upload notes</b>
                 </b><br>
                 </center>
                 <div class="error"></div>
                 <center>


                    <input type="text" placeholder="Subject name" id="subject"/>
                    <br>
                   <input type="text" placeholder="semester/class" id="sem"/>
                   <br>
                   <textarea placeholder="message" id="message"></textarea>
                   <br>
                   <input type="file" id="file" onchange="up()"/>
                   <div  style="color:green" id="msg"></div>
                   <br>
                   <button id="upload">upload</button>
                    <div class="loader"></div>
                    <br>
                    <button onclick="abc()" id="closeBtn">×</button>
              <div id="getName" style="color:rgba(30,30,40);"></div>
                </center>
                
            </div>
        </div>

    </body>
  </html>
  
  <script>
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
  var myid='<?php echo $_SESSION['userid'] ?>';
   var database=firebase.database().ref("messageStatus").on("value",function(snap){
        if(snap.val().id!=myid && snap.val().status=="sent")
        {
            
       $("#chatIcon").show();
            
        }
   });
   
  //loadinh pdf
   function loading(){
       $(".freeze").show();
   }
  //fir image upload
    function up()
    {
      let b=$("#file").val();
      let ext=b.split('.').pop();
      if(ext=="PDF" || ext=="pdf")
       {
      var fd = new FormData(); 
      var files = $('#file')[0].files[0]; 
    fd.append('file', files);
        $.ajax({
			 url:"uploadImage.php",
			 type:"POST",
			 data:fd,
             contentType: false, 
             processData: false, 
		    beforeSend:function()
			 {
               $("#upload").hide();
               $("#msg").html("<p style='color:white; font-size:11px'>uploading...</p>")
		       $(".loader").show();
			 },
			 complete:function()
			 {
		       $(".loader").hide();
		       $("#upload").show();
			 },
			 success:function(data)
			  {
			     
			      $("#msg").html("uploaded successfully");
			      $("#upload").show();
			      $("#getName").html(data);
			      
			  }
			 });
       }
       else
       {
           $("#msg").html("<p style='color:red'>select pdf file</p>");
           $("#upload").hide();
       }
    }
  //endjjj
      $(".add").click(function(){
       $(".adding").slideToggle();
      });
      
      function abc(){
        $(".adding").slideUp();
      }
      
  //to upload
   $("#upload").click(function(){
     var subject=$("#subject").val();
     var sem=$("#sem").val();
     var message=$("#message").val();
     var props=$("#getName").text();
     //var fileName=props.name;
     //alert(props.name);
     var a=$("#file").val();
     if(subject=="" || sem=="" || message=="" || a=="")
      {
          $(".error").html("fill all boxes");
      }
      else
      {
          	 $.ajax({
			 url:"upload.php",
			 type:"POST",
			 data:{subject:subject,sem:sem,message:message,file:props},
		    beforeSend:function()
			 {
               $("#upload").hide();
		       $(".loader").show();
			 },
			 complete:function()
			 {
		       $("input,textarea").val("");
		       $(".loader").hide();
		       $("#upload").show();
			 },
			 success:function(data)
			  {
			      abc();
			      $("#post").prepend(data);
			      
			  }
			 });
      }
   });


   
			//show data
	    
    var limit=5;
    var start=0;
    var action='inactive';
    function load_data(limit,start)
    {
      $.ajax({
			 url:"select.php",
			 type:"POST",
			 data:{limit:limit,start:start},
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
           
 $("#messs").html("<div style='color:white'><center>No More data<br><br><centerr></div>");
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
    
    load_data(limit,start);
    }
  
    $("#main").scroll(function(){

      if($("#main").scrollTop()+$("#main").height()>$("#post").height() && action=='inactive')
        {
           
           action='active';
           start=start+limit;
           load_data(limit,start);
        }
   
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
    
   function foci(){
     $("#searchDiv").css({"position":"fixed","top":"0px","background":"darkblue","zIndex":"20"});
   // $("#searchBox").focus();
     $("#result,#find").show();
     $(".footer,.add").hide();
    }
    
 function BlurGone(){
      $("#searchDiv").css({"position":"relative","background":"inherit"});
$("#result,#find").hide();
    $(".footer,.add").show();
     
  }
  
  //search by ajax
 $("#searchBox").keyup(function(event) {
  let text = $(this).val();
  $(".searchIcon").html('<i class="fa fa-search"></i>');
  $(".searchText").html('<a href="/home/subject.php?sub='+text+'" style="text-decoration:none" ><div class="find">'+text+'</div></a>');
  $.ajax({
     url:"findAjax.php",
     type:"post",
     data:{sub:text},
     success:function(data){
         $("#find").html(data);
     }
  });
});


   
  </script>