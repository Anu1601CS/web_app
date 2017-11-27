<?php
session_start();

// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);
if(!isset($_SESSION['u_username']))
{
header("Location: includes/error.inc.php?error user ");
}


?>

<!DOCTYPE html>
<html lang="en" >
<head>
  
  <meta charset="UTF-8">
  <title>Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel="stylesheet" href="css/sign_style.css">

<style >

body
  {background-image: url("images/header.jpg");}

#a{
    color: #EF3B3A;
    text-decoration: none;
    font-size: 15px;
  }

 </style>

</head>

<body>

<div class="inner">

<?php
include 'includes/alert.inc.php';
?>

<div class="container">

<div class="info">
    <h1 style="color: white;">Delete Your Post</h1><span>
  </div>

</div>

<div class="form">

  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
  <form class="forgot-form" action="includes/delete.inc.php" method="POST" >
   
    <p class="message"></p>
    <input type="text" name="num" placeholder="Post Number.." required=""><br>
    <input type="text" name="num2" placeholder="Confirm Post Number.." required=""><br>
    <input type="password" name="password" placeholder="Password.." required=""><br>
    <p><a id="a">* Type : I Want To Delete</a></p>
    <input type="text" name="_text" placeholder="Type here.." required=""><br>
    
    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Delete">  
<br> 
 
 <p class="message"><a id="a" href="index">Cancel</a></p>
 
  </form>

</div>

</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>


</html>
