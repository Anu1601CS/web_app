<?php session_start(); ?>

<?php

if(isset($_POST['submit']))
{

   include_once 'dbh.inc.php';

    $name=mysqli_real_escape_string($conn ,$_POST['name']);
    $username=mysqli_real_escape_string($conn ,$_POST['username']);
    $email=mysqli_real_escape_string($conn ,$_POST['email']);
    $password=mysqli_real_escape_string($conn ,$_POST['password']);
    $confirm_password=mysqli_real_escape_string($conn ,$_POST['confirm_password']);
    $security=mysqli_real_escape_string($conn ,$_POST['security']);
   
    
    //Error handlers 

    if(empty($name)|| empty($username) || empty($email)|| empty($password) || empty($confirm_password) || empty($security))
    {   
            $error="Input field is empty.";
            
            $_SESSION['error']=$error;
   
      
        header("Location: http://www.blogme.co/login?signup=empty");
        exit();
    }
    else
    if($password==$confirm_password)
      
    {    //check if input chracter are valid
      
         if(!preg_match("/^[a-zA-Z\s]*$/",$name))
         {  
            $error="Invalid name.";
            
            $_SESSION['error']=$error;


         	header("Location: http://www.blogme.co/login?signup=invalid");
         	exit();

         }
          else
          {  
          	  //check email
          	if(!filter_var($email,FILTER_VALIDATE_EMAIL))
          	{  
          		  $error="Email invalid.";
            
                $_SESSION['error']=$error;

         	  header("Location: http://www.blogme.co/login?signup=invalid_email=error_on_creating_account");
         	  exit();

          	}
          	else
          	{  	
          		
          	  $sql1="SELECT * FROM login WHERE email ='$email'";
                  $result1=mysqli_query($conn,$sql1);
                  $result_check1=mysqli_num_rows($result1);
	
		if($result_check1<=0)
		{
          		 $sql="SELECT * FROM login WHERE username ='$username'";
          		 $result=mysqli_query($conn,$sql);

          		 $result_check=mysqli_num_rows($result);

          		 if($result_check >0)
          		 {   

          		        $error="Username already taken.";
            
                                $_SESSION['error']=$error;
          		 	header("Location: http://www.blogme.co/login?signup=username_taken=error_on_creating_account");
                     	        exit();
          		 }
          		 else
          		 {
                        $password_hash=md5($password);
                        $security_hash=md5($security);
                        
                       	$confirm='0';
                        $otp=md5($username);
                        
                                                 
                     	//Insert data to database
   
                        $sql="INSERT INTO `login`(`username`, `name`, `email`, `password`, `security`, `confirm` , `otp` , `expire` , `timestamp`, `website`, `linkdin`, `twitter`, `facebook`, `instagram`, `bio`) VALUES 							('$username','$name','$email','$password_hash','$security_hash','$confirm','$otp',NOW(),NOW(),'','','','','','');";

                       	mysqli_query($conn,$sql);
                    	
                    	$success='Please Check Your Email. To Activate account';
                       	$_SESSION['success']=$success;
                       	
                       	$to = $email;
			$subject = "Confirm your Blog-Me account, ".$name;
			$addURLS="http://www.blogme.co/?hs=true&ee=".md5($to)."&em=".$email."&action=new&tok=".$otp."&secure=UTF-8";
			
			// PREPARE THE BODY OF THE MESSAGE
			
			$message = '<html><body>';
			$message .= '<h1>Hii ,'.$name.'</h1>';						
			$message .= '</body></html>';
			
			$message .= "Final step...\r\n";
			$message .= "Confirm your email address to complete your Blog-Me account @".$username." It's easy-just click the link below.\r\n";
			$message .= "Note: Link expire in 24-Hours\r\n";
			$message .=  strip_tags($addURLS);
	
			
			
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
			
                       	header("Location: http://www.blogme.co/login?signup=success=Please confirm email");
                       	exit();
			

          		 }
          		 
          	}
          	else
          	{
          		 $error="Email already taken.";
            
                         $_SESSION['error']=$error;
          		 header("Location: http://www.blogme.co/login?signup=Email_taken=error_on_creating_account");
                     	 exit();
          		 
          		 
          	}


          	}


         }
        
    }
    else
    {	  $error="Password not confirm";
          $_SESSION['error']=$error;
          header("Location: http://www.blogme.co/login?password not confirm error on signup ");
          exit();

    }


}
else
{		
	
	header("Location: error.inc.php");
	exit();
}




?>