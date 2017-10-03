
<!--
 * Created by Anurag (Anu1601CS) .
 *-->


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
  text-align: center;
  background-size: auto;
  background-repeat: no-repeat;
  background-size:  100%;
  height: 100%;
}

a{
	text-decoration:none;
	font-size: 20px;
	text-align: left; 
     color: black;
}

#link{
  color: blue!important;
  font-size: 15px;
}

#copy
{
  color:red; 
}

#logo
{

	width: 150px;
	height: 150px;
	
}

</style>


</head>

<body>
<img id ="logo" src="css/image/iitp.png">	
<h1>IIT-P</h1>
<h1>Student Database Portal</h1>


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
<a style="display:inline-block; color:purple;" href="index.php">Student Login</a>



<form action="includes/login.inc.php" method="POST" >

<input type="text" name="username" placeholder="Username or Email" required=""><br>

<input type="password" name="password" placeholder="Password" required=""><br>
<input type="submit"  name="submit" value="Login">	


</form>';

echo '<br>';
echo '<a style="color:green!important;" id="link" href="signup.php">Sign up</a> &nbsp;| &nbsp; <a id="link" href="includes/forgot.inc.php">Forgot your password?</a>';
   }

?>

<br>
<br>
<br>
<h5 id="copy" >&copy; Copyright 2017  |  Created by Anurag</h5>



</body>



</html>

