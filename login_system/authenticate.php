<?php session_start();

	include_once 'includes/dbh.inc.php';		

	$email=mysqli_real_escape_string($conn ,$_GET['ee']);
	$token=mysqli_real_escape_string($conn ,$_GET['tok']);
	$mailu=mysqli_real_escape_string($conn ,$_GET['em']);
	
	if(empty($email) || empty($email) || empty($email) || !isset($_SESSION['aut']) )
	{
		header("Location: http://www.blogme.co");	
	
	} 
	
	$confirm='1';
	$expire='0';
	
	$sql="SELECT * FROM login WHERE email='$mailu' AND otp='$token' ";
   	$result=mysqli_query($conn,$sql);
   	$result_check=mysqli_num_rows($result);
   	
   	$row=mysqli_fetch_assoc($result);
   	
   	if(isset($_POST['password']))
   	{
   		$pass=mysqli_real_escape_string($conn ,$_POST['password']);
   		
   		if(md5($pass) == $row['password'])
   		{
	   		$user=$row['username'];
			
			$query="UPDATE login SET  confirm='$confirm', expire='$expire' WHERE username='$user' AND otp='$token' ";
			mysqli_query($conn,$query);
			
			if($row['confirm']==0)
			{
				$success="Now your account is Activated.";
				
				$_SESSION['new_m']=$success;
				
				$to = $row['email'];
				$subject = "Welcome and Thankyou , ".$row['name'];
				
				// PREPARE THE BODY OF THE MESSAGE
				
				$message = '<html><body>';
				$message .= '<h1>Hii ,'.$row['name'].'</h1>';						
				$message .= '</body></html>';
	
				$message .= "Now your account is activated.\r\n";
				$message .= "Enjoy Blog-Me app to post your favourite article fast and secure.\r\n";
				$message .= "Thankyou\r\n";
				
				
				$headers .= "From: Blog-Me<Blog-Me@blogme.co>\r\n";
				$headers .= "Reply-To: No-Reply<no-reply@blogme.co>\r\n";
				$headers .= "Return-Path: No-Reply<myplace@example.com>\r\n";
				$headers .= "CC: Admin<anurag@blogme.co>\r\n";
				$headers .= "BCC: Admin<hidden@example.com>\r\n";
				$headers .= "Organization: Sender Organization\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "X-Priority: 3\r\n";
				$headers .= "X-Mailer: PHP". phpversion() ."\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";  
				
				mail($to,$subject,$message,$headers);
				
			
			}
			else
			{
				$success="Your account is already activated.";
				
				$_SESSION['new_m']=$success;
			}
			

			
			
			header("Location: http://www.blogme.co/new");
                        exit();
			
   		}
   		else
   		{
   			$error="Wrong Password";
   			$_SESSION['error']=$error;
   		
   		}
   		
   	}	
   

?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Authenticate</title>
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
	
	
	h2{
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
      <h2 style="color: white;">Enter Your Password</h2><span>
    </div>
  </div>

  <div class="form">
  <div class="thumbnail">
      <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
  </div>
  
 <?php echo '<form class="forgot-form" action="authenticate?ee='.$email.'&tok='.$token.'&em='.$mailu.'&'.$email.'" method="POST" >'; ?>
    
    <p class="message" style="text-align:left;">Password</p>
    
    <input type="password" placeholder="password.." name="password" required />
    <input style="background-color:#EF3B3A;color: white" type="submit" name="submit" value="Activate">  
    
    <br>
    <br> 
    <p><a id="a" href="/">Cancel</a></p>
  
  </form>
  
  </div>
</div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    
</body>
</html>




