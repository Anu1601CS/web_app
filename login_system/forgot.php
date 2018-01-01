<?php session_start();  
  
   include 'includes/dbh.inc.php';
   
  if(isset($_SESSION['u_username']))
  { 
  header("Location: /");
  }
  
  
  if(isset($_POST['email']) && !empty($_POST['email']) )
  {
  			$email=mysqli_real_escape_string($conn ,$_POST['email']);
  						
  			$sql="SELECT * FROM login WHERE email ='$email'";
  			$result=mysqli_query($conn,$sql);
                  	$result_check=mysqli_num_rows($result);
                  	$row=mysqli_fetch_assoc($result);
                  
                  if($result_check==1)
                  
                  {	
                   	$name=$row['name'];
                   	$otp=$row['otp'];
                   	$enc=md5($row['timestamp']);
                   	$user=$row['username'];
                   	
                   	$date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
 			$expire=$date->format('Y-m-d h:i:s');
                   	
                   	$query="UPDATE login SET  expire='$expire' WHERE username='$user' AND otp='$otp' ";
			mysqli_query($conn,$query);
                   	
                   	$to = $email;
                	$subject .= $name.", here's the link to reset your password";
			$addURLS="http://www.blogme.co/?pw=true&ee=".md5($to)."&em=".$email."&action=pwd&tok=".$otp."&sec=$enc&secure";
			
			// PREPARE THE BODY OF THE MESSAGE
		
			$message = '<html><body>';
			$message .= '<h1>Hii ,'.$name.'</h1>';
			$message .= '</body></html>';						
			
			
			$message .= "Reset your password, and we'll get you on your way.\r\n";
			
			$message .=  strip_tags($addURLS)."\r\n";
			$message .= "Note: This link will expire in 24-Hours, so be sure to use it right away\r\n";
			$message .= "Thank you for using Blog-Me\r\n";
			
			
			
			$headers .= "From: Blog-Me<Blog-Me@blogme.co>\r\n";
			$headers .= "Reply-To: No-Reply<no-reply@blogme.co>\r\n";
			$headers .= "Return-Path: No-Reply<myplace@example.com>\r\n";
			$headers .= "CC: Admin<sombodyelse@example.com>\r\n";
			$headers .= "BCC: Admin<hidden@example.com>\r\n";
			$headers .= "Organization: Sender Organization\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "X-Priority: 3\r\n";
			$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
			
			mail($to,$subject,$message,$headers);
			
			$text="Reset Link Sents. Check Your Email.";
                  	$_SESSION['new_m']=$text;
                     	header("Location: http://www.blogme.co/new");
                     	exit();
                  }
                  else
                  {	
                  	$text="Account Associated With This Email Not Found.";
                  	$_SESSION['new_m']=$text;
                     	header("Location: http://www.blogme.co/new");
                     	exit();
                  
                  }	
  			
  }
  
  
  
?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Forgot</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
  <link rel="stylesheet" href="css/sign_style.css">
  <link rel="icon" type="image/png" href="css/image/blogger.png">
  
  <style>
 	  body{
 		background-color:#613175;
 	    }
  
  
  @media only screen and (max-width: 500px) {
	
	
	h1{
		font-size:30px!important;
	}
	
	.form{
		padding:10px;
	}
		    
}
</style>

</head>

<body>

<div class="inner">
<?php include 'includes/alert.inc.php'; ?>

  <div class="container">
    <div class="info">
      <h1 style="color: white;">Reset Your Password.</h1><span>
    </div>
  </div>

  <div class="form">
  <div class="thumbnail">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
  </div>
  <form class="forgot-form" action="forgot" method="POST" >
   
    <p class="message">Send Reset link</p>
   
    <input type="email" placeholder="email" name="email" required />
    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Send">  
   
    <br>
    <br> 
    <p><a id="a" href="login">Back</a></p>
  </form>
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
</body>
</html>




