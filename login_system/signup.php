
<!--
 * Created by Anurag (Anu1601CS).
 *-->

<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/signup.css" type="text/css">

</head>

<body>

<?php

include 'includes/alert.inc.php';

?>


<h1>Student Signup  Portal</h1>

<button ><a href="index.php" >Student Login</a></button>

<div id="form">
<form action="includes/signup.inc.php" method="POST" >

 
 <h1>Sign Up</h1>	

<input type="text" name="username" placeholder="Username" required=""><br>
<input type="text" name="name" placeholder="Name" required=""><br>
<input type="email" name="email" placeholder="Email" required=""><br>
<input type="password" name="password"  placeholder="Password" required=""><br>
<input type="password" name="confirm_password"  placeholder="Confirm Password" required=""><br>
<input type="password" name="security"  placeholder="Security Code" required=""><br>
<input type="submit"  name="submit" value="Sign up">	



</form>

</div>

<div id="security">
	<ul>
	    <li>* Note *</li>
		<li>Security question.	 </li>
		<li>Enter code which you remember all time.</li>
		<li>Like Father's name , Mother's name etc..</li> 
		<li>It may be help full in future.</li>
	</ul>
</div>

</body>



</html>