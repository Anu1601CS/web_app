

<?php

session_start();
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 3600);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(3600);

if(isset($_SESSION['u_username']))
{
header("Location: index");
}

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Post</title>

      <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
      <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
      <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" href="css/sign_style.css">
      





 
 <style >
 	
 	body{
 		background-image: url("images/header.jpg");
 	}

 </style>


</head>

<body>



<div class="inner">

<?php
include 'includes/alert.inc.php';
?>




  <div class="info">
    <h1 style="text-align: center;font-size: 40px;color: white;padding: 40px 0;">Login</h1>
  </div>

<div class="form">

  <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>
 
<!--Signup  -->
  <form class="register-form" action="includes/signup.inc.php" method="POST" >
    
<input type="text" name="username" placeholder="Username" required=""><br>
<input type="text" name="name" placeholder="Name" required=""><br>
<input type="email" name="email" placeholder="Email" required=""><br>
<input type="password" name="password"  placeholder="Password" required=""><br>
<input type="password" name="confirm_password"  placeholder="Confirm Password" required=""><br>
<input type="password" name="security"  placeholder="Security Code" required=""><br>
<input style="background-color:#EF3B3A;color:white" type="submit" name="submit" value="Register | Sign up">     
 
 <br>
 <br>
  
    <p class="message">Already registered? <a href="#">Sign In</a></p>
     <p class="message">Forgot Password ? <a id="a" href="forgot">Forgot password</a></p>
  
  </form>


<!--Login-->

  <form class="login-form">
    
    <input type="text" placeholder="username" name="username" id="username" required />
    <input type="password" placeholder="password" name="password" id="password" required />
    <input style="background-color:#EF3B3A;color: white" class="log_in_sub_btn" type="submit" name="submit" value="login">   
<br>
<br>

    <p class="message">Not registered? <a href="#">Create an account</a></p>
    <p class="message">Forgot Password ? <a  id="a" href="forgot">Forgot Password</a></p>
  
  </form>

<br>
<br>
<p class="message"><a id="a" href="index">Cancel</a></p>

<!--forgot-->
</div>

</div>




  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <!-- <script  src="js/index.js"></script> -->
    <script  src="js/main.js"></script>

    <script >
          $(document).ready(function(){

        $(".log_in_sub_btn").click(function(){
            
            var username=$("#username").val();
            var password=$("#password").val();        

          $.post("includes/login.inc.php",
           {
             username:username,
             password:password 
           },

          function(data,status){

                if(status=="success")
                {
                    
                  }
                     
              });
                   
            });
        });
    </script>

</body>


</html>
