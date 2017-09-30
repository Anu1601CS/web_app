<?php


// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

session_start();

?>




<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>

<style>


body
{
	
	line-height: 2;
}

a{
	text-decoration:none;
	font-size: 20px;
	text-align: left; 
     color: black;
}

form{
	float: center;
}

</style>


</head>

<body>

<h1>CS205: Submission Portal</h1>


<?php
   
  if(isset($_SESSION['u_username']))
   {

  echo '<form action="includes/logout.inc.php" method="POST">
	<button type="submit" name="submit">Logout</button>
	
</form>';
   	
   }
   else
   {


echo '
<button ><a href="index.php" >My Home</a></button>
<button ><a href="signup.php">Sign up</a></button>


<form action="includes/login.inc.php" method="POST" >

<input type="text" name="username" placeholder="Username">

<input type="password" name="password" placeholder="Password">
<input type="submit"  name="submit" value="Login">	


</form>';


   }

?>






</body>



</html>

