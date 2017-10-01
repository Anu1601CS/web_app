
<!--
 * Created by Anurag (Anu1601CS).
 *-->



<!DOCTYPE html>
<html>

<head>
<title>Login Page</title>

<style>


button{

  cursor: pointer;
}

body
{
	
	line-height: 2;
	text-align: center;

}

a{
	text-decoration:none;
	font-size: 20px;
	text-align: left; 
	color: black;
      
}



form{
	background-color:skyblue; 
	
	 
  }
  
#security
  {   

  	position: absolute;
  	color: red;

  }



</style>


</head>

<body>

<h1>Student Signup  Portal</h1>

<button ><a href="index.php" >Student Login</a></button>

<div id="form">
<form action="includes/signup.inc.php" method="POST" >

 
 <h1>Sign Up</h1>	

<input type="text" name="username" placeholder="Username"><br>
<input type="text" name="name" placeholder="Name"><br>
<input type="email" name="email" placeholder="Email"><br>
<input type="password" name="password"  placeholder="Password"><br>
<input type="password" name="confirm_password"  placeholder="Confirm Password"><br>
<input type="password" name="security"  placeholder="Security Code"><br>
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