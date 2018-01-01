<? session_start(); 

unset($_SESSION['change']);
unset($_SESSION['aut']);

?>

<!DOCTYPE html>
<html>
<head>
<title>Activation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="icon" type="image/png" href="css/image/blogger.png">

<style>

body{
 text-align:center;
}
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  margin: -75px 0 0 -65px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

h1,h3{
color:white;
}

@media only screen and (max-width: 500px) {
    h1{
        font-size:25px;
        
    }
    
    h3{
    	font-size:15px;
    }
}

</style>
</head>
<body onload="myFunction()" style="margin:0;background-color:#27c5ab;">

<div class="container">

<div id="loader"></div>

<div style="display:none;" id="myDiv" class="animate-bottom">
  
  <h1>Welcome To Blog-Me</h1>
  <h3><?php 
  if(isset($_SESSION['new_m']))
  {
  echo $_SESSION['new_m'];
  }
  else
  {
  echo 'Blog-Me is blogging system for those who love to write blog .<br>Its a simple app to post, delete and many more or easy to use and highly secure.<br> 
  Please send feedback , security bug and features  you want :)';
  } 
  ?></h3>
  <br>
  <a href="/" class="btn btn-primary" role="button">Home</a>&nbsp;
  <a href="/login" class="btn btn-primary" role="button">Login</a>
    
</div>

</div>


<script>
var myVar;

function myFunction() {
    myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

<?php

unset($_SESSION['new_m']);


?>


</body>
</html>
