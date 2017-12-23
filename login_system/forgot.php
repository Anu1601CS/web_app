<?php session_start();  

  if(isset($_SESSION['u_username']))
  { 
  header("Location: index");
  }
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel="stylesheet" href="css/sign_style.css">
  
  <style>
 	  body{
 		 background-image: url("images/header.jpg");
 	    }
  </style>

</head>

<body>

<div class="inner">
<?php include 'includes/alert.inc.php'; ?>

  <div class="container">
    <div class="info">
      <h1 style="color: white;">Login</h1><span>
    </div>
  </div>

  <div class="form">
  <div class="thumbnail">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
  </div>
  <form class="forgot-form" action="#" method="POST" >
    <p class="message">Send Reset link</p>
    <input type="email" placeholder="email" name="username" required />
    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Send">  
    <br> 
    <p class="message"><a id="a" href="login">Back</a></p>
  </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script  src="js/index.js"></script>
</body>
</html>




