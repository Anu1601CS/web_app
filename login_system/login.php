<?php session_start(); 
if(isset($_SESSION['u_username']))
{ header("Location: /"); } 
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login | Sign Up</title>

      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
      <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="icon" type="image/png" href="css/image/blogger.png">
      <link rel="stylesheet" href="css/sign_style.css">
      
 <style >
 		
    body{
	background-image: url("images/header.jpg");
 	}
 
 @media only screen and (max-width: 500px) {
     
    	h1{
	font-size:30px!important;
	}
	
	.form{
		padding:10px;
	}
}

.status-not-available{
		
color:red;
font-size:10px;
}
		
.status-available{
		
color:green;
font-size:10px;
		
}

#loader{
 width:70px;
 height:50px;
 
}
 	
</style>

</head>

<body>

<div class="inner">

  <?php include 'includes/alert.inc.php'; ?>

  <div class="info">
       <h1 style="text-align: center;font-size: 40px;color: white;padding: 40px 0;">Login | Sign Up</h1>
  </div>

  <div class="form">
      <div class="thumbnail">
      
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
      
      
      </div>
      
       <img id="loader" style="display:none;" src="css/image/load.gif" /> 
     
      <!--Signup  -->
      <form class="register-form" action="includes/signup.inc.php" method="POST" >
      
      <div id="inner-input">
      <p class="message">Username</p>
      <span id="user-availability-status"></span> 
      <input type="text" name="username" placeholder="Username" onBlur="checkAvailability()" id="_username" required=""><br>
      </div>
      
      <div id="inner-input">
      <p class="message">Name</p>
      <input type="text" name="name" placeholder="Name" required=""><br>
      </div>
      
      <div id="inner-input">
      <p class="message">Email</p>
      <span id="user-availability-status-email"></span>  
      <input type="email" name="email" placeholder="Email" onBlur="checkAvailabilityemail()" id="email" required=""><br>
      </div>
      
      <div id="inner-input">
      <p class="message">Password</p>
      <input type="password" name="password"  placeholder="Password" required=""><br>
      </div>
      
      <div id="inner-input">
      <p class="message">Confirm Password</p>
      <input type="password" name="confirm_password"  placeholder="Confirm Password" required=""><br>
      </div>
      
      <div id="inner-input">
      <p class="message">Security PIN</p>
      <input type="password" name="security"  placeholder="Security Code" required=""><br>
      </div>
   
      <input style="background-color:#EF3B3A;color:white" type="submit" name="submit" value="Register | Sign up">     
 
      <br><br>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
      <p class="message">Forgot Password ? <a id="a" href="forgot">Forgot password</a></p>
      
      </form>


      <!--Login-->
      <form class="login-form" action="includes/login.inc.php" method="POST">
        
      <input type="text" placeholder="username or email.." name="username" id="username" required />
      <input type="password" placeholder="password" name="password" id="password" required />
      <input style="background-color:#EF3B3A;color: white" class="log_in_sub_btn" type="submit" name="submit" value="login">   
     
      <br><br>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
      <p class="message">Forgot Password ? <a  id="a" href="forgot">Forgot Password</a></p>
      
      </form>
      <br>
      <p><a id="a" href="/">Cancel</a></p>
      <br>
  </div>

</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script> 
  <script  src="js/index.js"></script> 
  <script  src="js/main.js"></script>
  
  <script>
  
function checkAvailability() {
	$("#loader").show();
	jQuery.ajax({
	url: "includes/checkuser.inc.php",
	data:'username='+$("#_username").val(),
	type: "POST",
	success:function(data){
	$("#user-availability-status").html(data);
	$("#loader").hide();
	},
	error:function (){}
	});
	}
	
function checkAvailabilityemail() {
	$("#loader").show();
	jQuery.ajax({
	url: "includes/checkuser.inc.php",
	data:'email='+$("#email").val(),
	type: "POST",
	success:function(data){
	$("#user-availability-status-email").html(data);
	$("#loader").hide();
	},
	error:function (){}
	});
	}

</script>
 
</body>


</html>
